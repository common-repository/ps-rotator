<?php
//TODO: wydziel funckję myplugin_menu_pages do osobnego pliku
/**
 * @file: PSRAdminMenu.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-06
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRAdminMenu {

    public function __construct() {

    }

    public function render() {
        add_action('admin_menu', 'myplugin_menu_pages');
    }

}

function myplugin_menu_pages() {
    $adminMenuItem_Settings = new PSRAdminMenuItem(__('PSRotator Settings', 'psrotator'), __('PSRotator', 'psrotator'));
    $adminMenuItem_Settings->subMenuTitle = __('Settings', 'psrotator');

    add_menu_page(
            $adminMenuItem_Settings->pageTitle,
            $adminMenuItem_Settings->menuTitle,
            $adminMenuItem_Settings->capability,
            $adminMenuItem_Settings->slug,
            array($adminMenuItem_Settings, $adminMenuItem_Settings->action)
    );

    add_submenu_page(
            $adminMenuItem_Settings->slug,
            $adminMenuItem_Settings->pageTitle,
            $adminMenuItem_Settings->subMenuTitle,
            $adminMenuItem_Settings->capability,
            $adminMenuItem_Settings->slug,
            array($adminMenuItem_Settings, $adminMenuItem_Settings->action)
    );

    $adminMenuItem_Help = new PSRAdminMenuItem(__('PSRotator Help', 'psrotator'), __('Help', 'psrotator'));
    add_submenu_page(
            $adminMenuItem_Settings->slug,
            $adminMenuItem_Help->pageTitle,
            $adminMenuItem_Help->menuTitle,
            $adminMenuItem_Help->capability,
            $adminMenuItem_Help->slug,
            array($adminMenuItem_Help, $adminMenuItem_Help->action)
    );
}
?>
