<div id="esg-settings" class="wrap">
    <h1 id="esg-title"><?php echo __( 'Générateur de signature d\'email' ); ?></h1>

    <?php settings_errors(); ?>
    <form method="post" action="options.php">
        <div id="esg-main-wrapper" class="container flex">
            <div id="esg-options" class="container ">
                            <?php
                            settings_fields( 'esg_updater' );
                            do_settings_sections( 'gh_options' );
                            ?>
                        </div>
        </div>        
    </div>
        <?php submit_button(); ?>
    </form>
</div>
