<div id="esg-settings" class="wrap">
    <h1 id="esg-title">Email Signature Generator settings</h1>
    <form method="post" action="options.php">
        <ul class="nav egs_nav-tabs">
            <li class="fadeIn active"><a href="#layouts">Layouts</a></li>
            <li class="fadeIn"><a href="#details">Details</a></li>
            <li class="fadeIn"><a href="#branding">Branding</a></li>
            <li class="fadeIn"><a href="#social">Social</a></li>
            <li class="fadeIn"><a href="#more">More</a></li>
            <li class="fadeIn float-right"><a href="#shortcodes">Shortcodes</a></li>
        </ul>

        <div class="egs_tab-content" id="myhash">
            <div id="layouts" class="egs_tab-pane fadeIn active">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-layout');
                ?>
            </div>

            <div id="details" class="egs_tab-pane fadeIn">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-general');
                ?>
            </div>

            <div id="branding" class="egs_tab-pane fadeIn">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-branding');
                ?>
            </div>

            <div id="social" class="egs_tab-pane fadeIn">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-social');
                ?>
            </div>

            <div id="more" class="egs_tab-pane fadeIn">
                <?php
                settings_fields('esg_option_group');
                do_settings_sections('esg-settings-additional');
                ?>
            </div>

            <div id="shortcodes" class="egs_tab-pane fadeIn">
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
        </div>
        <?php submit_button(); ?>
    </form>
</div>
