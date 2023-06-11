( function () {

	/**
	 * @class mw.bootstrapExamples
	 * @singleton
	 */
	mw.bootstrapExamples = {
	};

	mw.hook( 'wikipage.content' ).add( () => {
		mw.loader.using( 'ext.bootstrap.scripts', () => {
			// Get Bootstrap library version.
			var version = $.fn.tooltip.Constructor.VERSION;
			if ( version === undefined ) {
				version = 'not found';
			}
			document.getElementById( 'bootstrap-version' ).textContent = version;

			$( 'a[href="#"]' ).click( function ( event ) {
				event.preventDefault();
			} );

			$( '.bs-component [data-bs-toggle="popover"]' ).popover();
			$( '.bs-component [data-bs-toggle="tooltip"]' ).tooltip();
		} );
	} );

}() );
