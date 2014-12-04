var wp_linguist;

(function($){

	// initialize WP_Linguist
	wp_linguist = new WP_Linguist();
	
})(jQuery);

// Clean array from empty values
Array.prototype.wp_linguist_clean = function() {
	for (var i = 0; i < this.length; i++) {
		if (this[i] == "") {         
			this.splice(i, 1);
			i--;
		}
	}
	return this;
};