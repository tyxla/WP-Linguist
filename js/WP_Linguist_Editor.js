// Main WP_Linguist.Editor model

(function($){
	WP_Linguist.Editor = Backbone.Model.extend({

		initialize: function() {
			var obj = this;
			$(window).on('load', function() {
				obj.instance = tinyMCE.get('content');
				obj.instance.on('change', function(e) {
					obj.update( this.getContent() );
				});
			});
		},

		update: function(content) {
			wp_linguist.update(content);
		}

	});
})(jQuery);