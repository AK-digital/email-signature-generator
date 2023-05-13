<div id="esg-settings" class="wrap">
    <h1 id="esg-title"><?php echo __( 'Générateur de signature d\'email' ); ?></h1>

    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <div id="esg-main-wrapper" class="container flex">
            <div id="esg-options" class="container ">
                <h3>Options de personnalisation</h3>

                <div class="js-tabs flex" id="tabs">

                    <ul class="js-tabs__header">
                        <li class="js-tabs__title"><?php echo __( 'Templates' ); ?></li>
                        <li class="js-tabs__title"><?php echo __( 'Branding' ); ?></li>
                        <li class="js-tabs__title"><?php echo __( 'Infos générales' ); ?></li>
                        <li class="js-tabs__title"><?php echo __( 'Infos utilisateur' ); ?></li>
                        <li class="js-tabs__title"><?php echo __( 'Réseaux sociaux' ); ?></li>
                        <li class="js-tabs__title"><?php echo __( 'Contenu additionnel' ); ?></li>
                        <li class="js-tabs__title float-right"><?php echo __( 'Mise à jour' ); ?></li>
                        <li class="js-tabs__title float-right"><?php echo __( 'Shortcodes' ); ?></li>
                    </ul>

                    <div class="tab-content">
                        <div id="templates" class="js-tabs__content flex-col">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-template' );
                            ?>
                        </div>

                        <div id="branding" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-branding' );
                            ?>
                        </div>

                        <div id="details" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-general' );
                            ?>
                        </div>

                        <div id="userinfos" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-userinfos' );
                            ?>
                        </div>

                        <div id="social" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-social' );
                            ?>
                        </div>

                        <div id="more" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'esg-settings-additional' );
                            ?>
                        </div>

                        
                        <div id="gh-update" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_template' );
                            do_settings_sections( 'gh_options' );
                            ?>
                        </div>

                        <div id="shortcodes" class="js-tabs__content">
                            <h3><?php echo __( 'Shortcodes' ); ?></h3>
                            <h4><?php echo __( 'Ajouter ce shortcode dans le contenu de votre page WordPress' ); ?></h4>
                            <!--                <p>-->
                            <!--                <pre class="shortcode">[esg_user_data]</pre>-->
                            <!--                -->
                            <? //= __("Ce shortcode créera une signature e-mail en utilisant les données de l'utilisateur WordPress."); ?><!--</p>-->
                            <p>
                            <pre class="shortcode">[esg_form]</pre>
                            <?php
                            echo __(
                                'Ce shortcode affichera un formulaire à remplir par vos visiteurs. Tout le monde peut créer une signature de
                 les vôtres.'
                            ); ?></p>
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
                                class="esg-action-icon" src="<?php echo ESG_PLUGIN_URL; ?>assets/img/copy-icon.png" alt=""/>
                    </a>
                    <a class="esg-action-button downloadLink"><img class="esg-action-icon" src="<?php echo ESG_PLUGIN_URL; ?>assets/img/download-icon.png"/>
                    </a>
                    <div id="sign-preview">
                        <?php
                        $user_data = array(
                            'firstname'     => 'John',
                            'surname'       => 'Doe',
                            'email'         => 'john@doe.com',
                            'mobile'        => '41 75 65 94 12',
                            'title'         => 'Lead developer',

                            // Personal social network links
                            'user_linkedin' => '#',
                        );
                        echo $this->generate_signature( $user_data ) ?>
                    </div>
                </div>
                <?php submit_button(); ?>
            </div>
        </div>
    </form>
    <button type="submit" id="esg_reset_default" class="button-secondary">Restaurer les données par défaut</button>
</div>
<!--<p id="donate-link">Vous aimez ce plugin ? Soutenez son créateur en <a href="https://developpeur-wordpress.fr/don">faisant un don</a></p>-->
