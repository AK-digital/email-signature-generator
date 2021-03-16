<table class="standard-horizontal" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left;">
    <tbody>
    <tr>
        <td>
            <img src="<?php echo $logo; ?>" alt="logo" style="max-width:100px;"/>
        </td>
        <td style="padding: 0px; vertical-align: middle;text-align:left;"><h3 color="<?php echo $text_color; ?>"
                                                                              style="margin: 0px; font-size: 18px; color: rgb(0, 0, 0);">
                <span><?php echo $firstname ?></span><span>&nbsp;</span><span><?php echo $surname ?></span></h3>

            <p color="<?php echo $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?php echo $text_color; ?>; font-size: 14px; line-height: 22px;">
                <span><?php echo $title ?></span></p>

            <p color="<?php echo $text_color; ?>" font-size="medium"
               style="margin: 0px; color:<?php echo $text_color; ?>; font-size: 14px; line-height: 22px;">
                <span><?php echo $company_name ?></span></p>
    </tr>
    <tr>
        <table cellpadding="0" cellspacing="0"
               style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left;">
            <tbody>
            <tr style="vertical-align: middle;">
                <td style="vertical-align: middle;"><span color="<?php echo $icon_color; ?>" width="11"><img
                                src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                                color="<?php echo $icon_color; ?>"
                                style="display: block; background-color:<?php echo $icon_color; ?>;"></span>
                </td>
                <td style="padding: 0px; color: <?php echo $text_color; ?>;text-align:left;"><a href="tel:<?php echo $mobile; ?>" color="<?php echo $text_color; ?>"
                                                                  style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;text-align:left;"><span><?php echo $mobile; ?></span></a>
                    | <a href="tel:<?php echo $phone; ?>" color="<?php echo $text_color; ?>"
                         style="text-decoration: none; color:<?php echo $text_color; ?>; font-size: 12px;"><span><?php echo $phone; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;">
                <td style="vertical-align:middle;text-align:left;">
                    <span color="<?php echo $icon_color; ?>"><img
                                src="<?php echo $this->plugin_url;?>assets/img/email-icon.webp"
                                color="<?php echo $icon_color; ?>" style="display: block; background-color:<?php echo $icon_color; ?>;"></span>
                </td>
                </td>
                <td style="padding: 0px;text-align:left;"><a href="mailto:" color="<?php echo $text_color; ?>"
                                                             style="text-decoration: none; <?php echo $text_color; ?>; font-size: 12px;text-align:left;"><span><?php echo $email; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;">
                <td style="vertical-align: bottom;text-align:left;"><span color="<?php echo $icon_color; ?>"><img
                                src="<?php echo $this->plugin_url;?>assets/img/link-icon.webp"                                color="<?php echo $icon_color; ?>"
                                style="display: block; background-color:<?php echo $icon_color; ?>;"></span>
                </td>
                <td style="padding: 0px;text-align:left;"><a href="<?php echo $website; ?>" color="<?php echo $text_color; ?>"
                                                             style="text-decoration: none; color: <?php echo $text_color; ?>; font-size: 12px;text-align:left;"><span><?php echo $website; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;text-align:left;">
                <td style="vertical-align:middle;"><span color="<?php echo $icon_color; ?>" width="11"
                    ><img
                                src="<?php echo $this->plugin_url;?>assets/img/address-icon.webp"
                                color="<?php echo $icon_color; ?>"
                                style="display: block; background-color:<?php echo $text_color; ?>;"></span>
                </td>
                <td style="padding: 0px;text-align:left;"><span color="<?php echo $text_color; ?>"
                                                                style="font-size: 12px; color:<?php echo $text_color; ?>"><span><?php echo $adress; ?></span></span>
                </td>
                <td style="padding: 0px;text-align:left;"><span color="<?php echo $text_color; ?>"
                                                                style="font-size: 12px; color:<?php echo $text_color; ?>"><span><?php echo $linkedin; ?></span></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="<?php echo $banner; ?>" alt="logo" style="max-width:300px;"/>
                </td>
            </tr>
            </tbody>
        </table>
    </tr>
    </tbody>
</table>
