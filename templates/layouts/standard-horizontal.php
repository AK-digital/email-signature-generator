<table class="standard-horizontal" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left;">
    <tbody>
    <tr>
        <?php if ($logo): ?>
            <td>
                <img src="<?= $logo; ?>" alt="logo"
                     style="max-height: 120px;padding-right: 15px;margin-right:15px; border-right: 1px solid <?= $icon_color; ?>"/>
            </td>
        <?php endif; ?>
        <?php if ($firstname || $surname || $title || $company_name): ?>
        <td style="padding: 0px; vertical-align: middle;text-align:left;"><h3 color="<?= $text_color; ?>"
                                                                              style="margin: 0px; font-size: 18px; color: rgb(0, 0, 0);">
                <span><?= $firstname ?></span><span>&nbsp;</span><span><?= $surname ?></span></h3>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;">
                <span><?= $title ?></span></p>

            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin-bottom: 10px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;">
                <span><?= $company_name ?></span></p>

            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;"> <span
                        color="<?= $icon_color; ?>" width="11"><img
                            src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                            color="<?= $icon_color; ?>" width="13px"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><a
                        href="tel:<?= $mobile; ?>"
                        color="<?= $text_color; ?>"
                        style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $mobile; ?></span></a>
                | <span color="<?= $icon_color; ?>"><img
                            src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                            color="<?= $icon_color; ?>" width="13px"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span>
                <a href="tel:<?= $phone; ?>" color="<?= $text_color; ?>"
                   style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;"><span><?= $phone; ?></span></a>
            </p>

            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;">
                 <span color="<?= $icon_color; ?>"><img
                             src="<?= $this->plugin_url; ?>assets/img/email-icon.webp"
                             color="<?= $icon_color; ?>"
                             style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span>
                <a href="mailto:" color="<?= $text_color; ?>"
                   style="text-decoration: none; <?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $email; ?></span></a></span>
                | <span color="<?= $icon_color; ?>"><img
                            src="<?= $this->plugin_url; ?>assets/img/icon-website.png" width="12px"
                            color="<?= $icon_color; ?>"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><a
                        href="<?= $website; ?>"
                        color="<?= $text_color; ?>"
                        style="text-decoration: none; color: <?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $website; ?></span></a>
            </p>
            <?php endif; ?>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;">
            <span color="<?= $icon_color; ?>"
            ><img src="<?= $this->plugin_url; ?>assets/img/address-icon.webp"
                  color="<?= $icon_color; ?>" width="13px"
                  style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><span
                        color="<?= $text_color; ?>"
                        style="font-size: 12px; color:<?= $text_color; ?>"><span><?= $adress; ?></span></span></p>

            <?php if ($linkedin_url || $facebook_url || $instagram_url || $youtube_url || $twitter_url || $tiktok_url): ?>
    <tr style="vertical-align: middle;line-height:25px;padding-top: 6px;">
        <td></td>
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

    </td>
    <!--<td style="padding: 0px;text-align:left;"><span color="<? /*= $text_color; */ ?>"
style="font-size: 12px; color:<? /*= $text_color; */ ?>"><span><? /*= $linkedin; */ ?></span></span>
</td>-->
    </tr>
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
