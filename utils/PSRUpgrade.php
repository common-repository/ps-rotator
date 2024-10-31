<?php
/**
 * @file: PSRUpgrade.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-03
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRUpgrade implements IPSRInstallAndUpgrade {

    public function execute() {
        $this->upgradeIfPluginVersionIsOld();
    }

    private function upgradeIfPluginVersionIsOld() {
        if ($this->getPluginVersionNumberFromDB() != PSR_PLUGIN_VERSION_NUMBER) {
            //TODO: Execute your upgrade logic here
            $this->upgradePluginVersion();
        }
    }

    private function getPluginVersionNumberFromDB() {
        return get_option(PSR_PLUGIN_VERSION_KEY);
    }

    private function upgradePluginVersion() {
        update_option(PSR_PLUGIN_VERSION_KEY, PSR_PLUGIN_VERSION_NUMBER);
    }


}

?>