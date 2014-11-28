var WP_Linguist_Module;

(function($){
	WP_Linguist_Module = Backbone.Model.extend({

		initialize: function() {
			wp_linguist.module_manager.add(this);
		},

		update: function() {
			this.trigger('change');
		}

	});
})(jQuery);