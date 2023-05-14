<div class="wrap">
    <h1 id="esg-title"><?php echo __( 'Générateur de signature d\'email' ); ?></h1>
    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <div id="esg-main-wrapper" class="container flex">
            <div id="esg-options" class="container ">
                     <div id="gh-update" class="js-tabs__content">
                            <?php
                            settings_fields( 'esg_settings' );
                            do_settings_sections( 'esg_main_settings' );
                            ?>
                        </div>
                    </div>
        </div>
        <?php submit_button(); ?>
    </form>
</div>
