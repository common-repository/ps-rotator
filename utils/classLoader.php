<?php

/**
 * @file: classLoader.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-26
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
function classLoader($className) {
    $foldersNames = array(
        '/',
        '/admin/',
        '/controller/',
        '/model/',
        '/utils/',
        '/view/'
    );

    foreach ($foldersNames as $folderName) {
        if (file_exists(PSR_PLUGIN_DIR . $folderName . $className . '.php')) {
            require_once(PSR_PLUGIN_DIR . $folderName . $className . '.php');
            return true;
        }
    }
}

spl_autoload_register('classLoader');
?>
