
<div id="esg-settings" class="wrap">
    <h1 id="esg-title"><?= __('Options du générateur de signature email'); ?></h1>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">

        <div class="js-tabs" id="tabs">
            <ul class="js-tabs__header">
                <li class="js-tabs__title"><?= __('Templates'); ?></li>
                <li class="js-tabs__title"><?= __('Infos générales'); ?></li>
                <li class="js-tabs__title"><?= __('Infos utilisateur'); ?></li>
                <li class="js-tabs__title"><?= __('Branding'); ?></li>
                <li class="js-tabs__title"><?= __('Réseaux sociaux'); ?></li>
                <li class="js-tabs__title"><?= __('Contenu additionnel'); ?></li>
                <li class="js-tabs__title float-right"><?= __('Shortcodes'); ?></li>
            </ul>

            <div id="templates" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-template');
                ?>
            </div>

            <div id="details" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-general');
                ?>
            </div>

            <div id="userinfos" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-userinfos');
                ?>
            </div>

            <div id="branding" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-branding');
                ?>
            </div>

            <div id="social" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-social');
                ?>
            </div>

            <div id="more" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-additional');
                ?>
            </div>

            <div id="shortcodes" class="js-tabs__content">
                <h3><?= __("Shortcodes"); ?></h3>
                <h4><?= __("Intégrez ces shortcode dans votre page Wordpress"); ?></h4>
                <p>
                <pre class="shortcode">[esg_user_data]</pre>
                <?= __("Ce shortcode créera une signature e-mail en utilisant les données de l'utilisateur wordpress."); ?></p>
                <p>
                <pre class="shortcode">[esg_form]</pre>
                <?= __("Ce shortcode affichera un formulaire à remplir par vos visiteurs. Tout le monde peut créer une signature de
                 les vôtres."); ?></p>
            </div>
        <?php submit_button(); ?>

            <script type="text/javascript">
                var tabs = new Tabs({
                    elem: "tabs",
                    open: 0
                });
               </script>
        </div>
    </form>
</div>
