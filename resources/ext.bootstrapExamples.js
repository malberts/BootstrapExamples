( function () {

	/**
	 * @class mw.bootstrapExamples
	 * @singleton
	 */
	mw.bootstrapExamples = {
	};

	// Get Bootstrap library version.
	var version = $.fn.tooltip.Constructor.VERSION;
	if ( version === undefined ) {
		version = 'not found';
	}
	document.getElementById( 'bootstrap-version' ).textContent = version;

	$( 'a[href="#"]' ).click(function ( event ) {
		event.preventDefault();
	});

	$( '.bs-component [data-toggle="popover"]' ).popover();
	$( '.bs-component [data-toggle="tooltip"]' ).tooltip();

}() );
