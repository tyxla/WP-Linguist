// Main WP_Linguist.Editor model

(function($){
	WP_Linguist.Editor = Backbone.Model.extend({

		initialize: function() {
			var obj = this;

			$(window).on('load', function() {
				// make sure that we continue only if tinyMCE is there
				if (typeof tinyMCE === 'undefined') {
					return;
				}

				// call our update method when the tinyMCE main editor is updated
				obj.instance = tinyMCE.get('content');
				if (obj.instance) {
					obj.instance.on('change', function(e) {
						obj.update( this.getContent() );
					});

					// initial update to load the initial stats
					obj.instance.fire('change');
				}
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