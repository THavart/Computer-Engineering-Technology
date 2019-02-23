jQuery( document ).ready(function() {
	jQuery( "#your-profile" ).find( ":contains('Personal Options')" ).remove();
	jQuery( "#your-profile" ).find('h3').next().remove();
	jQuery( "#your-profile" ).find('h3').remove();
	jQuery( "#menu-posts-activities ul li" ).find( ":contains('Filters')" ).remove();
	jQuery( "#menu-posts-activities ul li" ).find( ":contains('Categories')" ).remove();
	jQuery('#door-all .selectit input#in-door-90').click(function () {
		jQuery(this).parents('#door-all').find(':checkbox').attr('checked', this.checked);
	});

	jQuery('#winter-all .selectit input#in-winter-93').click(function () {
		jQuery(this).parents('#winter-all').find(':checkbox').attr('checked', this.checked);
	});

	jQuery('#music-all .selectit input#in-music-96').click(function () {
		jQuery(this).parents('#music-all').find(':checkbox').attr('checked', this.checked);
	});

	jQuery('#group-all .selectit input#in-group-100').click(function () {
		jQuery(this).parents('#group-all').find(':checkbox').attr('checked', this.checked);
	});
});