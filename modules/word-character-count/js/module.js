// Main WP_Linguist.Module.Word_Character_Count model 

(function($){
	WP_Linguist.Module.Word_Character_Count = WP_Linguist.Module.extend({

		count: function(content) {
			// strip HTML tags
			content = content.replace(/(<([^>]+)>)/ig, "");

			// count & populate data
			// TODO: make dynamic
			this.module_data = {
				words: this.count_words(content),
				characters: 21,
				characters_no_spaces: 17,
				sentences: 2,
				avg_sentence_words: 3,
				avg_sentence_characters: 11,
				paragraphs: 1
			};
		},

		count_words: function(content) {
			return content.match(/\S+/g).length;
		}

	});
})(jQuery);