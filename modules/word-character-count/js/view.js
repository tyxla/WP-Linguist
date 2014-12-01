// Main WP_Linguist.Module_View.Word_Character_Count view

(function($){
	WP_Linguist.Module_View.Word_Character_Count = WP_Linguist.Module_View.extend({
		
		initialize: function() {
			// make sure view is updated on module update
			this.model.on('change', this.render, this);
		},

		render: function(content) {
			// recount stats
			this.model.count(content);

			// TODO: populate stats in the view
		}

	});
})(jQuery);