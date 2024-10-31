<?php

/**
 * @file: IPSRPage.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-09
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
interface IPSRPage {

    public function setHeader($header);

    public function setContent($content);

    public function setFooter($footer);

    public function getPage();
}
?>
