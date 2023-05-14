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
                        $current_user = wp_get_current_user();
                        $mobile = get_user_meta($current_user->ID, 'esg_phone', true);
                        $title = get_user_meta($current_user->ID, 'esg_title', true);
                        $linkedin = get_user_meta($current_user->ID,  'esg_linkedin',  true);

                        $user_data = array(
                            'firstname'     => isset( $current_user->user_firstname) ? $current_user->user_firstname : 'John',
                            'surname'       => isset( $current_user->user_lastname) ? $current_user->user_lastname : 'Doe',
                            'email'         => isset( $current_user->user_email) ? $current_user->user_email : 'john@doe.com',
                            'mobile'        => isset( $mobile ) ? $mobile : '41 75 65 94 12',
                            'title'         => isset( $title ) ? $title : 'Lead developer',

                            // Personal social network links
                            'user_linkedin' =>  isset( $linkedin ) ? $linkedin : '',
                        );
                        echo $this->generate_signature( $user_data ) ?>
                    </div>
                </div>
                <div style="margin:25px 0;">
                Utilisez le shortcode <pre class="shortcode">[esg_form]</pre> pour afficher le formulaire de création de signature sur n'importe laquelle de vos pages.
                </div>
                <button type="submit" id="esg_reset_default" class="button-secondary">Restaurer les données par défaut</button>
            </div>
        </div>
        <?php submit_button(); ?>
    </form>
</div>
