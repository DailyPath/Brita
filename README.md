Brita component with HTML Purifier
==================================

Created by [debuggeddesigns](http://bakery.cakephp.org/users/view/debuggeddesigns) published in the CakePHP Bakery: [Brita component with HTML Purifier](http://bakery.cakephp.org/articles/debuggeddesigns/2008/11/04/brita-component-with-html-purifier "Brita component with HTML Purifier | The Bakery, Everything CakePHP").

Brita is a CakePHP Component wrapper class created to take advantage of the functionality provided by HTML Purifier. HTML Purifier is a standards-compliant HTML filter library written in PHP. HTML Purifier will not only remove all malicious code (better known as XSS) with a thoroughly audited, secure yet permissive whitelist, it will also make sure your documents are standards compliant, something only achievable with a comprehensive knowledge of W3C's specifications.

Makes use of [HTML Purifier](http://htmlpurifier.org/download.html).

Installation and Usage:
-------------

1. Clone or download and decompress repository into `app/vendors/brita`.
1. Import the `Brita` component in your controller.

	```php
	<?php
		var $components = array('Brita');
	?>
	```	

1. Use the component clean method to purify content.

	```php
	<?php
		$clean_content = $this->Brita->purify($dirty_content);
	?>
	```