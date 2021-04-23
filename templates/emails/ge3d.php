<table class="ge3d-template" cellpadding="0" cellspacing="0"
       style="border-collapse: collapse; vertical-align:middle;font-family:<?= $font_family ?>;text-align:left; padding:0;border-collapse: collapse;">

    <?php if ($logo): ?>
    <tr>
        <td style="vertical-align:middle; padding:0;line-height:0;">
            <img src="<?= $logo; ?>" alt="logo" width="160px"/>
        </td>
        <td style="vertical-align:middle; padding: 0;">
            <table style="margin-left:10px;border-collapse: collapse;">
                <?php endif; ?>

                <?php if ($firstname || $surname | $title): ?>
                    <tr>

                        <?php if ($firstname || $surname): ?>
                            <td style="text-align:left;">
                                <span style="text-align:left;font-family:<?= $font_family ?>;line-height:20px;font-size:16px;font-weight:800;color:<?= $highlight_color ?>;"><?= $firstname ?></span>
                                <span> </span>
                                <span style="text-align:left;font-family:<?= $font_family ?>;line-height:20px;font-size:16px;font-weight:800;color:<?= $highlight_color ?>;"><?= $surname ?></span>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <?php if ($title): ?>
                            <td style="text-align:left;">
                                <span style="text-align:left;text-decoration:none; color:<?= $text_color; ?>; font-size:14px;font-weight:600;font-family:<?= $font_family ?>;"><?= $title ?></span>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endif; ?>

                <tr style="display:block;margin-bottom:14px;"></tr>

                <?php if ($email): ?>

                    <tr>
                        <td style="vertical-align:top;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                             <span style="text-align:left;line-height:21px;display:inline-block;vertical-align: middle;">
                                <img src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-mail-gris.png"
                                     alt="picto mail" style="width:15px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $email; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($phone): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                             <span style="text-align:left;line-height:21px;display:inline-block;vertical-align: middle;">
                                <img src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-phone-gris.png"
                                     alt="picto mobile" style="width:15px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $phone; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($mobile): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                             <span style="text-align:left;line-height:21px;display:inline-block;vertical-align: middle;">
                                <img src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-phone-gris.png"
                                     alt="picto mobile" style="width:15px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $mobile; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($address): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;color:<?= $text_color; ?>;font-family:<?= $font_family ?>">
                                            <span style="text-align:left;line-height:21px;display:inline-block;vertical-align: middle;">
                                <img src="https://www.geometre-expert-paris.fr/wp-content/uploads/2021/04/Picto-adresse-map.png"
                                     alt="picto adress" style="width:15px;margin-right:5px;color:<?= $icon_color ?>;">
                            </span>
                            <span style="text-align:left;font-size:14px;font-weight:400;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;">
                                 <?= $address; ?>
                            </span>
                        </td>
                    </tr>
                <?php endif; ?>

                <tr style="display:block;margin-bottom:14px;"></tr>

                <?php if ($website_url): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;">
                           <span style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">
                          Visitez notre site web </span>
                            <a href="<?= $website_url; ?>"><span
                                        style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;"><?= $website; ?></span></a>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($linkedin_url || $twitter_url): ?>
                    <tr>
                        <td style="vertical-align:middle;text-align:left;">
                            <span style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">Suivez GE3D sur </span>
                            <?php if ($linkedin_url): ?>
                                <a href="<?= $linkedin_url; ?>" target="_blank"><span
                                            style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">Linkedin</span></a>
                            <?php endif;
                            if ($twitter_url): ?>
                                <span style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">et </span>
                                <a href="<?= $twitter_url; ?>" target="_blank"><span
                                            style="text-align:left;font-size:14px;font-weight:500;line-height:21px;color:<?= $highlight_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">Twitter</span></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>

                <?php if ($logo): ?>
            </table>
        </td>
    </tr>
<?php endif; ?>

</table>
