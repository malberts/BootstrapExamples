<?php

namespace BootstrapExamples;

use SpecialPage;

class SpecialBootstrapExamples extends SpecialPage {
	public function __construct() {
		parent::__construct( 'BootstrapExamples' );
	}

	/**
	 * Default execute method
	 * Checks user permissions
	 *
	 * This must be overridden by subclasses; it will be made abstract in a future version
	 *
	 * @stable to override
	 *
	 * @param string|null $subPage
	 */
	public function execute( $subPage ) {
		$request = $this->getRequest();
		$out = $this->getOutput();
		$this->setHeaders();
		$out->addModules( [ 'ext.bootstrapExamples' ] );

		// Show Bootstrap library version.
		$out->addHTML( '<p>Bootstrap library version: <span id="bootstrap-version"></span>' );

		// Add the default example.
		$examples = file_get_contents( __DIR__ . '/../resources/examples.html' );

		// Extract sections into navigation.
		preg_match_all( '|<h1 id="([^"]+)">([^<]+)</h1>|s', $examples, $matches, PREG_SET_ORDER );
		$out->addHTML( '<ul class="nav nav-pills">' );
		foreach ( $matches as $match ) {
			$out->addHTML(
				'<li class="nav-item">' . "\n" .
				'<a class="nav-link" href="#' . $match[1] . '">' . $match[2] . '</a>' . "\n" .
				'</li>'
			);
		}
		$out->addHTML( "</ul>" );

		$out->addHTML( $examples );

		// Add attribution.
		$out->addHTML(
			'<p class="border rounded bg-light p-2 mt-3">' .
			"Based on the Bootstrap 4.6 " .
			'<a href="https://bootswatch.com/default/" target="_blank">' .
			"Bootswatch Default Example" .
			"</a> " .
			"by " .
			'<a href="https://thomaspark.co/">Thomas Park</a>. ' .
			'(<a href="https://github.com/thomaspark/bootswatch">Source</a>)' .
			"</p>"
		);
	}

	/**
	 * Under which header this special page is listed in Special:SpecialPages
	 * See messages 'specialpages-group-*' for valid names
	 * This method defaults to group 'other'
	 *
	 * @stable to override
	 *
	 * @return string
	 * @since 1.21
	 */
	protected function getGroupName() {
		return 'bootstrapexamples';
	}
}
