// Main WP_Linguist.Module.Word_Character_Count model 

(function($){
	WP_Linguist.Module.Word_Character_Count = WP_Linguist.Module.extend({

		// process statistics
		count: function(content) {
			// we might need the unfiltered content for later
			var unfiltered_content = content;

			// strip HTML tags
			content = content.replace(/(<([^>]+)>)/ig, "");

			// collect all words, lowercase
			words = content ? content.match(/\S+/gm) : [];
			for(var i = 0; i < words.length; i++) {
				words[i] = words[i].replace(/\W+/g, '').toLowerCase();
			}

			// count & populate data
			this.module_data = {
				words: this.count_words(content),
				unique_words: this.count_unique_words(words),
				characters: this.count_characters(content),
				characters_no_spaces: this.count_characters_no_spaces(content),
				sentences: this.count_sentences(content),
				avg_word_characters: this.count_avg_word_characters(content),
				avg_sentence_words: this.count_avg_sentence_words(content),
				avg_sentence_characters: this.count_avg_sentence_characters(content),
				paragraphs: this.count_paragraphs(unfiltered_content)
			};
		},

		// count the number of words
		count_words: function(content) {
			return content ? content.match(/\S+/gm).length : 0;
		},

		// count the number of unique words
		count_unique_words: function(words) {
			var unique_words = [];
			for(var i = 0; i < words.length; i++) {
				if (unique_words.indexOf(words[i]) == -1) {
					unique_words.push(words[i]);
				}
			}
			return unique_words.length;
		},

		// count the number of characters
		count_characters: function(content) {
			return content ? content.length : 0;
		},

		// count the number of characters, excluding spaces
		count_characters_no_spaces: function(content) {
			return content ? content.replace(/\s+/g, "").length : 0;
		},

		// count the number of sentences
		count_sentences: function(content) {
			return content ? content.match(/[^\.!\?]+/g).length : 0;
		},

		// calculate the average characters per word
		count_avg_word_characters: function(content) {
			var words = this.count_words(content);
			var characters = this.count_characters_no_spaces(content);
			return words ? Math.round(characters / words) : 0;
		},

		// calculate the average words per sentence
		count_avg_sentence_words: function(content) {
			var sentences = this.count_sentences(content);
			var words = this.count_words(content);
			return sentences ? Math.round(words / sentences) : 0;
		},

		// calculate the average characters per sentence
		count_avg_sentence_characters: function(content) {
			var sentences = this.count_sentences(content);
			var characters = this.count_characters(content);
			return sentences ? Math.round(characters / sentences) : 0;
		},

		// count the number of paragraphs
		count_paragraphs: function(content) {
			return content ? content.split(/(?:<\/p>)|(?:<\/h[1-6]>)/).wp_linguist_clean().length : 0;
		}

	});
})(jQuery);