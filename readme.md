
# HTML Filter

A very basic PHP based HTML filter, using [DOMDocument::loadHTML](http://php.net/manual/en/domdocument.loadhtml.php) to parse the HTML.

It can then create a new DOMDocument by simply copying across the nodes and attributes which are valid.

There are no dependencies, and was built to filter the output from a WYSIWYG editor.
