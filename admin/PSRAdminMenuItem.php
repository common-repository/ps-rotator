<?php

/**
 * @file: PSRAdminMenuItem.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-09
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRAdminMenuItem implements IPSRPage {

    public $pageTitle = 'My Plugin Settings';
    public $menuTitle = 'My Plugin';
    public $subMenuTitle = 'Settings';
    public $capability = 'manage_options';
    public $slug = 'myplugin-settings';
    public $action = 'myplugin_settings';
    private $page;

    public function __construct($pageTitle, $menuTitle) {
        $this->pageTitle = $pageTitle;
        $this->menuTitle = $this->subMenuTitle = $menuTitle;

        $this->setSlug($pageTitle);
        $this->setAction($pageTitle);

        $adminPage = new PSRAdminPage();
        $this->setAdminPageContent($adminPage);
        $this->setHeader($this->slug . '-header');
        $this->setContent($this->slug);
        $this->setFooter($this->slug . '-footer');
    }

    public function __call($name, $arguments) {
        if (!current_user_can('manage_options')) {
            wp_die(_e('You do not have sufficient permissions to access this page.', 'psrotator'));
        }
        echo $this->getPage();
    }

    public function getPage() {
        return $this->page->getPage();
    }

    public function setAdminPageContent(PSRAdminPage $content) {
        $this->page = $content;
    }

    public function setHeader($header) {
        $this->page->setHeader($header);
    }

    public function setContent($content) {
        $this->page->setContent($content);
    }

    public function setFooter($footer) {
        $this->page->setFooter($footer);
    }

    private function setSlug($pageTitle) {
        $pageTitle = $this->setCorrectName($pageTitle);
        
        $this->slug = str_replace(' ', '-', strtolower($pageTitle));
    }

    private function setAction($pageTitle) {
        $pageTitle = $this->setCorrectName($pageTitle);
        $this->action = str_replace(' ', '_', strtolower($pageTitle));
    }

    private function setCorrectName($pageTitle) {
        if ($pageTitle == 'PSRotator Ustawienia') {
            $pageTitle = 'PSRotator settings';
        } elseif ($pageTitle == 'PSRotator Pomoc') {
            $pageTitle = 'PSRotator help';
        }

        return $pageTitle;
    }
}

?>
