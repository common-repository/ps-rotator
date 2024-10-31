<?php

/**
 * @file: PSRInstall.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-03
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRInstall implements IPSRInstallAndUpgrade {

    public function execute() {
        add_option(PSR_PLUGIN_VERSION_KEY, PSR_PLUGIN_VERSION_NUMBER, '', 'no');
    }

}

?>
