<?php

//--------------------------------------------------
// Setup

	require_once('../html-filter.php');

	header('Content-Type: text/plain; charset=UTF-8');

//--------------------------------------------------
// Test

	function test_path($id, $ext = 'html') {
		return './' . str_pad(intval($id), 3, '0', STR_PAD_LEFT) . '.' . $ext;
	}

	$test_id = intval(isset($_GET['id']) ? $_GET['id'] : 0);

	$test_path = test_path($test_id);

	if (!is_file($test_path)) {
		$test_id = 1;
		$test_path = test_path($test_id);
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

//--------------------------------------------------
// Save

	file_put_contents(test_path($test_id, 'txt'), $output);

?>