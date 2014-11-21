<?php

	require_once('../html-filter.php');

	header('Content-Type: text/plain; charset=UTF-8');

	require_once(dirname(__FILE__) . '/html5.php');

	$filter = new html_filter(array(
			'nodes' => $nodes,
		));

	$filter->config_check();

	function list_format($list, $indent = '  ') {
		$list = implode(', ', $list);
		$list = wordwrap($list, 75, "\n", false);
		$list = preg_replace('/^/m', $indent, $list);
		return $list;
	}

	foreach ($nodes as $node_name => $node_info) {
		sort($node_info['children']);
		echo $node_name . ':' . "\n" . list_format($node_info['children']) . "\n\n";
	}

?>