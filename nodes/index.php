<?php

//--------------------------------------------------
// Setup

	require_once('../html-filter.php');

	header('Content-Type: text/plain; charset=UTF-8');

//--------------------------------------------------
// Get nodes

	$mode = 'html5';

	require_once(dirname(__FILE__) . '/' . $mode . '.php');

//--------------------------------------------------
// Check config

	$filter = new html_filter(array(
			'nodes' => $nodes,
		));

	$filter->config_check();

//--------------------------------------------------
// Printout children

	$output = '';

	function list_format($list, $indent = '  ') {
		$list = implode(', ', $list);
		$list = wordwrap($list, 75, "\n", false);
		$list = preg_replace('/^/m', $indent, $list);
		return $list;
	}

	foreach ($nodes as $node_name => $node_info) {
		if (is_array($node_info)) {

			sort($node_info['children']);

			if (count($node_info['children']) > 0) {
				$children = list_format($node_info['children']);
			} else {
				$children = '  N/A';
			}

			$output .= $node_name . ':' . "\n" . $children . "\n\n";

		}
	}

	echo $output;

//--------------------------------------------------
// Save

	file_put_contents(dirname(__FILE__) . '/' . $mode . '.txt', $output);

?>