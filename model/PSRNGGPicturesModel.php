<?php
/**
 * @file: PSRNGGPicturesModel.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-02-23
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
if (!class_exists('PSRNGGPicturesModel')) {

    class PSRNGGPicturesModel {

        private $pictures;

        public function __construct($galleryID, $limit = NULL) {
            $this->pictures = $this->setPictures($galleryID, $limit);
        }

        private function setPictures($galleryID, $limit = NULL) {
            global $wpdb;

            if (PSRValidator::isNumericAndGreaterThanZero($limit)) {
                $query = 'SELECT * FROM ' . $wpdb->prefix . 'ngg_pictures WHERE galleryid = ' . $galleryID . ' LIMIT ' . $limit;
            } else {
                $query = 'SELECT * FROM ' . $wpdb->prefix . 'ngg_pictures WHERE galleryid = ' . $galleryID;
            }

            return $wpdb->get_results($wpdb->prepare($query));
        }

        public function getPictures() {
            return $this->pictures;
        }

    }

}
?>