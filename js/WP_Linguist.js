// Main WP_Linguist model
var WP_Linguist;

(function($){
	WP_Linguist = Backbone.Model.extend({

		initialize: function() {
			// initialize module manager
			this.module_manager = new WP_Linguist.Module_Manager();

			// initialize editor
			this.editor = new WP_Linguist.Editor();
		},

		update: function(content) {
			// trigger update on all modules
			this.module_manager.each(function(module) {
				module.trigger('change', content);
			});
		}

	});
})(jQuery);