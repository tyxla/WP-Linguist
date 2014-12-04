// Main WP_Linguist.Module.Word_Character_Count model 

(function($){
	WP_Linguist.Module.Word_Character_Count = WP_Linguist.Module.extend({

		count: function(content) {
			// strip HTML tags
			content = content.replace(/(<([^>]+)>)/ig, "");

			// count & populate data
			// WIP: make dynamic
			this.module_data = {
				words: this.count_words(content),
				characters: this.count_characters(content),
				characters_no_spaces: this.count_characters_no_spaces(content),
				sentences: this.count_sentences(content),
				avg_sentence_words: this.count_avg_sentence_words(content),
				avg_sentence_characters: this.count_avg_sentence_characters(content),
				paragraphs: 1
			};
		},

		count_words: function(content) {
			return content ? content.match(/\S+/g).length : 0;
		},

		count_characters: function(content) {
			return content ? content.length : 0;
		},

		count_characters_no_spaces: function(content) {
			return content ? content.replace(/\s+/g, "").length : 0;
		},

		count_sentences: function(content) {
			return content ? content.match(/[^\.!\?]+/g).length : 0;
		},

		count_avg_sentence_words: function(content) {
			var sentences = this.count_sentences(content);
			var words = this.count_words(content);
			return sentences ? Math.round(words / sentences) : 0;
		},

		count_avg_sentence_characters: function(content) {
			var sentences = this.count_sentences(content);
			var characters = this.count_characters(content);
			return sentences ? Math.round(characters / sentences) : 0;
		}

	});
})(jQuery);