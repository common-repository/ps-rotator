<?php
/**
 * @file: PSRView
 * @description: Wpisz opis
 * @version: 0.0.1
 * @created: 2011-02-25
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
if (!class_exists('PSRView')) {

    class PSRView {

        private $arImageList;
        private $objGallery;
        private $objImageList;
        private $strImageURL;

        public function __construct(PSRNGGGalleryModel $objGallery, PSRNGGPicturesModel $objImageList) {
            $this->objGallery = $objGallery;
            $this->objImageList = $objImageList;
            $this->strImageURL = get_bloginfo('wpurl') . '/' . $this->objGallery->getPath() . '/';
            $this->arImageList = $this->objImageList->getPictures();
        }

        public function render() {
?>
        <ul id="rotator">
    <?php foreach ($this->arImageList as $picture) : ?>
            <?php $strImageURL = $this->strImageURL . $picture->filename; ?>
            <li><img src="<?php echo $strImageURL; ?>" alt="<?php echo $picture->alttext; ?>" /></li>
    <?php endforeach; ?>
        </ul>
<?php
        }

        public function shuffleImages() {
            $arImageList = $this->objImageList->getPictures();
            shuffle($arImageList);
            $this->arImageList = $arImageList;
        }
    }
}
?>