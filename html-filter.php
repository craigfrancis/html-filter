<?php

	class html_filter {

		protected $config = array();
		protected $errors = array();
		protected $dom_src = NULL;
		protected $dom_dst = NULL;

		public function __construct($config = array()) {
			$this->setup($config);
		}

		protected function setup($config) {

			//--------------------------------------------------
			// Default config

				$this->config = array_merge(array(
						'nodes' => dirname(__FILE__) . '/nodes/html5.php',
						'unrecognised_node' => 'div',
					), $this->config, $config);

			//--------------------------------------------------
			// Config: nodes

				if (is_string($this->config['nodes'])) {
					$this->config['nodes'] = $this->node_config_get($this->config['nodes']);
				}

				$this->config['nodes'] = $this->node_config_clean($this->config['nodes']);

			//--------------------------------------------------
			// Config: Fallback node

				$node_name = $this->config['unrecognised_node'];

				if (!isset($this->config['nodes'][$node_name])) {
					exit('Unrecognised fallback node "' . $node_name . '"');
				}

		}

		private function node_config_get($path) {
			$nodes = array();
			require($path);
			return $nodes;
		}

		private function node_config_clean($nodes) {

			foreach ($nodes as $node_name => $node_config) {

				if (!isset($node_config['closing'])) $nodes[$node_name]['closing'] = false;
				if (!isset($node_config['children'])) $nodes[$node_name]['children'] = array();
				if (!isset($node_config['attributes'])) $nodes[$node_name]['attributes'] = array();

				foreach ($nodes[$node_name]['attributes'] as $attr_name => $attr_config) {
					if (!isset($attr_config['type'])) exit('The node "' . $node_name . '" attribute "' . $attr_name . '" type is required.');
					if (!isset($attr_config['default'])) $nodes[$node_name]['attributes'][$attr_name]['default'] = NULL;
				}

			}

			return $nodes;

		}

		public function errors_get() {
			return $this->errors;
		}

		public function process($html) {

			//--------------------------------------------------
			// Documents

				$this->dom_src = new DOMDocument();
				$this->dom_src->loadHTML($html);

				$this->dom_dst = new DOMDocument();

			//--------------------------------------------------
			// Copy nodes

				foreach ($this->dom_src->childNodes as $node) {

					if ($node->nodeType === XML_DOCUMENT_TYPE_NODE) { // DOM contains multiple <html> nodes???
						continue;
					}

					$new = $this->process_node($node);
					if ($new) {
						$this->dom_dst->appendChild($new);
					}

				}

			//--------------------------------------------------
			// Compile HTML

				$output = '';
				$bodies = $this->dom_dst->getElementsByTagName('body');
				if ($bodies->length == 1) {
					foreach ($bodies->item(0)->childNodes as $child) {
						$output .= $this->dom_dst->saveXML($child, LIBXML_NOEMPTYTAG);
					}
				}

				foreach ($this->config['nodes'] as $node_name => $node_config) {
					if ($node_config['closing']) {
						$output = str_ireplace('></' . $node_name . '>', ' />', $output);
					}
				}

			//--------------------------------------------------
			// Return

				return $output;

		}

		protected function process_node($node_src) {

			//--------------------------------------------------
			// Node type

				$node_name = $node_src->nodeName;

				if ($node_src->nodeType === XML_TEXT_NODE) {

					return $this->dom_dst->createTextNode($node_src->nodeValue);

				} else if (!isset($this->config['nodes'][$node_name])) {

					$this->errors[] = 'Unrecognised node "' . $node_name . '" (' . $node_src->nodeType . ')';

					if ($this->config['unrecognised_node']) {
						$node_name = $this->config['unrecognised_node'];
					} else {
						return NULL;
					}

				}

				$node_config = $this->config['nodes'][$node_name];

			//--------------------------------------------------
			// New

				$node_dst = $this->dom_dst->createElement($node_name);

			//--------------------------------------------------
			// Attributes

				$attributes = array();

				if ($node_src->hasAttributes()) {
					foreach ($node_src->attributes as $attribute) {

						//--------------------------------------------------
						// Config

							$attr_name = $attribute->name;

							if (isset($node_config['attributes'][$attr_name])) {

								$attr_config = $node_config['attributes'][$attr_name];

							} else if ($attr_name == 'class') {

								$attr_config = array('type' => 'class');

							} else {

								$attr_config = array('type' => NULL);

								$this->errors[] = 'Unrecognised attribute "' . $attr_name . '" on node "' . $node_name . '"';

							}

						//--------------------------------------------------
						// Value

							$attr_value = $attribute->value;

							if ($attr_config['type'] == 'url') {

								$attr_value = $this->filter_url($attr_value, $attr_config);

							} else if ($attr_config['type'] == 'class') {

								$attr_value = $this->filter_class($attr_value, $attr_config);

							} else if ($attr_config['type'] === NULL) {

								$attr_value = NULL;

							} else {

								$this->errors[] = 'Unrecognised attribute type "' . $attr_config['type'] . '" for "' . $attr_name . '" on node "' . $node_name . '"';

							}

						//--------------------------------------------------
						// Apply

							if ($attr_value !== NULL) {

								$node_dst->setAttribute($attr_name, $attr_value);

								$attributes[] = $attr_name;

							}

					}
				}

				foreach ($node_config['attributes'] as $attr_name => $attr_config) {
					if ($attr_config['default'] !== NULL && !in_array($attr_name, $attributes)) {
						$node_dst->setAttribute($attr_name, $attr_config['default']);
					}
				}

			//--------------------------------------------------
			// Children

				if ($node_src->hasChildNodes()) {
					foreach ($node_src->childNodes as $child) {

						if (!in_array($child->nodeName, $node_config['children'])) {

							$this->errors[] = 'Cannot allow "' . $child->nodeName . '" as a child of "' . $node_name . '"';

						} else {

							$new = $this->process_node($child);
							if ($new) {
								$node_dst->appendChild($new);
							}

						}

					}
				}

			//--------------------------------------------------
			// Return

				return $node_dst;

		}

		protected function filter_url($url, $attr_config) {

			if (isset($attr_config['protocols']) && is_array($attr_config['protocols'])) {
				$protocols = $attr_config['protocols'];
			} else {
				$protocols = array();
			}

			if (($pos = strpos($url, ':')) !== false) {

				$protocol = substr($url, 0, $pos);
				if ($protocol != '#local' && in_array($protocol, $protocols)) {
					return $url;
				}

			} else if (substr($url, 0, 2) == '//') {

				return NULL; // Must specify protocol

			} else if (in_array('#local', $protocols)) {

				return $url; // TODO: Can we still check for absolute ("/path/") or relative ("./path", "../path" or "path/") links?

			}

			return NULL;

		}

		protected function filter_class($input) {

			$output = array();

			foreach (explode(' ', $input) as $class) {
				$class = trim($class);
				if (preg_match('/^-?[_a-zA-Z][_a-zA-Z0-9\-]*$/', $class)) {
					$output[] = $class;
				}
			}

			return implode(' ', $output);

		}

	}

?>