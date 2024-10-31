<?php

/**
 * @file: PSRAdminPage.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-09
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class PSRAdminPage implements IPSRPage  {

    private $header;
    private $content;
    private $footer;
    private $path;

    public function __construct() {
        $this->path = PSR_PLUGIN_DIR . '/view/';
    }

    public function getPage() {
        if (!empty($this->header)) {
            $this->getHeader();
        }

        if (!empty($this->content)) {
            $this->getContent();
        }

        if (!empty($this->footer)) {
            $this->getFooter();
        }
    }

    public function setHeader($header) {
        if (PSRValidator::isStringAndNotEmpty($header)) {
            $this->header = $header;
        }
//        TODO: brakuje wyrzucania wyjątku jeśli powyższy warunek nie będzie spełniony
    }

    public function setContent($content) {
        if (PSRValidator::isStringAndNotEmpty($content)) {
            $this->content = $content;
        }
//       TODO: brakuje zdecydowanie wyjątku w przypadku, gdy na wejściu nie będzie stringa!!!
    }

    public function setFooter($footer) {
        if (PSRValidator::isStringAndNotEmpty($footer)) {
            $this->footer = $footer;
        }
//       TODO: brakuje zdecydowanie wyjątku w przypadku, gdy na wejściu nie będzie stringa!!!
    }

    public function getHeader() {
        include_once $this->path . $this->header . '.php';
    }

    public function getContent() {
        include_once $this->path . $this->content . '.php';
    }

    public function getFooter() {
        include_once $this->path . $this->footer . '.php';
    }

}

?>
