<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- MAKE IT RESPONSIVE -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php // title tag // support older versions
        if ( ! function_exists( '_wp_render_title_tag' ) ) {
            function theme_slug_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php }
            add_action( 'wp_head', 'theme_slug_render_title' );
        }
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=newtheme1">
    <link rel="icon" type="image/png" href="/favicon-32x32.png?v=newtheme1" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png?v=newtheme1" sizes="16x16">
    <link rel="manifest" href="/manifest.json?v=newtheme1">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=newtheme1" color="#3c5831">
    <link rel="shortcut icon" href="/favicon.ico?v=newtheme1">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#3c5831">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#3c5831">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#3c5831">
    <!-- Google webmaster tools -->
    <meta name="google-site-verification" content="5-ZWQH6ykEjmVqBbDf397gzqHWIOkdYaBZwbx6EamFg" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="topMenu">
    	<div id="rightMenuToggle"><i class="fa fa-bars fa-lg" aria-hidden="true"></i></div>
        <a href="<?php echo get_bloginfo('url'); ?>" title="<?php echo get_bloginfo('name'); ?>">
            <div id="top-logo">
                <span><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/logo40.png" alt="<?php echo get_bloginfo('name'); ?>"></span>
                <h1 id="site-logo-name"><?php echo get_bloginfo('name'); ?></h1>
            </div>
        </a>
        <?php wp_nav_menu( array( 'menu' => 'primary-menu' ) ); ?>
        
        <?php get_template_part('user','menu'); ?>
        
    </div>
    <header id="header">
        <div id="background-image">
            <img src="<?php header_image(); ?>">
        </div>
        
        <div id="logo-description">
            <a href="<?php echo get_bloginfo('url'); ?>" title="<?php echo get_bloginfo('name'); ?>">
                <div>
                    <img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/header-logo.png" alt="">
                    <h1><?php echo get_bloginfo('name'); ?></h1>
                </div>
            </a>
        </div>
        <div id="header-search-form">
            <?php get_search_form(true); ?>
        </div>
        <div id="list-categories">
            <ul>
            <?php
				$categories = get_categories(array(
                    'orderby' => 'name',
                    'parent' => 0
                ));
				 
				foreach( $categories as $category ) {
				    $category_link = sprintf( 
				        '<a href="%1$s" title="%2$s">%4$s %3$s</a>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_attr( sprintf( __( 'View all posts in %s', 'etuts' ), $category->name ) ),
				        esc_html( $category->name ),
                        get_category_icon( $category->slug )
				    );
				     
				    echo '<li>' . sprintf( esc_html('%s'), $category_link ) . '</li> ';
				}
        	?>
            </ul>
        </div>
    </header>