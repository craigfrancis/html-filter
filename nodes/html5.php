<?php

	$nodes = array(

// 'children' => array('#text', 'span', 'a', 'br'),

		//--------------------------------------------------
		// Structure

			'html' => array(
					'void' => false,
					'children' => array('head', 'body'),
					'attributes' => array(
							'lang'     => array('type' => 'lang', 'default' => 'en'),
							'manifest' => array('type' => 'url',  'default' => NULL, 'protocols' => array('#local', 'http', 'https')),
							'xmlns'    => array('type' => 'url',  'default' => NULL, 'protocols' => array('http', 'https')),
						),
				),
			'head' => array(
					'void' => false,
					'children' => array('title', 'base', 'link', 'style', 'meta', 'script', 'noscript', 'command'),
					'attributes' => array(),
				),
			'body' => array(
					'void' => false,
					'children' => array('div'),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Meta

			'base' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'link' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'style' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'script' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'noscript' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'title' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'meta' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Structure

			'article' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'aside' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'nav' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'section' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'footer' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'dialog' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Content

			'div' => array(
					'void' => false,
					'children' => array('#text', 'p', 'a'),
					'attributes' => array(),
				),
			'p' => array(
					'void' => false,
					'children' => array('#text', 'a', 'br'),
					'attributes' => array(),
				),
			'blockquote' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'address' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Headings

			'h1' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'h2' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'h3' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'h4' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'h5' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'h6' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'header' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Lists

			'ol' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'ul' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'li' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'dl' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'dt' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'dd' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Table

			'table' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'caption' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'colgroup' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'col' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'thead' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'tbody' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'tfoot' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'tr' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'th' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'td' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Form

			'form' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'fieldset' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'legend' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'label' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'input' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'keygen' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'details' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'command' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'summary' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'meter' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'progress' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'select' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'optgroup' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'option' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'datalist' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'textarea' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'button' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'output' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Elements

			'img' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'map' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'area' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'audio' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'canvas' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'svg' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'figure' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'figcaption' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'video' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'object' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'embed' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'param' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'source' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'track' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'iframe' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'menu' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Breaks

			'hr' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'br' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),
			'wbr' => array(
					'void' => true,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Phrase

			'a' => array(
					'void' => false,
					'children' => array('#text'),
					'attributes' => array(
							'href' => array('type' => 'url', 'default' => '#', 'protocols' => array('#local', 'http', 'https')),
						),
				),
			'span' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'abbr' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'cite' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'code' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'dfn' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'em' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'kbd' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'mark' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'q' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			's' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'small' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'samp' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'strong' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'sub' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'sup' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'time' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'var' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'pre' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'ins' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'del' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'b' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'i' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'u' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Formatting

			'bdi' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'bdo' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(
						'dir' => array('type' => 'list', 'default' => 'auto', 'values' => array('ltr', 'rtl', 'auto')),
					),
				),
			'ruby' => array(
					'void' => false,
					'children' => array('rp', 'rt'),
					'attributes' => array(),
				),
			'rp' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),
			'rt' => array(
					'void' => false,
					'children' => array(),
					'attributes' => array(),
				),

	);

?>