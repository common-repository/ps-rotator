<?php
/**
 * @file: psrotator-help.php
 * @description: Wpisz opis
 * @version: 0.0
 * @created: 2011-06-16
 * @author Przemek
 * @email: p.szelenberger@gmail.com
 *
 * @copyright
 */
?>
<?php $hrefToSettings = '/wp-admin/admin.php?page=psrotator-settings'; ?>
<h3>
    <?php _e('How to attach the plug to a post or page?', 'psrotator'); ?>
</h3>
<p>
    <?php _e('First install the plugin for a gallery:', 'psrotator'); ?><br />
    <a title="NextGEN Gallery" href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN Gallery</a>
</p>

<p>
    <?php _e('Then follow the instructions below:', 'psrotator'); ?>
</p>
<ol>
    <li>
        <?php _e('You create a gallery at', 'psrotator'); ?> <a title="NextGEN Gallery" href="http://wordpress.org/extend/plugins/nextgen-gallery/">NextGEN Gallery</a> <?php _e('called "rotator".', 'psrotator'); ?>
    </li>
    <li>
        <?php _e('Add photos to created gallery.', 'psrotator'); ?>
    </li>
    <li>
        <?php _e('<strong>NOTE:</strong> plug-in at the moment only supports up to ten files. So as you add more, it is still above the tenth archive will not be.', 'psrotator'); ?>
    </li>
<!--    <li>
        <?php //_e('By zmienić konfigurację, trzeba zmodyfikować plik <strong>ps.rotator.config.js</strong>, który znajduje się w katalogu <strong>/ps_rotator/js</strong>', 'psrotator'); ?>
    </li>-->
    <li>
        <?php _e('How to add a rotator? There are two ways:', 'psrotator'); ?>
        <ol>
            <li>
                <?php _e('Add a shortcode to a post or a page:', 'psrotator'); ?>
                <p><strong>[ps-rotator]</strong></p>
            </li>
            <li>
                <?php _e('Add the following line of code template:', 'psrotator'); ?>
                <p><strong>do_action( 'ps_rotator', '');</strong></p>
            </li>
        </ol>
    </li>
</ol>
<!--<h3>
    <?php //_e('Jak zmienić kolejność zdjęć?', 'psrotator'); ?>
</h3>
<ol>
    <li>
        <?php
//            $hrefToSettings = '/wp-admin/admin.php?page=psrotator-settings';
//            _e('<a href="' . get_bloginfo('url') . $hrefToSettings . '">Przejdź do strony z ustawieniami</a>', 'psrotator');
        ?>
    </li>
</ol>-->
<h3>
    <?php _e('What to do to upload all the slides randomly?', 'psrotator'); ?>
</h3>
<ol>
    <li>
        <a href="<?php get_bloginfo('url') . $hrefToSettings; ?>">
            <?php _e('Go to the settings page', 'psrotator'); ?>
        </a>
    </li>
    <li>
        <?php _e('Select <strong>Random slide show</strong>', 'psrotator'); ?>
    </li>
    <li>
        <?php _e('Click <strong>Save Settings</strong>', 'psrotator'); ?>
    </li>
</ol>
<h3>
    <?php _e('How to change the animation for the slide transitions?', 'psrotator'); ?>
</h3>
<ol>
    <li>
        <a href="<?php get_bloginfo('url') . $hrefToSettings?>">
            <?php _e('Go to the settings page', 'psrotator'); ?>
        </a>
    </li>
    <li>
        <?php _e('Select from the list <strong>Select an effect for transitions between slides</strong> animation', 'psrotator'); ?>
    </li>
    <li>
        <?php _e('Click <strong>Save Settings</strong>', 'psrotator'); ?>
    </li>
</ol>