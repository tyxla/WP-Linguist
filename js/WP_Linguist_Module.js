// Main WP_Linguist.Module model

(function($){
	WP_Linguist.Module = Backbone.Model.extend({

		initialize: function() {
			// add this module to the module manager
			wp_linguist.module_manager.add(this);
		}

	});
})(jQuery);