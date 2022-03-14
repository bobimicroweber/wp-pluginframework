<?php
namespace WP_PluginFramework\Interfaces;

interface WP_PluginInterface
{
    public static function activatePlugin();

    public static function deactivatePlugin();

    public static function uninstallPlugin();
}