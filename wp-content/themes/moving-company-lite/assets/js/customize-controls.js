( function( api ) {

	// Extends our custom "moving-company-lite" section.
	api.sectionConstructor['moving-company-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );