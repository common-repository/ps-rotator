<?php
/*
  Plugin Name: PS Rotator
  Plugin URI: http://przemyslaw.szelenberger.pl/psrotator/
  Description: An image rotator works with NextGEN Gallery on board.
  Author: Przemysław 'th3mon' Szelenberger
  Version: 0.1.5

  Author URI: http://przemyslaw.szelenberger.pl/

  Copyright 2011 Przemysław 'th3mon' Szelenberger

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

 */

/**
 * @file: ps_init_rotator.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-02-24
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
setConstants();
require_once 'utils/classLoader.php';

function setConstants() {
    if (!defined('PSR_THEME_DIR'))
        define('PSR_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());

    if (!defined('PSR_PLUGIN_NAME'))
        define('PSR_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

    if (!defined('PSR_PLUGIN_DIR'))
        define('PSR_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . PSR_PLUGIN_NAME);

    if (!defined('PSR_PLUGIN_URL'))
        define('PSR_PLUGIN_URL', WP_PLUGIN_URL . '/' . PSR_PLUGIN_NAME);

    if (!defined('PSR_PLUGIN_VERSION_KEY'))
        define('PSR_PLUGIN_VERSION_KEY', 'psr_version');

    if (!defined('PSR_PLUGIN_VERSION_NUMBER'))
        define('PSR_PLUGIN_VERSION_NUMBER', '0.1.5');
}

function psr_init() {
    $controller = new PSRController();
    $controller->init();
}

function psr_init_js() {
    $scriptPath = PSR_PLUGIN_URL . '/js/';
    if (!is_admin()) {
?>
        <script type="text/javascript" src="<?php echo $scriptPath; ?>jquery.js"></script>
        <script type="text/javascript" src="<?php echo $scriptPath; ?>jquery.cycle.all.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($){
                var $rotator = $("#rotator");
                $rotator.cycle({
                    fx: <?php echo "'" . get_option('psr_animation_effect') . "'\n"; ?>
                });
            });
        </script>
<?php
    }
}

function psr_init_admin_pages() {
    $adminMenu = new PSRAdminMenu();
    $adminMenu->render();

    psr_if_needed_data_is_saved();
}

function psr_if_needed_data_is_saved() {
    if (is_admin() && isset($_POST['psr-save-settings']) && ($_POST['psr-save-settings'] === 'true')) {
        $settingsSaver = new DataSaver();
        $settingsSaver->save();
    }
}

function init_admin_scripts() {
    wp_enqueue_script('jquery_ps', PSR_PLUGIN_URL . '/js/jquery.js');
    wp_enqueue_script('ps.rotator', PSR_PLUGIN_URL . '/js/ps.rotator.js', 'jquery');
}

function psr_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=psrotator-settings">' . __('Settings', 'psrotator') . '</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

function myplugin_load_translation_file() {
        load_plugin_textdomain('psrotator', false, basename( dirname( __FILE__ ) ) . '/languages' );
}

psr_init_admin_pages();

add_shortcode('ps-rotator', 'psr_init');
add_filter('plugin_action_links', 'psr_plugin_action_links', 10, 2);
add_action('admin_print_scripts-toplevel_page_psrotator-settings', 'init_admin_scripts');
add_action('init', 'myplugin_load_translation_file');
add_action('ps_rotator', 'psr_init');
add_action('wp_footer', 'psr_init_js');
?>