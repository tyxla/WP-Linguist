(function($){

	// initialize Word & Character Count model
	wp_linguist.module_word_character_count = new WP_Linguist.Module.Word_Character_Count();
	
	// initialize Word & Character Count view
	wp_linguist.module_word_character_count_view = new WP_Linguist.Module_View.Word_Character_Count({
		model: wp_linguist.module_word_character_count,
		id: 'wp-linguist-module-wcc'
	});

})(jQuery);