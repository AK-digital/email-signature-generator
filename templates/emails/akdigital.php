<table style=" font-size: 10pt; font-family:<?= $font_family ?>;border-collapse: collapse;text-align:left; padding:0;border-collapse: collapse;text-decoration:none !important;" cellpadding="0" cellspacing="0"
       border="0">
    <tbody>
    <tr>
        <td width=150 style="font-size: 10pt; font-family:<?= $font_family ?>; width:150px; vertical-align: top;" valign="top">
            <a href="<?= $website_url ?>">
                <img ng-src="<?= $logo; ?>" alt="photograph" width=150 border="0"
                                               style="border:0; height:auto; width:150px" src="<?= $logo; ?>"></a>
        </td>
        <td width=300 style="color:<?= $text_color; ?>;font-family:<?= $font_family ?>; padding-bottom: 5px;  padding-left: 10px; vertical-align: top; line-height:1.3;width:300px;"
            valign="top">
                      <span style="line-height:<?= $user_firstname_line_height ?>px;
                              font-size:<?= $user_firstname_font_size ?>px;
                              font-weight:<?= $user_firstname_font_weight ?>;
                              font-style:<?= $user_firstname_font_style ?>;
                              text-align:<?= $user_firstname_text_align ?>;
                              font-family:<?= $font_family ?>;
                              color:<?= $highlight_color ?>;"
                      ><?= $firstname ?></span>
            <span
                    style=" font-family:<?= $font_family ?>;
                            color:<?= $highlight_color ?>;
                            line-height:<?= $user_surname_line_height ?>px;
                            font-size:<?= $user_surname_font_size ?>px;
                            font-weight:<?= $user_surname_font_weight ?>;
                            font-style:<?= $user_surname_font_style ?>;
                            text-align:<?= $user_surname_text_align ?>;
                            "
            >
                <?= $surname ?></span>

            <span
                    style="text-align:left;
                            line-height:14px;font-size:13px;
                            color:<?= $highlight_color ?>;
                            width:14px;height:14px;">
                            <a href="<?= $user_linkedin ?>"
                               style="margin-left:3px;text-decoration:none !important;"><img
                                        src="<?= $this->plugin_url; ?>assets/img/social-icons/linkedin.png"
                                        width=14 height=14
                                        style="position: relative;width:14px;height:14px;"/></a></span>
            <br>
            <span
                    style="vertical-align:top;
                            font-family:<?= $font_family ?>;
                            color:<?= $text_color; ?>;
                            font-size:<?= $user_title_font_size ?>px;
                            line-height:<?= $user_title_line_height ?>px;
                            font-weight:<?= $user_title_font_weight ?>;
                            text-align:<?= $user_title_text_align ?>;
                            font-style:<?= $user_title_font_style ?>;
                            "
            ><?= $title; ?><br><br></span>

            <span style="text-align:left;line-height:14px;display:inline-block;vertical-align: middle;">
                                <img height=12 class="icons" bgcolor="<?= $icon_color ?>" color="<?= $icon_color ?>"
                                     src="<?= $this->plugin_url ?>assets/img/email-icon-red.png"
                                     alt="picto mail" style="height:12px;">
                            </span>
            <a href="mailto:<?= $email; ?>" target="_blank" rel="noopener"
               style="text-decoration:none;">
                <span
                    style=" font-size: <?= $user_email_font_size ?>px;
                            line-height:<?= $user_email_line_height ?>px;
                            font-weight:<?= $user_email_font_weight ?>;
                            text-align:<?= $user_email_text_align ?>;
                            font-style:<?= $user_email_font_style ?>;
                            font-family:<?= $font_family ?>;
                            color:<?= $text_color; ?>;text-decoration:none;">
                    <?= $email; ?></span></a>
                <br>

            <span style="text-align:left;line-height:<?= $user_mobile_line_height ?>px;display:inline-block;vertical-align: middle;">
                                <img height=12 class="icons"
                                     src="<?= $this->plugin_url ?>assets/img/phone-icon-red.png"
                                     alt="picto mail" style="height:12px;background:<?= $icon_color ?>;">
                            </span>
            <span
                    style=" line-height:<?= $user_mobile_line_height ?>px;
                            font-size:<?= $user_mobile_font_size ?>px;
                            font-weight:<?= $user_mobile_font_weight ?>;
                            text-align:<?= $user_mobile_text_align ?>;
                            font-style:<?= $user_mobile_font_style ?>;
                            font-family:<?= $font_family ?>;
                            color:<?= $text_color; ?>;"
            ><?= $mobile; ?><br></span>

            <span style="text-align:left;line-height:<?= $user_phone_line_height ?>px;display:inline-block;vertical-align: middle;">
                                <img height=12 class="icons"
                                     src="<?= $this->plugin_url ?>assets/img/phone-icon-red.png"
                                     alt="picto mail" style="height:12px;background:<?= $icon_color ?>;">
                            </span>
            <span
                    style=" line-height:<?= $phone_line_height ?>px;
                            font-size:<?= $phone_font_size ?>px;
                            font-weight:<?= $phone_font_weight ?>;
                            text-align:<?= $phone_text_align ?>;
                            font-style:<?= $phone_font_style ?>;
                            font-family:<?= $font_family ?>;
                            color:<?= $text_color; ?>;"
            ><?= $phone; ?><br></span>

            <span style="text-align:left;display:inline-block;vertical-align: middle;">
                                <img height=12 class="icons"
                                     src="<?= $this->plugin_url ?>assets/img/address-icon-red.png"
                                     alt="picto address" style="height:12px;background:<?= $icon_color ?>;">
                            </span>
            <span
                    style=" font-family:<?= $font_family ?>;
                            line-height:<?= $address_line_height ?>px;
                            font-weight:<?= $address_font_weight ?>;
                            font-style:<?= $address_font_style ?>;
                            font-size:<?= $address_font_size ?>px;
                            text-align:<?= $address_text_align ?>;
                            vertical-align:top;
                            color:<?= $text_color; ?>"><?= $address; ?></span>
            <br>
            <span
                    style=" margin-left: 17px;
                            font-family:<?= $font_family ?>;
                            line-height:<?= $city_line_height ?>px;
                            font-weight:<?= $city_font_weight ?>;
                            font-style:<?= $city_font_style ?>;
                            font-size:<?= $city_font_size ?>px;
                            text-align:<?= $city_text_align ?>;
                            vertical-align:top;
                            color:<?= $text_color; ?>"><?= $city; ?></span>
            <br>


        </td>
    </tr>

    <tr ng-if="showField('banner')">
        <td colspan="2" style="padding-top:5px">
            <a ng-if="showField('bannerURL')" href="<?= $banner_link ?>" target="_blank" rel="noopener"><img border="0"
                                                                                                             ng-src="<?= $banner; ?>"
                                                                                                             alt="Banner"
                                                                                                             style="max-width:450px; height:auto; border:0;"
                                                                                                             src="<?= $banner; ?>"></a>

            <span style="font-size: 13px; font-family:<?= $font_family ?>; color: <?= $text_color; ?>;font-style:italic;"> Visitez notre site web </span>

            <a href="<?= $website_url; ?>" target="_blank" rel="noopener"
               style="text-decoration:none;"><span
                        style="font-size: 13px; font-family:<?= $font_family ?>; color: <?= $highlight_color; ?>;font-style:italic;text-decoration:none;"
                ><?= $website; ?></span></a>
            <br>
            <span
                    style="text-align:left;line-height:13px;font-size:13px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">
                          Suivez GE3D sur </span>
            <a href="<?= $linkedin_url; ?>" target="_blank" rel="noopener"
               style="text-decoration:none;color:<?= $highlight_color; ?>;"><span
                        style="font-size: 13px; font-family:<?= $font_family ?>; color: <?= $highlight_color; ?>;font-style:italic;"
                >Linkedin</span><span
                        style="text-align:left;font-size:13px;line-height:13px;color:<?= $text_color; ?>;font-family:<?= $font_family ?>;font-style:italic;">
                          et </span>
                <a href="<?= $twitter_url; ?>" target="_blank" rel="noopener"
                   style="text-decoration:none;color:<?= $highlight_color; ?>;">
                    <span
                            style="font-size: 13px;line-height:13px;font-family:<?= $font_family ?>; color: <?= $highlight_color; ?>;font-style:italic;"
                    >Twitter<br></span></a>
        </td>
    </tr>

    </tbody>
</table>
