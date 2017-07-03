<?php
add_action( 'widgets_init', 'theme_register_sidebars' );
function theme_register_sidebars() {
	// primary sidebar
	register_sidebar(array(
		'name' => __('Primary Sidebar', 'etuts'),
		'id' => 'sidebar_primary',
		'description' => __('The primary sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="primary-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title primary-widget-title">',
		'after_title' => '</h3>'
	));
	// single sidebar
	register_sidebar(array(
		'name' => __('single Sidebar', 'etuts'),
		'id' => 'sidebar_single',
		'description' => __('The single sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="single-widget post-list-item widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title single-widget-title">',
		'after_title' => '</h3>'
	));
	// page sidebar
	register_sidebar(array(
		'name' => __('page Sidebar', 'etuts'),
		'id' => 'sidebar_page',
		'description' => __('The page sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="page-widget post-list-item widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title page-widget-title">',
		'after_title' => '</h3>'
	));
	// shop sidebar
	register_sidebar(array(
		'name' => __('shop Sidebar', 'etuts'),
		'id' => 'sidebar_shop',
		'description' => __('The shop sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="shop-widget post-list-item widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title shop-widget-title">',
		'after_title' => '</h3>'
	));
	// user sidebar
	register_sidebar(array(
		'name' => __('user Sidebar', 'etuts'),
		'id' => 'sidebar_user',
		'description' => __('The user sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="user-widget post-list-item widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title user-widget-title">',
		'after_title' => '</h3>'
	));
	// bbpress sidebar
	register_sidebar(array(
		'name' => __('bbpress Sidebar', 'etuts'),
		'id' => 'sidebar_bbpress',
		'description' => __('The bbpress sidebar widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="bbpress-widget post-list-item widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title bbpress-widget-title">',
		'after_title' => '</h3>'
	));
	// footer widget area
	register_sidebar(array(
		'name' => __('Footer Widgets', 'etuts'),
		'id' => 'footer_widgets',
		'description' => __('The footer widget area', 'etuts'),
		'before_widget' => '<li id="%1$s" class="footer-widget widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title section-title footer-widget-title">',
		'after_title' => '</h3>'
	));
}
// image sizes and menus and theme supports and textdomain
add_action( 'after_setup_theme', 'after_theme_setup_registers' );
function after_theme_setup_registers() {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'homepage-thumb', 180, 180, true ); // (cropped)
	add_image_size( 'widget-post-list-thumb', 90, 90, true ); // (cropped)
	register_nav_menu( 'primary-menu', __( 'Primary Menu', 'etuts' ) );
	register_nav_menu( 'right-menu', __( 'Right Menu', 'etuts' ) );
	register_nav_menu( 'curruser-menu', __( 'Curruser Menu', 'etuts' ) );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
	load_theme_textdomain( 'etuts', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'bbpress' );
	add_theme_support( 'post-formats', array( 'aside' ));
	add_theme_support( 'custom-header', array(
		'flex-width'    => true,
		'width'         => 980,
		'flex-height'    => true,
		'height'        => 200,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
	));
}
// enqueue styles and scripts
function theme_enqueue_styles() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome.min', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main-script.js', array( 'jquery' ), false, true );
	// wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/js/progressbar.js', array( 'jquery' ), false, true );
	wp_enqueue_style('woocommerce-general-custom', get_template_directory_uri() . '/css/woocommerce.css', array('woocommerce-general'));
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// register story post type
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'vmoh_user_stories',
		array(
			'labels' => array(
			'name' => __( 'Stories' ),
			'singular_name' => __( 'Story' )
			),
			'public' => true,
			'has_archive' => true,
			'menu_position' => 5,
			'menu_icon' => 'dashicons-book-alt',
			'supports' => array('title', 'editor', 'author', 'comments', 'custom-fields'),
			'taxonomies' => array('category'),
			'rewrite' => array('slug' => 'story')
		)
	);
}

// Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', false, '3.1.0');
		wp_enqueue_script('jquery', false, array(), false, true);
	}
}
add_action('init', 'modify_jquery');

// custom css and js for login page
function theme_login_page_stylesheet() {
	wp_enqueue_style( 'login-page', get_stylesheet_directory_uri() . '/css/login-page.css' );
	wp_enqueue_script( 'login-page', get_stylesheet_directory_uri() . '/js/login-page.js' );
}
add_action( 'login_enqueue_scripts', 'theme_login_page_stylesheet' );

// change login page logo url
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return get_home_url();
}

// remove admin bar
add_filter('show_admin_bar', '__return_false');

// custom css in dashboard
add_action('admin_head', 'my_admin_custom_style');
function my_admin_custom_style() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/css/admin-style.css">';
}

// show featured image in rss 
add_filter('the_excerpt_rss', 'featuredtoRSS');
add_filter('the_content_feed', 'featuredtoRSS');
function featuredtoRSS($content) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '<div>' . get_the_post_thumbnail( $post->ID, 'medium', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
	}
	return $content;
}

// delete attached images and files from the posts, when you delete it
add_action('before_delete_post', 'delete_post_media');
function delete_post_media( $post_id ) {
	if(!isset($post_id)) return; // Will die in case you run a function like this: delete_post_media($post_id); if you will remove this line - ALL ATTACHMENTS WHO HAS A PARENT WILL BE DELETED PERMANENTLY!
	elseif($post_id == 0) return; // Will die in case you have 0 set. there's no page id called 0 :)
	elseif(is_array($post_id)) return; // Will die in case you place there an array of pages.
	else {
		$attachments = get_posts( array(
				'post_type'      => 'attachment',
				'posts_per_page' => -1,
				'post_status'    => 'any',
				'post_parent'    => $post_id
		) );

		foreach ( $attachments as $attachment ) {
			if ( false === wp_delete_attachment( $attachment->ID ) ) {
				// Log failure to delete attachment.
			}
		}
	}
}

// adding file types for upload
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['zip'] = 'application/zip';
	return $existing_mimes;
}

// Etuts Function for excerpt with custom character size
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '[...]';
	} else {
		echo $excerpt;
	}
}

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');
// Enable PHP in widgets
add_filter('widget_text','execute_php',100);
function execute_php($html){
	 if(strpos($html,"<"."?php")!==false){
		ob_start();
		eval("?".">".$html);
		$html=ob_get_contents();
		ob_end_clean();
	 }
	 return $html;
}
// ************ edit roles and capablities ********
// contributors
if ( current_user_can('contributor') )
	add_action('admin_init', 'allow_contributor_uploads');
function allow_contributor_uploads() {
	$contributor = get_role('contributor');
	
	$contributor->add_cap('upload_files');
	$contributor->add_cap('edit_published_posts');
}
// ************ END edit roles and capablities ********
// Etuts function to get the icon of the category by term_id
function get_category_icon($term_id) {
	$available_icons = array('design', 'desktop', 'mobile', 'code', 'game', 'web', 'elec');
	if (in_array($term_id, $available_icons)) {
		if ( $term_id == 'design' )
			$fontawesome_icon_code = 'paint-brush';
		elseif ( $term_id == 'desktop' )
			$fontawesome_icon_code = 'laptop';
		elseif ( $term_id == 'mobile' )
			$fontawesome_icon_code = 'mobile';
		elseif ( $term_id == 'code' )
			$fontawesome_icon_code = 'code';
		elseif ( $term_id == 'game' )
			$fontawesome_icon_code = 'gamepad';
		elseif ( $term_id == 'web' )
			$fontawesome_icon_code = 'globe';
		elseif ( $term_id == 'elec' ) {
			$fontawesome_icon_code = 'microchip';
		}
		return '<i class="fa fa-' . $fontawesome_icon_code . '" aria-hidden="true"></i>';
	}
	return '';
}

// pagination function used in navigation.php
function pagination_bar($echo_out = True) {
	global $wp_query;
 
	$total_pages = $wp_query->max_num_pages;
	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
 
		if ($echo_out) {
			echo paginate_links(array(
				'base' => get_pagenum_link(1) . '%_%',
				'format' => '/page/%#%',
				'current' => $current_page,
				'total' => $total_pages,
				'mid_size' => 4,
			));
		}
		return True;
	}
	return False;
}

// fix pagination in archive pages
add_action('init','archive_pages_fix_pagination_function');
function archive_pages_fix_pagination_function() {
	global $wp_rewrite;
	//add rewrite rule.
	add_rewrite_rule("author/([^/]+)/page/?([0-9]{1,})/?$",'index.php?author_name=$matches[1]&paged=$matches[2]','top');
	add_rewrite_rule("(.+?)/page/?([0-9]{1,})/?$",'index.php?category_name=$matches[1]&paged=$matches[2]','top');
	$wp_rewrite->flush_rules(false);
}

// Change default comment fields, add placeholder and change type attributes.
add_filter( 'comment_form_default_fields', 'wpse_62742_comment_placeholders' );
function wpse_62742_comment_placeholders( $fields )
{
	$fields['comment'] = str_replace(
		'<textarea id="comment" name="comment" cols="45" rows="8"',
		'<textarea id="comment" name="comment" cols="45" rows="5" placeholder="نظر شما در مورد این مطلب"',
		$fields['comment']
	);
	$fields['author'] = str_replace(
		'<input',
		'<input placeholder="نام (دلخواه)"',
		$fields['author']
	);
	$fields['email'] = str_replace(
		'<input id="email" name="email"',
		'<input placeholder="ایمیل (دلخواه)(برای مطلع شدن از پاسخ)"  id="email" name="email"',
		$fields['email']
	);
	$fields['url'] = str_replace(
		'<input id="url" name="url"',
		'<input placeholder="سایت شما (دلخواه)" id="url" name="url"',
		$fields['url']
	);

	return $fields;
}

// ajax popup login form
function ajax_login_init(){
	wp_register_script('ajax-login-script', get_template_directory_uri() . '/js/ajax-login-script.js', array('jquery') ); 
	wp_enqueue_script('ajax-login-script');

	wp_localize_script( 'ajax-login-script', 'ajax_login_object', array( 
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'redirecturl' => home_url(),
		'loadingmessage' => __('Sending user info, please wait...','etuts')
	));

	// Enable the user with no privileges to run ajax_login() in AJAX
	add_action( 'wp_ajax_nopriv_ajaxlogin', 'ajax_login' );
}
if (!is_user_logged_in()) { // Execute the action only if the user isn't logged in
	add_action('init', 'ajax_login_init');
}
function ajax_login(){

	// First check the nonce, if it fails the function will break
	check_ajax_referer( 'ajax-login-nonce', 'security' );

	// Nonce is checked, get the POST data and sign user on
	$info = array();
	$info['user_login'] = $_POST['user_login'];
	$info['user_password'] = $_POST['user_pass'];
	$info['remember'] = true;

	$user_signon = wp_signon( $info, false );
	if ( is_wp_error($user_signon) ){
		echo json_encode(array('loggedin'=>false, 'message'=>__('Wrong username or password.','etuts')));
	} else {
		echo json_encode(array('loggedin'=>true, 'message'=>__('Login successful, reloading...','etuts')));
	}

	die();
}

// Rename post formats
function rename_post_formats($translation, $text, $context, $domain) {
	$names = array(
		'Aside'  => 'Quick Tip',
		// 'Status' => 'Tweet'
	);
	if ($context == 'Post format') {
		$translation = str_replace(array_keys($names), array_values($names), $text);
	}
	return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);

// disable automatic paragraphs in WordPress editor
remove_filter('the_content', 'wpautop');


function get_user_edit_profile_link($id) {
	return get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename', $id) . '/edit';
}