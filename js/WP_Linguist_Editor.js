// Main WP_Linguist.Editor model

(function($){
	WP_Linguist.Editor = Backbone.Model.extend({

		initialize: function() {
			var obj = this;

			$(window).on('load', function() {

				// call our update method when the tinyMCE main editor is updated
				obj.instance = tinyMCE.get('content');
				obj.instance.on('change', function(e) {
					obj.update( this.getContent() );
				});

			});
		},

		update: function(content) {
			// when main tinyMCE editor is updated, update the main object
			// which will consecutively update all module models
			// and respectively, their views
			wp_linguist.update(content);
		}

	});
})(jQuery);