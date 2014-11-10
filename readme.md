
# HTML Filter

A very basic PHP based HTML filter, using [DOMDocument::loadHTML](http://php.net/manual/en/domdocument.loadhtml.php) to parse the HTML.

It then simply creates a new DOMDocument by only copying across the nodes and attributes which are recognised / trusted.

This is intended to work with [PHP Prime](http://www.phpprime.com/), when it requires a WYSIWYG editor.
