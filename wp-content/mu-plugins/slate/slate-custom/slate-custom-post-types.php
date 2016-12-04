<?php
/**
 * Slate Custom Post Types
 *
 * This file is reserved for registering custom post types using the Slate_Post_Type class.
 *
 * @since 1.0
 *
 * @package WordPress
 * @subpackage Slate
 */

class Slate_Custom_Post_Types {

    public function __construct() {

        add_action('init', array($this, 'slate_post_type_init'));

    }

    /**
     * Registers post types.
     *
     * This class handles the registering of multiple post types.
     *
     * @since 1.0
     */
    public function slate_post_type_init() {

        $custom_post_types = array("News", "Affiliates", "Businesses");

        foreach($custom_post_types as $pt ) {

            new Slate_Post_Type($pt, array('has_archive' => true, 'supports' => array('title', 'editor', 'page-attributes', 'excerpt', 'custom-fields', 'revisions')));
        }

    }

}
