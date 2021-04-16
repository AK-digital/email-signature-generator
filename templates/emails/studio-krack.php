<h1>Modif ALex branche</h1>
<table class="studio-krack-template" cellpadding="0" cellspacing="0"
       style="vertical-align: middle; font-size: medium;font-family:<?= $font_family ?>; text-align:left; max-width: 500px;">
    <tbody>
    <tr>
        <td style="vertical-align: middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;line-height:17px;padding-top: 16px;">
            <span color="<?= $text_color; ?>"
                  style="vertical-align: middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-size:14px;font-weight:700;">
                <?= $firstname ?></span>
            <span color="<?= $text_color; ?>" style="vertical-align: middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-size:14px;font-weight:700;"><?= $surname ?></span>
                <?php if ($user_linkedin): ?>
                    <a href="<?= $user_linkedin ?>" style="margin-left:3px;text-decoration:none;"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin.png"
                                width="15px" height="15px"
                                style="position: relative;vertical-align: middle;"/></a>
            <?php endif; ?>
            <br>
            <?php if ($title): ?>
                <span style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>; font-style: italic;"><?= $title ?></span>
            <?php endif; ?>

            <?php if ($title && $company_name): ?>
                <span style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>; font-style: italic;">-</span>
            <?php endif; ?>
            <?php if ($company_name): ?>
                <span style="text-decoration: none; color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>; font-style: italic;"><?= $company_name ?></span>
            <?php endif; ?>
        </td>
    </tr>
    <tr style="display:block;margin-bottom:10px;"></tr>

    <tr>
        <td style="vertical-align: middle;line-height:16px;text-align:left;font-size:12px;text-decoration: none; color:<?= $text_color; ?>; font-family:<?= $font_family ?>">
          <span style="color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;font-weight:700;">Port: </span>
            <?= $mobile; ?>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: middle;line-height:16px;text-align:left;font-size:12px;text-decoration: none; color:<?= $text_color; ?>; font-family:<?= $font_family ?>">
    <span style="color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;font-weight:700;">Tél: </span>
            <?= $phone; ?>
        </td>
    </tr>
    <tr>
        <td style="vertical-align:middle;text-align:left;text-decoration: none;line-height:16px;font-size:12px;">
            <span style="color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;font-weight:700;">Web: </span>
            <a href="<?= $website_url; ?>" style="font-size: 12px;font-family:<?= $font_family ?>;"><?= $website; ?></a>
        </td>
    </tr>
    <?php if ($address): ?>
        <tr>
            <td style="vertical-align:middle;text-align:left;line-height:16px;font-size:12px;text-decoration: none;">
                <span style="color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;font-weight:700;text-decoration: none;">Adresse: </span><span style="color:<?= $text_color; ?>; font-size: 12px;text-align:left;font-family:<?= $font_family ?>;"><?= $address; ?></span>
            </td>
        </tr>
    <?php endif; ?>
    <tr>
        <td style="vertical-align:middle;text-align:left;">

            <?php if ($logo): ?>
                <a href="<?= $website_url; ?>"><img src="<?= $logo; ?>" alt="logo" width="200px" height="85px"
                                                style="margin-top:10px;margin-bottom:10px;text-decoration:none"/></a>
            <?php endif; ?>
            <?php if ($baseline): ?>
        <tr>
            <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top:6px;font-style:italic; color:<?= $text_color ?>; font-size:14px;">
                <?php if ($baseline): ?>
                    <span><?= $baseline ?></span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
    <?php if ($linkedin_url || $facebook_url || $instagram_url || $youtube_url || $twitter_url || $tiktok_url): ?>
        <tr>
            <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top: 6px;">
                <?php if (!empty($linkedin_url)): ?>
                    <a href="<?= $linkedin_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin-icon.png"
                                style="background-color:<?= $icon_color; ?>; width:24px;" width="24px"
                                height="24px"/></a>
                <?php endif;
                if (!empty($facebook_url)): ?>
                    <a href="<?= $facebook_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/facebook-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;" width="24px" height="24px"/></a>
                <?php endif;
                if (!empty($instagram_url)): ?>
                    <a href="<?= $instagram_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/instagram-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;" width="24px" height="24px"/></a>
                <?php endif;
                if (!empty($youtube_url)): ?>
                    <a href="<?= $youtube_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/youtube-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;" width="24px" height="24px"/></a>
                <?php endif;
                if (!empty($twitter_url)): ?>
                    <a href="<?= $twitter_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/twitter-icon.png"
                                style="background-color: <?= $icon_color; ?>; width:24px;" width="24px" height="24px"/></a>
                <?php endif;
                if (!empty($tiktok_url)): ?>
                    <a href="<?= $tiktok_url; ?>" target="_blank"><img
                                src="<?= $this->plugin_url; ?>assets/img/social-icons/tiktok-icon.png"
                                style="background-color:<?= $icon_color; ?>; width:24px;" width="24px"
                                height="24px"/></a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
    </td>
    </tr>

    <?php if ($banner || $additional_content): ?>
        <tr>
            <td colspan="2"
                style="text-align:left; padding-top: 10px;font-family:<?= $font_family ?>;font-style:italic; font-size:11px;line-height:14px; color: #79808c;">
                <?php if ($banner): ?>
                    <img src="<?= $banner; ?>" alt="banner" width="500px" height="80px"/>
                <?php endif; ?>
                <?php if ($additional_content): ?>
                    <span style="text-align:left; font-family:<?= $font_family ?>;font-style:italic; font-size:11px;line-height:14px; color: #79808c;"><?php print($additional_content); ?></span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
