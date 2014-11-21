<?php

		// https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/Content_categories

	$categories = array(
			'metadata'    => array('base', 'command', 'link', 'meta', 'noscript', 'script', 'style', 'title'),
			'phrasing'    => array('a', 'abbr',                                'audio', 'b', 'bdo',                      'br', 'button', 'canvas', 'cite', 'code', 'command',         'datalist', 'del',            'dfn',              'em', 'embed',                                                                                                       'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label',         'map', 'mark', 'math',         'meter',        'noscript', 'object',       'output',             'progress', 'q', 'ruby',      'samp', 'script',            'select', 'small', 'span', 'strong', 'sub', 'sup', 'svg',                      'textarea', 'time',       'var', 'video', 'wbr', '#text'),
			'flow'        => array('a', 'abbr', 'address', 'article', 'aside', 'audio', 'b', 'bdo', 'bdi', 'blockquote', 'br', 'button', 'canvas', 'cite', 'code', 'command', 'data', 'datalist', 'del', 'details', 'dfn', 'div', 'dl', 'em', 'embed', 'fieldset', 'figure', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'hgroup', 'hr', 'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label', 'main', 'map', 'mark', 'math', 'menu', 'meter', 'nav', 'noscript', 'object', 'ol', 'output', 'p', 'pre', 'progress', 'q', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'span', 'strong', 'sub', 'sup', 'svg', 'table', 'template', 'textarea', 'time', 'ul', 'var', 'video', 'wbr', '#text'),
			'section'     => array('article', 'aside', 'nav', 'section'),
		);

	$nodes = array(

		//--------------------------------------------------
		// Main

			'html' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('head', 'body'),
					'exclusions' => array(),
					'attributes' => array(
							'lang'     => array('type' => 'lang', 'default' => 'en'),
							'manifest' => array('type' => 'url',  'default' => NULL, 'protocols' => array('#local', 'http', 'https')),
							'xmlns'    => array('type' => 'url',  'default' => NULL, 'protocols' => array('http', 'https')),
						),
				),
			'head' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['metadata'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'body' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Meta

			'base' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'link' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'style' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'script' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'noscript' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('noscript'),
					'attributes' => array(),
				),
			'title' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'meta' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Structure

			'article' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'aside' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'nav' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'section' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'footer' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('header', 'footer'),
					'attributes' => array(),
				),
			'dialog' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Content

			'div' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'p' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'blockquote' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'address' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('address', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'hgroup', 'article', 'aside', 'nav', 'section', 'header', 'footer'),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Headings

			'h1' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'h2' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'h3' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'h4' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'h5' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'h6' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'header' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('header', 'footer'),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Lists

			'ol' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('li'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'ul' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('li'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'li' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'dl' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('dt', 'dd'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'dt' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('header', 'footer', 'article', 'aside', 'nav', 'section', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'hgroup'),
					'attributes' => array(),
				),
			'dd' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Table

			'table' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('caption', 'colgroup', 'thead', 'tbody', 'tfoot', 'tr'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'caption' => array(
					'alternative' => 'div',
					'void' => false,
					'children' =>$categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'colgroup' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('col'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'col' => array(
					'alternative' => 'div',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'thead' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('tr'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'tbody' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('tr'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'tfoot' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('tr'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'tr' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array('th', 'td'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'th' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'td' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Form

			'form' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array('form'),
					'attributes' => array(),
				),
			'fieldset' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => array_merge($categories['flow'], array('legend')),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'legend' => array(
					'alternative' => 'div',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'label' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array('label'),
					'attributes' => array(),
				),
			'input' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'keygen' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'details' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array_merge($categories['flow'], array('summary')),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'command' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'summary' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'meter' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array('meter'),
					'attributes' => array(),
				),
			'progress' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array('progress'),
					'attributes' => array(),
				),
			'select' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('option', 'optgroup'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'optgroup' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('option'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'option' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'datalist' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array_merge($categories['phrasing'], array('option')),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'textarea' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'button' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'output' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Elements

			'img' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'map' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('area'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'area' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'audio' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('source', 'track'),
					'exclusions' => array('audio', 'video'),
					'attributes' => array(),
				),
			'canvas' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'svg' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'figure' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array_merge($categories['flow'], array('figcaption')),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'figcaption' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['flow'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'video' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('source', 'track'),
					'exclusions' => array('audio', 'video'),
					'attributes' => array(),
				),
			'object' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('param'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'embed' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'param' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'source' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'track' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'iframe' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'menu' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array_merge($categories['flow'], array('li', 'menu', 'menuitem', 'hr')),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'menuitem' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Breaks

			'hr' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'br' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'wbr' => array(
					'alternative' => 'span',
					'void' => true,
					'children' => array(),
					'exclusions' => array(),
					'attributes' => array(),
				),

		//--------------------------------------------------
		// Phrase

			'a' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'], // Putting a div inside a link is just wrong (even if valid).
					'exclusions' => array(),
					'attributes' => array(
							'href' => array('type' => 'url', 'default' => '#', 'protocols' => array('#local', 'http', 'https')),
						),
				),
			'span' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'abbr' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'cite' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'code' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'dfn' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array('dfn'),
					'attributes' => array(),
				),
			'em' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'kbd' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'mark' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'q' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			's' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'small' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'samp' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'strong' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'sub' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'sup' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'time' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array('time'),
					'attributes' => array(),
				),
			'var' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'pre' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'ins' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'del' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('#text'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'u' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'b' => 'strong',
			'i' => 'em',

		//--------------------------------------------------
		// Formatting

			'bdi' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'bdo' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(
							'dir' => array('type' => 'list', 'default' => 'auto', 'values' => array('ltr', 'rtl', 'auto')),
						),
				),
			'ruby' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => array('rp', 'rt'),
					'exclusions' => array(),
					'attributes' => array(),
				),
			'rp' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),
			'rt' => array(
					'alternative' => 'span',
					'void' => false,
					'children' => $categories['phrasing'],
					'exclusions' => array(),
					'attributes' => array(),
				),

	);

?>