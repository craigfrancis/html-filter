<?php

	require_once('../html-filter.php');

	header('Content-Type: text/plain; charset=UTF-8');

	$html = '<div class="xxx">Hello <p class="a">Fish <br> End</div><div><a href="http://example.com" onclick="false">Link</a> Text</div>';

	echo $html . "\n\n";

	$filter = new html_filter();
	$filter->config_check();

	$html = $filter->process($html);

	echo $html . "\n\n";

	print_r($filter->errors_get());

	exit();

?>