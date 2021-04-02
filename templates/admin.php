<div id="esg-settings" class="wrap">
    <h1 id="esg-title">Email Signature Generator settings</h1>
    <form method="post" action="options.php">

        <div class="js-tabs" id="tabs">
            <ul class="js-tabs__header">
                <li class="js-tabs__title">Layouts</li>
                <li class="js-tabs__title">Details</li>
                <li class="js-tabs__title">Branding</li>
                <li class="js-tabs__title">Social</li>
                <li class="js-tabs__title">More</li>
                <li class="js-tabs__title float-right">Shortcodes</li>
            </ul>

            <div id="layouts" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-layout');
                ?>
            </div>

            <div id="details" class="js-tabs__content">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-general');
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
                <h3>Shortcodes</h3>
                <h4>Integrate these shortcode in your Wordpress page</h4>
                <p>
                <pre class="shortcode">[esg_user_data]</pre>
                shortcode will create email signature using wordpress user's data.</p>
                <p>
                <pre class="shortcode">[esg_form]</pre>
                shortcode will display a form to be filled by your visitors. Everyone can create a signature of
                yours.</p>
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
