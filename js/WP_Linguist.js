var WP_Linguist = Backbone.Model.extend({

	initialize: function() {
		this.module_manager = new WP_Linguist_Module_Manager();
	},

	update: function(content) {
		this.module_manager.each(function(module) {
			module.update(content);
		});
	}

});