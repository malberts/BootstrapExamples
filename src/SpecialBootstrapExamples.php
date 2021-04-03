<?php

namespace BootstrapExamples;

use SpecialPage;

class SpecialBootstrapExamples extends SpecialPage {
	function __construct() {
		parent::__construct( 'BootstrapExamples' );
	}

	function execute( $par ) {
		$request = $this->getRequest();
		$out = $this->getOutput();
		$this->setHeaders();
		$out->addModules( array( 'ext.bootstrapExamples' ) );

		// Show Bootstrap library version.
        $out->addHTML( '<p>Bootstrap library version: <span id="bootstrap-version"></span>' );

		// Add the default example.
        $examples = file_get_contents( __DIR__ . '/../resources/examples.html' );

		// Extract sections into navigation.
		preg_match_all( '|<h1 id="([^"]+)">([^<]+)</h1>|s', $examples, $matches, PREG_SET_ORDER );
        $out->addHTML( '<ul class="nav nav-pills">' );
		foreach( $matches as $match ) {
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
			'<p class="border rounded bg-light p-2 mt-3">'.
			"Based on the Bootstrap 4.6 " .
			'<a href="https://bootswatch.com/default/" target="_blank">' .
			"Bootswatch Default Example" .
			"</a> " .
			"by ".
			'<a href="https://thomaspark.co/">Thomas Park</a>. ' .
			'(<a href="https://github.com/thomaspark/bootswatch/commit/8c3aaf30775b4010ca3f42ecd7a7792276fe29f6">Source</a>)' .
			"</p>"
		);
	}

	function getGroupName() {
		return 'bootstrapexamples';
	}
}
