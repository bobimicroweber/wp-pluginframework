<?php
namespace WP_PluginFramework\PostTypes;

abstract class WP_PostType
{
    public static function register()
    {
        $labels = array(
            'name' => _x(static::$postLabelMenuName . ' '.static::$postLabelName, 'plural'),
            'singular_name' => _x(static::$postLabelName, 'singular'),
            'menu_name' => _x(static::$postLabelMenuName, 'admin menu'),
            'name_admin_bar' => _x(static::$postLabelName, 'admin bar'),
            'add_new' => _x('Add New', 'add new'),
            'add_new_item' => __('Add New ' . static::$postLabelSingularName),
            'new_item' => __('New ' . static::$postLabelSingularName),
            'edit_item' => __('Edit ' . static::$postLabelSingularName),
            'view_item' => __('View ' . static::$postLabelSingularName),
            'all_items' => __('All ' . static::$postLabelName),
            'search_items' => __('Search ' . static::$postLabelName),
            'not_found' => __('No '.static::$postLabelName.' found.')
        );

        $args = array(
            'supports' => static::$supports,
            'labels' => $labels,
            'public' => true,
            'query_var' => true,
            // 'taxonomies'    => [],
            'has_archive' => true,
            'hierarchical' => false
        );

        if (isset(static::$postSlug)) {
            $args['rewrite'] =  array('slug' => static::$postSlug);
        }

        $postType = static::$postType;

        add_action('init', function () use ($postType, $args) {
            register_post_type($postType, $args);
        });
    }

}