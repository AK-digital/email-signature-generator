<table class="standard-vertical" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left; max-width: 500px;">
    <tbody>
    <tr>
        <?php if ($logo): ?>
            <td width="100px" style="padding-right: 10px;">
                <img src="<?= $logo; ?>" alt="logo" style="max-width: 130px;"/>
            </td>
        <?php endif; ?>
        <?php if ($firstname || $surname || $title || $company_name): ?>
            <td style="padding-bottom:7px;vertical-align: middle;text-align:left;">
                <?php if ($firstname || $surname ): ?>
                <h3 color="<?= $text_color; ?>"
                    style="margin: 0px; font-size: 18px;color:<?= $text_color; ?>;">
                    <span><?= $firstname ?></span><span>&nbsp;</span><span><?= $surname ?></span></h3>
                <?php endif; ?>
                <?php if ($title): ?>
                <p color="<?= $text_color; ?>" font-size="medium"
                   style="margin: 0px; color: <?= $text_color; ?>; font-size: 14px; line-height: 22px;">
                    <span><?= $title ?></span></p>
                <?php endif; ?>
                <?php if ($company_name): ?>
                <p color="<?= $text_color; ?>" font-size="medium"
                   style="margin: 0px; color: <?= $text_color; ?>; font-size: 14px; line-height: 22px;"><?= $company_name ?></p>
                <?php endif; ?>
            </td>
        <?php endif; ?>
    </tr>
    <?php if ($phone || $mobile): ?>
        <tr style="vertical-align: middle;line-height:17px;">
        <?php if ($phone || $mobile): ?>
            <td style="vertical-align: middle;"><span color="<?= $icon_color ?>"><img
                            src="<?= $this->plugin_url; ?>assets/img/phone-icon.webp"
                            color="<?= $icon_color; ?>"
                            style="background-color:<?= $icon_color ?>;float:right; margin-right:10px;"
                            width="12px"></span>
            </td>
            <td style="padding: 0px;color:<?= $text_color; ?>;text-align:left;"><a href="tel:<?= $mobile; ?>"
                                                                                   color="<?= $text_color; ?>"
                                                                                   style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $mobile; ?></span></a>
                | <a href="tel:<?= $text_color; ?>" color="<?= $text_color; ?>"
                     style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;"><span><?= $phone ?></span></a>
            </td>
            </tr>
        <?php endif; ?>
    <?php endif; ?>
    <?php if ($email): ?>
        <tr style="vertical-align:middle;line-height:17px;">
            <td style="vertical-align:middle;"><span color="<?= $icon_color ?>"><img
                            src="<?= $this->plugin_url; ?>assets/img/email-icon.webp"
                            color="<?= $icon_color; ?>"
                            style="background-color:<?= $icon_color ?>;float:right; margin-right:10px;"
                            width="12px"></span>
            </td>
            </td>
            <td style="padding: 0px;text-align:left;"><a href="mailto:" color="<?= $text_color; ?>"
                                                         style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $email; ?></span></a>
            </td>
        </tr>
    <?php endif; ?>
    <?php if ($website): ?>
        <tr style="vertical-align:middle;line-height:17px;">
            <td style="vertical-align:middle;"><span color="<?= $icon_color ?>"><img
                            src="<?= $this->plugin_url; ?>assets/img/icon-website.png"
                            color="<?= $icon_color; ?>"
                            style="background-color:<?= $icon_color ?>;float:right; margin-right:10px;"
                            width="12px"></span>
            </td>
            <td style="padding: 0px;text-align:left;"><a href="<?= $website; ?>" color="<?= $text_color; ?>"
                                                         style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $website; ?></span></a>
            </td>
        </tr>
    <?php endif; ?>
    <?php if ($adress): ?>
        <tr style="vertical-align: middle;line-height:17px;">
            <td style="vertical-align:middle;"><span color="<?= $icon_color ?>"
                ><img
                            src="<?= $this->plugin_url; ?>assets/img/address-icon.webp"
                            color="<?= $icon_color; ?>"
                            style="background-color:<?= $icon_color ?>;float:right; margin-right:10px;"
                            width="12px"></span>
            </td>
            <td style="padding: 0px;text-align:left;"><span color="<?= $text_color; ?>"
                                                            style="font-size: 12px; color:<?= $text_color; ?>;"><span><?= $adress ?></span></span>
            </td>
        </tr>
    <?php endif; ?>
    <?php if ($linkedin_url || $facebook_url || $instagram_url || $youtube_url || $twitter_url || $tiktok_url): ?>
        <tr style="vertical-align: middle;line-height:25px;">
            <td style="vertical-align: middle;line-height: 25px;text-align:left;"></td>
            <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top: 6px;">
                <?php if (!empty($linkedin_url)): ?>
                    <a href="<?= $linkedin_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin-icon-2x.webp"
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

    <?php if ($banner || $additional_content): ?>
        <tr>
            <td colspan="2" style="text-align:left; padding-top: 10px;">
                <?php if ($banner): ?>
                    <img src="<?= $banner; ?>" alt="banner"/>
                <?php endif; ?>
                <?php if ($additional_content): ?>
                    <p style="font-family: Arial; font-size:13px;line-height:15px"><?php print($additional_content); ?></p>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
