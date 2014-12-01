// Main WP_Linguist.Module.Word_Character_Count model 

(function($){
	WP_Linguist.Module.Word_Character_Count = WP_Linguist.Module.extend({

		count: function(content) {
			// strip HTML tags
			content = content.replace(/(<([^>]+)>)/ig, "");

			// count & populate data
			this.module_data = {
				// TODO: populate stats here
			};
		}

	});
})(jQuery);