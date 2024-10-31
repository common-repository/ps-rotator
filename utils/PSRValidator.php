<?php
/**
 * @file: PSRValidator.php
 * @description: <p>Metody statyczne służące do walidacji zmiennych.</p>
 * @version: 0.1
 * @created: 2011-02-26
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
if (!class_exists('PSRValidator')) {

    class PSRValidator {

        public static function isNumericAndGreaterThanZero($var) {
            $result = FALSE;

            if ((is_numeric($var) && ($var > 0))) {
                $result = TRUE;
            }

            return $result;
        }

        public static function isStringAndNotEmpty($var) {
            $result = FALSE;

            if ((is_string($var) && !empty ($var))) {
                $result = TRUE;
            }

            return $result;
        }
    }

}
?>