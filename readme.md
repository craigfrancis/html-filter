
# HTML Filter

A very basic PHP based HTML filter, using [DOMDocument::loadHTML](http://php.net/manual/en/domdocument.loadhtml.php) to parse the HTML.

It creates a new DOMDocument by simply copying across the valid nodes and attributes.

There are no dependencies, and was built to filter the output from a WYSIWYG editor.

By default it blocks all style attributes (should be in the style sheet, ref CSP headers), and attributes related to JavaScript (e.g. onclick).

---

## Alternatives

A pretty similar list to the ones found on the HTML Purifier [comparison page](http://htmlpurifier.org/comparison):

[HTML Purifier](http://htmlpurifier.org/) - Does everything, probably the best choice.

[HTML Tidy](http://tidy.sourceforge.net/) - Not a filter, very good at cleaning up markup though.

[HTML Safe](http://pear.php.net/package/HTML_Safe) - Uses black lists, and the [XML_HTMLSax3](http://pear.php.net/package/XML_HTMLSax3/) parser.

[htmLawed](http://www.bioinformatics.org/phplabware/internal_utilities/htmLawed/) - Uses regexp in hl_tag() to parse HTML.

[Kses](http://sourceforge.net/projects/kses/) - Uses regexp in kses_split() to parse HTML.

[OWASP HTML Sanitizer](https://www.owasp.org/index.php/OWASP_Java_HTML_Sanitizer_Project) - Java based
