<?php

/**
 * @file: DataSaver.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-24
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
class DataSaver {

    private $dataToSave;
    private $PSR_IS_ORDER_RANDOM = 'psr_is_order_random';
    private $PSR_ANIMATION_EFFECT = 'psr_animation_effect';

    public function __construct() {
        $this->parseData();
    }

    public function save() {
        foreach ($this->dataToSave as $key => $value) {
            if (get_option($key)) {
                update_option($key, $value);
            } else {
                add_option($key, $value, '', 'no');
            }
        }
    }

    public function parseData() {
        $this->setOrderRandom(false);
        
        foreach ($_POST as $key => $value) {
            if ($key === 'animationEffect') {
                $this->setAnimatonEffect($value);
            } elseif ($key === 'isOrderRandom') {
                $this->setOrderRandom($value);
            }
        }
    }

    private function setOrderRandom($value) {
        if ($value) {
            $this->dataToSave[$this->PSR_IS_ORDER_RANDOM] = 'true';
        } else {
            $this->dataToSave[$this->PSR_IS_ORDER_RANDOM] = 'false';
        }
    }

    private function setAnimatonEffect($animationEffect) {
        switch ($animationEffect) {
            case 'blindX':
            case 'blindY':
            case 'blindZ':
            case 'cover':
            case 'curtainX':
            case 'curtainY':
            case 'fadeZoom':
            case 'growX':
            case 'growY':
            case 'growX':
            case 'scrollUp':
            case 'scrollDown':
            case 'scrollLeft':
            case 'scrollRight':
            case 'scrollDown':
            case 'scrollLeft':
            case 'scrollRight':
            case 'scrollHorz':
            case 'scrollVert':
            case 'shuffle':
            case 'slideX':
            case 'slideY':
            case 'toss':
            case 'turnUp':
            case 'turnDown':
            case 'turnLeft':
            case 'turnRight':
            case 'uncover':
            case 'wipe':
            case 'zoom':
            case 'none':
                $this->dataToSave[$this->PSR_ANIMATION_EFFECT] = $animationEffect;
                break;

            default:
                $this->dataToSave[$this->PSR_ANIMATION_EFFECT] = 'fade';
                break;
        }
    }

}

?>
