// Main WP_Linguist.Module_View.Word_Character_Count view

(function($){
	WP_Linguist.Module_View.Word_Character_Count = WP_Linguist.Module_View.extend({
		
		initialize: function() {
			this.model.on('change', this.render, this);
		},

		render: function(content) {
			
		}

	});
})(jQuery);