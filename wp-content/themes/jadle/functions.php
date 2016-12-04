<?php
// functions.php
// Keep it lean and mean.

// Load the theme assets.
new _Container("Assets_Service");

new _Container("AJAX_Service");

if ( function_exists( 'acf_add_options_sub_page' ) ){

    // // Example options custom post type page
    // acf_add_options_sub_page(array(
    //     'title'      => 'Archive Landing Page',
    //     'parent'     => 'edit.php?post_type=archive'
    // ));

	acf_add_options_sub_page(array(
		'title'      => 'Error Page',
		'parent'     => 'admin.php?page=site-settings'
	));

    acf_add_options_sub_page(array(
        'title'      => 'Search Results Page',
        'parent'     => 'admin.php?page=site-settings'
    ));
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Main Menu',
        'menu_title'    => 'Main Menu',
        'menu_slug'     => 'main-menu'
    ));

    acf_add_options_page(array(
        'page_title'    => 'Site Settings',
        'menu_title'    => 'Site Settings',
        'menu_slug'     => 'site-settings'
    ));
}

function jdillman_remove_submenu() {

    remove_submenu_page( 'themes.php', 'nav-menus.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
}

add_action( 'admin_menu', 'jdillman_remove_submenu', 999 );
