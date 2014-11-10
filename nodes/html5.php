<?php

	$nodes = array(
		'html' => array(
				'children' => array('head', 'body'),
			),
		'body' => array(
				'children' => array('#text', 'div', 'p', 'a'),
			),
		'div' => array(
				'children' => array('#text', 'div', 'p', 'a'),
			),
		'p' => array(
				'children' => array('#text', 'span', 'a', 'br'),
			),
		'br' => array(
				'closing' => true,
				'children' => array(),
			),
		'span' => array(
				'children' => array('a'),
				'attributes' => array(
					),
			),
		'a' => array(
				'children' => array(),
				'attributes' => array(
						'href' => array('type' => 'url', 'default' => '#', 'protocols' => array('#local', 'http', 'https')),
					),
			),
	);

	// Self closing: area, base, basefont, br, col, command, embed, frame, hr, img, input, keygen, link, meta, param, source, track, wbr

		// 'a'
		// 'abbr'
		// 'address'
		// 'area'
		// 'article'
		// 'aside'
		// 'audio'
		// 'b'
		// 'base'
		// 'bb'
		// 'bdo'
		// 'blockquote'
		// 'body'
		// 'br'
		// 'button'
		// 'canvas'
		// 'caption'
		// 'cite'
		// 'code'
		// 'col'
		// 'colgroup'
		// 'command'
		// 'datagrid'
		// 'datalist'
		// 'dd'
		// 'del'
		// 'details'
		// 'dfn'
		// 'dialog'
		// 'div'
		// 'dl'
		// 'dt'
		// 'em'
		// 'embed'
		// 'fieldset'
		// 'figure'
		// 'footer'
		// 'form'
		// 'h1'
		// 'h2'
		// 'h3'
		// 'h4'
		// 'h5'
		// 'h6'
		// 'head'
		// 'header'
		// 'hr'
		// 'html'
		// 'i'
		// 'iframe'
		// 'img'
		// 'input'
		// 'ins'
		// 'kbd'
		// 'label'
		// 'legend'
		// 'li'
		// 'link'
		// 'map'
		// 'mark'
		// 'menu'
		// 'meta'
		// 'meter'
		// 'nav'
		// 'noscript'
		// 'object'
		// 'ol'
		// 'optgroup'
		// 'option'
		// 'output'
		// 'p'
		// 'param'
		// 'pre'
		// 'progress'
		// 'q'
		// 'rp'
		// 'rt'
		// 'ruby'
		// 'samp'
		// 'script'
		// 'section'
		// 'select'
		// 'small'
		// 'source'
		// 'span'
		// 'strong'
		// 'style'
		// 'sub'
		// 'sup'
		// 'table'
		// 'tbody'
		// 'td'
		// 'textarea'
		// 'tfoot'
		// 'th'
		// 'thead'
		// 'time'
		// 'title'
		// 'tr'
		// 'ul'
		// 'var'
		// 'video'

?>