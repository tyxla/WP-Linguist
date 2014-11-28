// Main WP_Linguist_Module model
var WP_Linguist_Module;

(function($){
	WP_Linguist_Module = Backbone.Model.extend({

		initialize: function() {
			// add this module to the module manager
			wp_linguist.module_manager.add(this);
		}

	});
})(jQuery);