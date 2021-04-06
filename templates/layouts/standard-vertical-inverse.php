<table class="standard-vertical-inverse" cellpadding="0" cellspacing="0"
       style="vertical-align: middle; font-size: medium;font-family:<?= $font_family ?>; text-align:left; max-width: 500px;">
    <tbody>
    <tr>
        <td style="vertical-align: middle;text-align:left;"><h3
                    color="<?= $text_color; ?>"
                    style="margin: 0px;text-transform:capitalize;font-size:16px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                <span><?= $firstname ?></span><span>&nbsp;</span><span><?= $surname ?></span>
                <?php if ($user_linkedin): ?>
                <a href="<?= $user_linkedin ?>" style="margin-left:6px;"><img
                            src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin-perso-icon.png" width="12px"
                            style="background-color:<?= $icon_color; ?>; position: relative;top:1px;"/></a>
            <?php endif; ?></h3>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color: <?= $text_color; ?>; font-size: 13px; line-height: 22px;font-family:<?= $font_family ?>;">
                <span style="font-style: italic;"><?= $title ?></span> - <span
                        style="font-style: italic;"><?= $company_name ?></span></p>
        </td>
    </tr>
    <tr style="display:block;margin-bottom: 10px;"></tr>

    <tr>
        <td style="vertical-align: middle;line-height:18px;text-align:left;font-size:13px;">
            <img
                    src="<?= $this->plugin_url; ?>assets/img/mobile-icon.png"
                    color="<?= $icon_color; ?>"
                    style="background-color:<?= $icon_color; ?>;"
                    width="12px">
            <a href="tel:<?= $mobile; ?>" color="<?= $text_color; ?>"
               style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;"><?= $mobile; ?></a>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: middle;line-height:18px;text-align:left;font-size:13px;">
            <img
                    src="<?= $this->plugin_url; ?>assets/img/phone-icon.png"
                    color="<?= $icon_color; ?>"
                    style="background-color:<?= $icon_color; ?>;"
                    width="12px">
            <a href="tel:<?= $phone; ?>" color="<?= $text_color; ?>"
               style="text-decoration:none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;"><?= $phone; ?></a>

        </td>
    </tr>
    <tr style="vertical-align:middle;line-height:18px;font-size:13px;">
        <td style="vertical-align:middle;text-align:left;"><img
                    src="<?= $this->plugin_url; ?>assets/img/website-icon.png"
                    color="<?= $icon_color; ?>"
                    style="background-color:<?= $icon_color; ?>;"
                    width="12px">
            <a href="<?= $website; ?>"
               color="<?= $text_color; ?>"
               style="text-decoration:none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;"><?= $website; ?></a>
        </td>
    </tr>
    <?php if ($address): ?>
        <tr style="vertical-align:middle;line-height:18px;font-size:13px;">
            <td style="vertical-align:middle;text-align:left;"><img
                        src="<?= $this->plugin_url; ?>assets/img/address-icon.png"
                        color="<?= $icon_color; ?>"
                        style="background-color:<?= $icon_color; ?>;"
                        width="12px">
                <a href="<?= $address; ?>"
                   color="<?= $text_color; ?>"
                   style="text-decoration:none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><?= $address; ?></a>
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td style="vertical-align:middle;text-align:left;">
            <img src="<?= $logo; ?>" alt="logo" width="200px" style="margin-top:10px;margin-bottom:10px;"/>
            <?php if ($linkedin_url || $facebook_url || $instagram_url || $youtube_url || $twitter_url || $tiktok_url): ?>
        <tr style="vertical-align: middle;line-height:25px;padding-top: 6px;">
            <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top: 6px;">
                <?php if (!empty($linkedin_url)): ?>
                    <a href="<?= $linkedin_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin-icon.png"
                                style="background-color:<?= $icon_color; ?>; width:24px;"/></a>
                <?php endif;
                if (!empty($facebook_url)): ?>
                    <a href="<?= $facebook_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/facebook-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;"/></a>
                <?php endif;
                if (!empty($instagram_url)): ?>
                    <a href="<?= $instagram_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/instagram-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;"/></a>
                <?php endif;
                if (!empty($youtube_url)): ?>
                    <a href="<?= $youtube_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/youtube-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;"/></a>
                <?php endif;
                if (!empty($twitter_url)): ?>
                    <a href="<?= $twitter_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/twitter-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;"/></a>
                <?php endif;
                if (!empty($tiktok_url)): ?>
                    <a href="<?= $tiktok_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/tiktok-icon.png"
                                style="background-color:<?= $icon_color; ?>; width:24px;"/></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
    <tr style="vertical-align: middle;line-height:25px;padding-top: 6px;">
        <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top: 6px;">
            <?php if ($baseline): ?>
                <p style="font-style:italic; color:<?= $text_color ?>; font-size:14px;"><?= $baseline ?></p>
            <?php endif; ?>
        </td>
    </tr>
    </td>
    </tr>

    <?php if ($banner || $additional_content): ?>
        <tr>
            <td colspan="2" style="text-align:left; padding-top: 10px;">
                <?php if ($banner): ?>
                    <img src="<?= $banner; ?>" alt="banner"/>
                <?php endif; ?>
                <?php if ($additional_content): ?>
                    <p style="font-family: <?= $font_family ?>; font-size:13px;line-height:15px"><?php print($additional_content); ?></p>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
