<?php
/**
 * default search form
 */
?>
<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" placeholder="<?php _e( 'Search ...', 'etuts' ); ?>" name="s" size="60" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
	<select name="category_name">
	<option value="">کل سایت</option>
	<?php
	// generate list of categories
	$categories = get_categories(array(
        'orderby' => 'name',
        'parent' => 0
    ));
	foreach ($categories as $category) {
		echo '<option value="', $category->slug, '">', $category->name, "</option>\n";
	}
	?>
	</select>
    <!-- <input type="submit" id="search-submit" value="<?php echo esc_attr( 'Search', 'etuts' ); ?>" /> -->
    <button type="submit" id="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>