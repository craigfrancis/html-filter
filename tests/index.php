<?php

//--------------------------------------------------
// Setup

	require_once('../html-filter.php');

	header('Content-Type: text/plain; charset=UTF-8');

//--------------------------------------------------
// Test

	function test_path($id) {
		return './' . str_pad(intval($id), 3, '0', STR_PAD_LEFT) . '.html';
	}

	$test_path = test_path(isset($_GET['id']) ? $_GET['id'] : 0);
	if (!is_file($test_path)) {
		$test_path = test_path(1);
	}

	$test_html = file_get_contents($test_path);

//--------------------------------------------------
// Filter

	$filter = new html_filter();
	$filter->config_check();

	$output_html = $filter->process($test_html);

//--------------------------------------------------
// Output

	$output  = rtrim($test_html) . "\n\n";
	$output .= '--------------------------------------------------' . "\n\n";
	$output .= rtrim($output_html) . "\n\n";
	$output .= '--------------------------------------------------' . "\n\n";

	foreach ($filter->errors_get() as $error) {
		$output .= $error . "\n";
	}

	echo $output;

?>