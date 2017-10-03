<?php

function get_user_contact_methods($user_id, $return_html = false)
{
    $contact_methods   = [];
    $contact_methods[] = ['data' => get_user_meta($user_id, 'telegram_id', true), 'url' => 'https://t.me/', 'fontawesome_class' => 'fa-telegram', 'label' => __('Telegram', 'etuts')];
    $contact_methods[] = ['data' => get_user_meta($user_id, 'twitter', true), 'url' => 'https://twitter.com/', 'fontawesome_class' => 'fa-twitter', 'label' => __('Twitter', 'etuts')];
    $contact_methods[] = ['data' => get_user_meta($user_id, 'google_plus', true), 'url' => 'https://plus.google.com/+', 'fontawesome_class' => 'fa-google-plus', 'label' => __('Google+', 'etuts')];
    $contact_methods[] = ['data' => get_user_meta($user_id, 'linkedin', true), 'url' => 'https://linkedin.com/in/', 'fontawesome_class' => 'fa-linkedin', 'label' => __('Linkedin', 'etuts')];
    $contact_methods[] = ['data' => get_user_meta($user_id, 'instagram', true), 'url' => 'https://instagram.com/', 'fontawesome_class' => 'fa-instagram', 'label' => __('Instagram', 'etuts')];

    foreach ($contact_methods as $key => $contact) {
        if (!$contact['data']) {
        	unset($contact_methods[$key]);
		}
    }

    if (!$return_html)
    	return $contact_methods;

    $output = '';
    foreach ($contact_methods as $contact) {
		$output .= '<li><i class="fa ' .$contact['fontawesome_class'] . '" aria-hidden="true"></i><a href="' . $contact['url'] . $contact['data'] .' " target="_blank" rel="nofollow"> '. $contact['label'] .'</a></li>';
	}

    return $output;
}

function get_user_edit_profile_link($id)
{
    return get_bloginfo('url') . '/forums/users/' . get_the_author_meta('nicename', $id) . '/edit';
}

// pagination function used in navigation.php
function pagination_bar($echo_out = true)
{
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;
    if ($total_pages > 1) {
        $current_page = max(1, get_query_var('paged'));

        if ($echo_out) {
            echo paginate_links(array(
                'base'     => get_pagenum_link(1) . '%_%',
                'format'   => '/page/%#%',
                'current'  => $current_page,
                'total'    => $total_pages,
                'mid_size' => 4,
            ));
        }
        return true;
    }
    return false;
}

// Etuts function to get the icon of the category by term_id
function get_category_icon($term_id)
{
    $available_icons = array('design', 'desktop', 'mobile', 'code', 'game', 'web', 'elec');
    if (in_array($term_id, $available_icons)) {
        if ($term_id == 'design') {
            $fontawesome_icon_code = 'paint-brush';
        } elseif ($term_id == 'desktop') {
            $fontawesome_icon_code = 'laptop';
        } elseif ($term_id == 'mobile') {
            $fontawesome_icon_code = 'mobile';
        } elseif ($term_id == 'code') {
            $fontawesome_icon_code = 'code';
        } elseif ($term_id == 'game') {
            $fontawesome_icon_code = 'gamepad';
        } elseif ($term_id == 'web') {
            $fontawesome_icon_code = 'globe';
        } elseif ($term_id == 'elec') {
            $fontawesome_icon_code = 'microchip';
        }
        return '<i class="fa fa-' . $fontawesome_icon_code . '" aria-hidden="true"></i>';
    }
    return '';
}

// Etuts Function for excerpt with custom character size
function the_excerpt_max_charlength($charlength)
{
    $excerpt = get_the_excerpt();
    $charlength++;

    if (mb_strlen($excerpt) > $charlength) {
        $subex   = mb_substr($excerpt, 0, $charlength - 5);
        $exwords = explode(' ', $subex);
        $excut   = -(mb_strlen($exwords[count($exwords) - 1]));
        if ($excut < 0) {
            echo mb_substr($subex, 0, $excut);
        } else {
            echo $subex;
        }
        echo '[...]';
    } else {
        echo $excerpt;
    }
}
