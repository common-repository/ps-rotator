<?php
/**
 * @file: PSRNGGGalleryModel.php
 * @description: Model operujący na tabeli [przedrostek]_ngg_gallery z wtyczki NextGEN Gallery
 * @version: 0.1
 * @created: 2011-02-23
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
if (!class_exists('PSRNGGGalleryModel')) {

    class PSRNGGGalleryModel {

        private $gid;
        private $name;
        private $slug;
        private $path;
        private $title;
        private $galdesc;
        private $pageid;
        private $previewpic;
        private $author;

        public function __construct($strGetBy, $value) {
            $this->setParameters($strGetBy, $value);
        }

        protected function setParameters($strGetBy, $value) {
            switch ($strGetBy) {
                case 'name':
                    $row = $this->getRowByName($value);
                    $this->setPatametersFromRow($row);
                    break;

                case 'title':
                    $row = $this->getRowByTitle($value);
                    $this->setPatametersFromRow($row);
                    break;

                default:
                    $row = $this->getRowByTitle($value);
                    $this->setPatametersFromRow($row);
                    break;
            }
        }

        public function getRowByName($name) {
            global $wpdb;
            $query = 'SELECT * FROM ' . $wpdb->prefix . 'ngg_gallery WHERE name = %s';
            $query = $wpdb->prepare($query, $name);
            return $wpdb->get_row($query);
        }

        public function getRowByTitle($title) {
            global $wpdb;
            $query = 'SELECT * FROM ' . $wpdb->prefix . 'ngg_gallery WHERE title = %s';
            $query = $wpdb->prepare($query, $title);
            return $wpdb->get_row($query);
        }

        public function getGalleryID() {
            return $this->gid;
        }

        public function getPath() {
            return $this->path;
        }

        private function setPatametersFromRow($row) {
            $this->author = $row->author;
            $this->galdesc = $row->galdesc;
            $this->gid = $row->gid;
            $this->name = $row->name;
            $this->pageid = $row->pageid;
            $this->path = $row->path;
            $this->previewpic = $row->previewpic;
            $this->slug = $row->slug;
            $this->title = $row->title;
        }

    }

}
?>