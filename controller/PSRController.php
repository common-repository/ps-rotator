<?php
/**
 * @file: PSRController.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-02-25
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRController {
    private $intLimitOfImages = 10;
    private $objGallery;
    private $objImageList;

    public function  __construct() {
        $this->installOrUpgrade();
        $this->objGallery = new PSRNGGGalleryModel('title', 'rotator');
        $this->objImageList = new PSRNGGPicturesModel($this->objGallery->getGalleryID(), $this->intLimitOfImages);
    }

    public function setIntLimitOfImages($intLimitOfImages) {
        $this->intLimitOfImages = $intLimitOfImages;
    }

    public function init() {
        $view = new PSRView($this->objGallery, $this->objImageList);
        if (get_option('psr_is_order_random') === 'true') {
            $view->shuffleImages();
        }
        
        $view->render();

        $adminMenu = new PSRAdminMenu();
        $adminMenu->render();
    }

    private function installOrUpgrade() {
        if ($this->isPSRInstalled()) {
            $upgraderator = new PSRUpgrade();
            $upgraderator->execute();
        } else {
            $installator = new PSRInstall();
            $installator->execute();
        }

    }

    private function isPSRInstalled() {
        if(TRUE == get_option(PSR_PLUGIN_VERSION_KEY)) {
            return TRUE;
        }
        return FALSE;
    }

}

?>