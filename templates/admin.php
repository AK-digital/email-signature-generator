<div id="esg-settings" class="wrap">
    <h1 id="esg-title"><?= __('Générateur de signature d\'email'); ?></h1>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">

        <div class="container flex">
            <div id="esg-options" class="container ">
                <h3>Options de personnalisation</h3>

                <div class="js-tabs flex" id="tabs">

                    <ul class="js-tabs__header">
                        <li class="js-tabs__title"><?= __('Templates'); ?></li>
                        <li class="js-tabs__title"><?= __('Branding'); ?></li>
                        <li class="js-tabs__title"><?= __('Infos générales'); ?></li>
                        <li class="js-tabs__title"><?= __('Infos utilisateur'); ?></li>
                        <li class="js-tabs__title"><?= __('Réseaux sociaux'); ?></li>
                        <li class="js-tabs__title"><?= __('Contenu additionnel'); ?></li>
                        <li class="js-tabs__title float-right"><?= __('Shortcodes'); ?></li>
                    </ul>

                    <div class="tab-content">
                        <div id="templates" class="js-tabs__content flex-col">
                            <?php
                            settings_fields('esg_option_group');
                            do_settings_sections('esg-settings-template');
                            ?>
                        </div>

                        <div id="branding" class="js-tabs__content">
                            <?php
                            settings_fields('esg_option_group');
                            do_settings_sections('esg-settings-branding');
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
                            <h4><?= __("Ajouter ce shortcode dans le contenu de votre page Wordpress"); ?></h4>
                            <!--                <p>-->
                            <!--                <pre class="shortcode">[esg_user_data]</pre>-->
                            <!--                -->
                            <? //= __("Ce shortcode créera une signature e-mail en utilisant les données de l'utilisateur wordpress."); ?><!--</p>-->
                            <p>
                            <pre class="shortcode">[esg_form]</pre>
                            <?= __("Ce shortcode affichera un formulaire à remplir par vos visiteurs. Tout le monde peut créer une signature de
                 les vôtres."); ?></p>
                        </div>

                        <script type="text/javascript">
                            var tabs = new Tabs({
                                elem: "tabs",
                                open: 0
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div id="esg-preview" class="container">
                <h3>Prévisualisation de votre signature</h3>
                <div id="sign-preview-wrapper">
                    <a class="esg-action-button esg_button-copy-sign"><img
                                class="esg-action-icon" src="<?= $this->plugin_url; ?>assets/img/copy-icon.png"/>
                    </a>
                    <a class="esg-action-button downloadLink"><img class="esg-action-icon"
                                src="<?= $this->plugin_url; ?>assets/img/download-icon.png"/>
                    </a>
                    <div id="sign-preview">
                        <?php $user_data = [
                            'firstname' => 'John',
                            'surname' => 'Carpenter',
                            'email' => 'john@carpenter.org',
                            'mobile' => '41 75 65 94 12',
                            'title' => 'Lead developer',

                            // Personal social network links
                            'user_linkedin' => '#',
                        ];
                        echo $this->generate_signature($user_data) ?>
                    </div>
                </div>
                <?php submit_button(); ?>
            </div>
        </div>
    </form>
</div>
