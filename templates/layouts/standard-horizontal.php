<table class="standard-horizontal" cellpadding="0" cellspacing="0"
       style="vertical-align: middle; font-size: medium; font-family: <?= $font_family ?>; text-align:left;">
    <tbody>
    <tr>
        <?php if ($logo): ?>
            <td style="width:200px;padding-right: 20px;margin-right: 20px;border-right: 1px solid <?= $icon_color; ?>;vertical-align: middle; ">
                <img src="<?= $logo; ?>" alt="logo"
                     style="max-height: 170px;padding-right:20px;margin-right:20px; border-right: 1px solid <?= $icon_color; ?>"/>
            </td>
        <?php endif; ?>
        <?php if ($firstname || $surname || $title || $company_name): ?>
        <td style="padding-left: 20px; vertical-align: middle;text-align:left;">
            <h3 color="<?= $text_color; ?>"  style="margin: 0px; font-size: 18px; color:<?= $text_color; ?>;letter-spacing:0.05em;font-family: <?= $font_family ?>">
                <?= $firstname ?><span>&nbsp;</span><?= $surname ?><a href="<?= $linkedin_perso ?>" style="margin-left:6px;"><img src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin-perso-icon.png" width="12px" style="background-color:<?= $icon_color;?> position: relative;top:1px;?>;"/></a></h3>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px; line-height: 20px;font-family: <?= $font_family ?>">
                <?= $title ?> <?php if($title || $company_name){ echo '-'; } ?> <?= $company_name ?></p>
            <?php if ($mobile): ?>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size:14px; line-height: 20px;font-family: <?= $font_family ?>"> <span
                        color="<?= $icon_color; ?>" style="vertical-align:middle;" width="11"><img
                            src="<?= $this->plugin_url; ?>assets/img/mobile-icon.png"
                            color="<?= $icon_color; ?>" width="14px"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><a
                        href="tel:<?= $mobile; ?>"
                        color="<?= $text_color; ?>"
                        style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;"><span><?= $mobile; ?></span></a>

                | <?php endif; ?>
                <?php if ($phone): ?><span color="<?= $icon_color; ?>" style="vertical-align:middle;"><img
                            src="<?= $this->plugin_url; ?>assets/img/phone-icon.png"
                            color="<?= $icon_color; ?>" width="12px"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span>
                <a href="tel:<?= $phone; ?>" color="<?= $text_color; ?>"
                   style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;"><span><?= $phone; ?></span></a>
            </p>
        <?php endif; ?>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?= $text_color; ?>; font-size: 14px;line-height:20px;font-family: <?= $font_family ?>">
                 <span color="<?= $icon_color; ?>" style="vertical-align:middle;"><img
                             src="<?= $this->plugin_url; ?>assets/img/email-icon.png"
                             color="<?= $icon_color; ?>" width="13px"
                             style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span>
                <a href="mailto:" color="<?= $text_color; ?>"
                   style="text-decoration: none; <?= $text_color; ?>; font-size: 12px;text-align:left;font-family: <?= $font_family ?>"><span><?= $email; ?></span></a></span>
                | <span color="<?= $icon_color; ?>" style="vertical-align:middle;"><img
                            src="<?= $this->plugin_url; ?>assets/img/website-icon.png" width="12px"
                            color="<?= $icon_color; ?>" width="13px"
                            style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><a
                        href="<?= $website; ?>"
                        color="<?= $text_color; ?>"
                        style="text-decoration: none; color: <?= $text_color; ?>; font-size: 12px;text-align:left;font-family: <?= $font_family ?>"><span><?= $website; ?></span></a>
            </p>
            <?php endif; ?>
            <p color="<?= $text_color; ?>" font-size="medium"
               style="margin:0px; color:<?= $text_color; ?>;font-size: 14px;line-height:20px;font-family: <?= $font_family ?>">
            <span color="<?= $icon_color; ?>" style="vertical-align:middle;"
            ><img src="<?= $this->plugin_url; ?>assets/img/address-icon.png"
                  color="<?= $icon_color; ?>" width="13px"
                  style="background-color:<?= $icon_color; ?>;margin-right:4px;"></span><span
                        color="<?= $text_color; ?>"
                        style="font-size: 12px; color:<?= $text_color; ?>"><?= $address; ?></span></p>
<div style="margin-bottom:10px"></div>
            <?php if ($linkedin_url || $facebook_url || $instagram_url || $youtube_url || $twitter_url || $tiktok_url): ?>

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
            <?php endif; ?>

        </td>
        <!--<td style="padding: 0px;text-align:left;"><span color="<? /*= $text_color; */ ?>"
style="font-size: 12px; color:<? /*= $text_color; */ ?>"><span><? /*= $linkedin; */ ?></span></span>
</td>-->
    </tr>
    <?php if ($banner || $additional_content): ?>
        <tr>
            <td colspan="2" style="text-align:left;padding-top:10px;">
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
