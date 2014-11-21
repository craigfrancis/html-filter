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
						'unrecognised_attribute' => NULL,
					), $this->config, $config);

			//--------------------------------------------------
			// Config: nodes

				if (is_string($this->config['nodes'])) {
					$this->config['nodes'] = $this->node_config_get($this->config['nodes']);
				}

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

		public function config_check() {

			foreach ($this->config['nodes'] as $node_name => $node_config) {

				if (is_string($node_config)) {
					continue;
				}

				if (!array_key_exists('void', $node_config))       exit('The node "' . $node_name . '" is missing the "void" boolean');
				if (!is_bool($node_config['void']))                exit('The node "' . $node_name . '" has an invalid "void" boolean');
				if (!array_key_exists('children', $node_config))   exit('The node "' . $node_name . '" is missing the "children" array');
				if (!is_array($node_config['children']))           exit('The node "' . $node_name . '" has an invalid "children" array');
				if (!array_key_exists('exclusions', $node_config))    exit('The node "' . $node_name . '" is missing the "exclude" array');
				if (!is_array($node_config['exclusions']))            exit('The node "' . $node_name . '" has an invalid "exclude" array');
				if (!array_key_exists('attributes', $node_config)) exit('The node "' . $node_name . '" is missing the "attributes" array');
				if (!is_array($node_config['attributes']))         exit('The node "' . $node_name . '" has an invalid "attributes" array');

				foreach ($node_config['attributes'] as $attr_name => $attr_config) {
					if (!array_key_exists('type', $attr_config))    exit('The node "' . $node_name . '" attribute "' . $attr_name . '" type is required.');
					if (!array_key_exists('default', $attr_config)) exit('The node "' . $node_name . '" attribute "' . $attr_name . '" default is required.');
				}

			}

		}

		public function errors_get() {
			return $this->errors;
		}

		public function process($html) {

			//--------------------------------------------------
			// Documents

				$this->dom_src = new DOMDocument();
				$this->dom_dst = new DOMDocument();

				libxml_use_internal_errors(true);
				libxml_clear_errors();

				$this->dom_src->loadHTML($html, LIBXML_NONET); // Disable net access, but also miraculously whitespace is preserved more often.

				foreach (libxml_get_errors() as $error) {
					$this->errors[] = 'LibXML Error: ' . trim($error->message) . ' (line ' . $error->line . ')';
				}

				libxml_clear_errors();

			//--------------------------------------------------
			// Copy nodes

				foreach ($this->dom_src->childNodes as $node) {

					if ($node->nodeType === XML_DOCUMENT_TYPE_NODE) { // DOM contains multiple <html> nodes???
						continue;
					}

					$new = $this->process_node(strtolower($node->nodeName), $node);
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
					if (is_array($node_config) && $node_config['void']) {
						$output = str_ireplace('></' . $node_name . '>', ' />', $output);
					}
				}

			//--------------------------------------------------
			// Return

				return $output;

		}

		protected function process_node($node_name, $node_src, $node_exclusions = array()) {

			//--------------------------------------------------
			// Node type

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

				if (is_string($node_config)) {
					$node_name = $node_config;
					$node_config = $this->config['nodes'][$node_name];
				}

			//--------------------------------------------------
			// Exclusions (e.g. a label cannot contain a label)

				$node_exclusions = array_merge($node_exclusions, $node_config['exclusions']);

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

								$this->errors[] = 'Unrecognised attribute "' . $attr_name . '" on node "' . $node_name . '"';

								if ($this->config['unrecognised_attribute']) {
									$attr_config = array('type' => $this->config['unrecognised_attribute']);
								} else {
									$attr_config = array('type' => NULL);
								}

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

						if ($child->nodeType === XML_CDATA_SECTION_NODE) {
							continue; // Probably some CSS from a <style> tag... with nasty JS as well, e.g. background: url("javascript:alert('XSS')");
						}

						if ($child->nodeType === XML_COMMENT_NODE) {
							continue;
						}

						$child_name_lower = strtolower($child->nodeName);
						$child_name_safe = NULL;

						if (!in_array($child_name_lower, $node_config['children'])) {

							$this->errors[] = 'Cannot allow "' . $child_name_lower . '" as a child of "' . $node_name . '".';

						} else if (in_array($child_name_lower, $node_exclusions)) { // The ['exclusions'] allows nodes like <form> and <label> to not include any children of the same name, with no need to alter their ['children'] from a simple $categories['flow'].

							$this->errors[] = 'Cannot allow "' . $child_name_lower . '", as it has been excluded from a parent node.';

						} else {

							$child_name_safe = $child_name_lower;

						}

						if ($child_name_safe === NULL) {
							if (isset($this->config['nodes'][$child_name_lower])) {

								$child_name_alternative = $this->config['nodes'][$child_name_lower]['alternative']; // Allow the node to specify an appropriate alternative (e.g. span or div)

								if (!in_array($child_name_alternative, $node_config['children']) || in_array($child_name_alternative, $node_exclusions)) {

									$this->errors[] = 'Cannot allow "' . $child_name_alternative . '" as an alternative child for "' . $child_name_lower . '".';

								} else {

									$child_name_safe = $child_name_alternative;

								}

							}
						}

						if ($child_name_safe === NULL) { // Last ditch attempt to find something, but some nodes don't allow any children (e.g. <br />)
							if (in_array('div', $node_config['children'])) {
								$child_name_safe = 'div';
							} else if (in_array('span', $node_config['children'])) {
								$child_name_safe = 'span';
							}
						}

						if ($child_name_safe !== NULL) {
							$new = $this->process_node($child_name_safe, $child, $node_exclusions);
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