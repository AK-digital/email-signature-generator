<table class="studiokrack" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left; max-width: 500px;">
    <tbody>
    <tr>
        <td style="vertical-align: middle;text-align:left;"><h3
                    color="<?php echo $text_color; ?>"
                    style="margin: 0px; letter-spacing: 0px;text-transform:capitalize;font-size:16px;color:<?php echo $text_color; ?>;">
                <span><?php echo $firstname ?></span><span>&nbsp;</span><span><?php echo $surname ?></span></h3>

            <p color="<?php echo $text_color; ?>" font-size="medium"
               style="margin: 0px; color: <?php echo $text_color; ?>; font-size: 13px; line-height: 22px;">
                <span style="font-style: italic;"><?php echo $title ?></span></p>
        </td>
    </tr>
    <tr style="display:block;margin-bottom: 10px;"></tr>

    <tr>
        <td style="vertical-align: middle;line-height:18px;text-align:left;font-size:13px;">
            <span color="<?php echo $icon_color; ?>"><img
                        src="<?php echo $this->plugin_url; ?>assets/img/icon-mobile.png"
                        color="<?php echo $icon_color; ?>"
                        style="background-color:<?php echo $icon_color; ?>;"
                        width="12px"></span>
            <a href="tel:<?php echo $mobile; ?>" color="<?php echo $text_color; ?>"
                                               style="text-decoration: none; color:<?php echo $text_color; ?>; font-size: 12px;text-align:left;"><span><?php echo $mobile; ?></span></a>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: middle;line-height:18px;text-align:left;font-size:13px;">
            <span color="<?php echo $icon_color; ?>"><img
                        src="<?php echo $this->plugin_url; ?>assets/img/phone-icon.webp"
                        color="<?php echo $icon_color; ?>"
                        style="background-color:<?php echo $icon_color; ?>;"
                        width="12px"></span>
            <a href="tel:<?php echo $phone; ?>" color="<?php echo $text_color; ?>"
               style="text-decoration: none; color:<?php echo $text_color; ?>; font-size: 12px;text-align:left;"><span><?php echo $phone; ?></span></a>

        </td>
    </tr>
    <tr style="vertical-align:middle;line-height:18px;font-size:13px;">
        <td style="vertical-align:middle;text-align:left;"><span color="<?php echo $icon_color; ?>"><img
                    src="<?php echo $this->plugin_url; ?>assets/img/link-icon.webp"
                    color="<?php echo $icon_color; ?>"
                    style="background-color:<?php echo $icon_color; ?>;"
                    width="12px"></span>
        <a href="<?php echo $website; ?>"
                                                     color="<?php echo $text_color; ?>"
                                                     style="text-decoration: none; color:<?php echo $text_color; ?>; font-size: 12px;text-align:left;"><span><?php echo $website; ?></span></a>
        </td>
    </tr>
    <tr style="display:block; margin-bottom:10px;">
    </tr>
    <tr>
        <td>
            <img src="<?php echo $logo; ?>" alt="logo" width="200px"/>
        </td>
    </tr>
    </tbody>
</table>
