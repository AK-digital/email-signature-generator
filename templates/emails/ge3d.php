<style>
    a:-webkit-any-link {
        text-decoration: none !important;
    }
</style>

<table class="ge3d-template" cellpadding="0" cellspacing="0"
       style="border-collapse: collapse; vertical-align:middle;font-family:<?= $font_family ?>;text-align:left; padding:0;border-collapse: collapse;text-decoration:none !important;">

    <?php if ($logo): ?>
    <tr>
        <td style="vertical-align:middle; padding:0;line-height:0;">
            <a href="<?= $website_url ?>"><img src="<?= $logo; ?>" alt="logo" width="160px"/></a>
        </td>
        <td style="vertical-align:middle; padding: 0;">
            <table style="margin-left:10px;border-collapse: collapse;text-decoration:none !important;">
                <?php endif; ?>

                <?php if ($firstname || $surname): ?>
                <tr>
                    <td style="text-align:left;">
                        <?php if ($firstname): ?>
                        <span style="text-align:left;font-family:<?= $font_family ?>;line-height:17px;font-size:16px;font-weight:800;color:<?= $highlight_color ?>;"><?= $firstname ?></span>
                        <?php endif; ?>
                        <?php if ($surname): ?>
                        <span> </span>
                        <span style="text-align:left;font-family:<?= $font_family ?>;line-height:17px;font-size:16px;font-weight:800;color:<?= $highlight_color ?>;"><?= $surname ?></span>
                        <?php endif; ?>
                        <?php if ($user_linkedin): ?>
                            <span style="text-align:left;font-family:<?= $font_family ?>;line-height:17px;font-size:16px;font-weight:800;color:<?= $highlight_color ?>;width:14px;height:14px;">
                            <a href="<?= $user_linkedin ?>"
                               style="margin-left:3px;text-decoration:none !important;"><img
                                        src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin.png"
                                        width="14px" height="14px"
                                        style="position: relative;width:14px;height:14px;"/></a></span>
                        <?php endif; ?>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php if ($title): ?>
                    <tr>
                        <td style="text-align:left;">
                            <span style="text-align:left;text-decoration:none !important; color:<?= $text_color; ?>; font-size:14px;font-weight:600;font-family:<?= $font_family ?>;"><?= $title ?></span>
                        </td>
                    </tr>
                <?php endif; ?>

                <tr style="display:block;margin-bottom:7px;"></tr>

                <?php if ($email): ?>
                    <tr>
                        <td style="vertical-align:top;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                             <span style="text-align:left;line-height:17px;display:inline-block;vertical-align: middle;width:12px;height:10px;">
                                <img width="12px" height="10px" src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-mail-gris.png"
                                     alt="picto mail" style="width:12px;height:10px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <a href="mailto:<?= $email; ?>" style="color:<?= $text_color; ?>;text-decoration:none;">
                                <span style="text-align:left;font-size:14px;font-weight:400;line-height:17px;font-family:<?= $font_family ?>;color:<?= $text_color ?>;text-decoration:none;"><?= $email; ?></span></a>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($phone): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                             <span style="text-align:left;line-height:17px;display:inline-block;vertical-align: middle; width:12px;height:12px;">
                                <img width="12px" height="12px" src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-phone-gris.png"
                                     alt="picto mobile" style="width:12px;height:12px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $phone; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($mobile): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;text-decoration:none !important;">
                             <span style="text-align:left;line-height:17px;display:inline-block;vertical-align:middle;text-decoration:none !important;width:12px;height:12px;">
                                <img width="12px" height="12px" src="https://www.geometre-expert-paris.fr/wp-content/plugins/email-signature-generator/assets/img/mobile-icon.png"
                                     alt="picto mobile"
                                     style="width:12px;height:12px;margin-right:5px;background-color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $mobile; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($address): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                           <span style="text-align:left;line-height:17px;display:inline-block;vertical-align: middle;width:12px;height:12px;">
                                <img width="12px" height="12px" src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-adresse-map.png"
                                     alt="picto adress" style="width:12px;height:12px;margin-right:7px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $address; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <tr style="display:block;margin-bottom:8px;"></tr>

                <?php if ($website_url): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;text-decoration:none !important;">
                           <span style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">
                          Visitez notre site web </span>
                            <a href="<?= $website_url; ?>" style="text-decoration:none !important;"><span
                                        style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;text-decoration:none !important;"><?= $website; ?></span></a>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($linkedin_url || $twitter_url): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;text-decoration:none !important;"
                            style="text-decoration:none !important;">
                            <span style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">Suivez GE3D sur </span>
                            <?php if ($linkedin_url): ?>
                                <a href="<?= $linkedin_url; ?>" target="_blank"
                                   style="text-decoration:none !important;"><span
                                            style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;text-decoration:none !important;">Linkedin</span></a>
                            <?php endif;
                            if ($twitter_url): ?>
                                <span style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;text-decoration:none !important;">et </span>
                                <a href="<?= $twitter_url; ?>" target="_blank"
                                   style="text-decoration:none !important;"><span
                                            style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;text-decoration:none !important;"><span
                                                style="text-align:left;font-size:14px;font-weight:500;line-height:17px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;text-decoration:none !important;">Twitter</span></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($logo): ?>
            </table>

            <?php if ($banner || $additional_content): ?>
    <tr>
        <td colspan="2" width="480px"
            style="text-align:left; padding-top: 10px;font-family:<?= $font_family ?>;font-style:italic; font-size:11px;line-height:14px;color:<?= $text_color; ?>;">
            <?php if ($banner): ?>
                <a href="<?= $banner_link ?>" style="text-decoration: none !important;"><img src="<?= $banner; ?>" alt="banner" width="480px"/></a>
            <?php endif; ?>
            <?php if ($additional_content): ?>
                <span style="text-align:left; font-family:<?= $font_family ?>;font-style:italic; font-size:11px;line-height:14px; color: #79808c;"><?php print($additional_content); ?></span>
            <?php endif; ?>
        </td>
    </tr>
<?php endif; ?>
    </td>
    </tr>
<?php endif; ?>
</table>
