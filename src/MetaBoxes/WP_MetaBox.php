<?php
namespace WP_PluginFramework\MetaBoxes;

abstract class WP_MetaBox
{
    public static $id;
    public static $title;
    public static $postType;

    public static function html()
    {
        return '';
    }

    public static function register() {

        $html = static::html();
        $postType = static::$postType;
        $id = static::$id;
        $title = static::$title;

        add_action("add_meta_boxes", function () use($html, $postType, $id, $title) {
            add_meta_box($id, __($title), function () use ($html) {
                echo $html;
            }, $postType, 'side', 'high');
        });

    }

}