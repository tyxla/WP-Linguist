// Main WP_Linguist.Module_View.Word_Character_Count view

(function($){
	WP_Linguist.Module_View.Word_Character_Count = WP_Linguist.Module_View.extend({
		
		// constructor
		initialize: function() {
			// make sure view is updated on module update
			this.model.on('change', this.render, this);
		},

		// insert new data or update the current data
		// after the model is updated
		render: function(content) {
			// recount stats
			this.model.count(content);

			// populate stats in the view
			for( stat in this.model.module_data ) {
				$('#wp-linguist-module-wcc-' + stat).text( this.model.module_data[stat] );
			}
		}

	});
})(jQuery);