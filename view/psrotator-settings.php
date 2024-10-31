<?php
/**
 * @file: psrotator-settings.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-13
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
?>
<?php

if (!class_exists('ViewRenderer')) {

    class ViewRenderer {

        private $animationEffectOptionsList;
        private $isOrderRandomChecked;
        private $selectedAnimationEffect;

        function __construct() {
            $this->setIsOrderRandomChecked();
            $this->setAnimationEffectOptionsList();
            $this->setSelectedAnimationEffect();
        }

        private function setAnimationEffectOptionsList() {
            $this->animationEffectOptionsList = array(
                'none' => '',
                'blindX' => '',
                'blindY' => '',
                'blindZ' => '',
                'cover' => '',
                'curtainX' => '',
                'curtainY' => '',
                'fade' => '',
                'fadeZoom' => '',
                'growX' => '',
                'growY' => '',
                'scrollUp' => '',
                'scrollDown' => '',
                'scrollLeft' => '',
                'scrollRight' => '',
                'scrollHorz' => '',
                'scrollVert' => '',
                'shuffle' => '',
                'slideX' => '',
                'slideY' => '',
                'toss' => '',
                'turnUp' => '',
                'turnDown' => '',
                'turnLeft' => '',
                'turnRight' => '',
                'uncover' => '',
                'wipe' => '',
                'zoom' => ''
            );
        }

        private function setIsOrderRandomChecked() {
            if (get_option('psr_is_order_random') === 'true') {
                $this->isOrderRandomChecked = ' checked="checked"';
            }
        }

        public function renderIsOrderRandomChecked() {
            return $this->isOrderRandomChecked;
        }

        public function renderAnimationEffect() {
            foreach ($this->animationEffectOptionsList as $optionText => $selected) :
        ?>
                        <option<?php echo $selected; ?>><?php echo $optionText; ?></option>
<?php
                endforeach;
            }

            private function setSelectedAnimationEffect() {
                $this->selectedAnimationEffect = get_option('psr_animation_effect');
                $this->animationEffectOptionsList[$this->selectedAnimationEffect] = ' selected="selected"';
            }

        }

        $viewRenderer = new ViewRenderer();
    }
?>
<form action="" method="post" name="settings" id="settings">
    <input type="hidden" value="true" name="psr-save-settings" />
    <p>
        <label for="isOrderRandom">
            <?php _e('Random display of slides:', 'psrotator'); ?>
        </label>
        <input id="isOrderRandom" name="isOrderRandom" type="checkbox"<?php echo $viewRenderer->renderIsOrderRandomChecked(); ?> />
    </p>
    <p>
        <label for="animationEffect">
            <?php _e('Select an effect for transitions between slides:', 'psrotator'); ?>
        </label>
        <select id="animationEffect" name="animationEffect" >
            <?php $viewRenderer->renderAnimationEffect(); ?>
        </select>
    </p>
    <p class="submit">
        <a style="display: none;" href="#save-settings" class="button-primary">
            <?php _e('Save Settings', 'psrotator'); ?>
        </a>
        <input class="button-primary" type="submit" id="submit-settings" name="submit-settings" value="<?php _e('Save Settings', 'psrotator'); ?>" />
    </p>
</form>
<?php if(isset ($_POST['psr-save-settings']) && ($_POST['psr-save-settings'] === 'true')): ?>
    <p class="update-message" id="settingsSaved">
        <strong>
            <?php _e('Settings have been saved!', 'psrotator'); ?>
        </strong>
    </p>
<?php endif; ?>