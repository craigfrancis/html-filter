
# HTML Filter

A very basic HTML filter, using the DOMDocument in PHP to parse the HTML via [loadHTML](http://php.net/manual/en/domdocument.loadhtml.php), then create a new DOMDocument by only copying across the nodes and attributes which are recognised.

This is intended to work with the [PHP Prime website](http://www.phpprime.com/), if the project requires the use of a WYSIWYG editor.
