<table class="standard-horizontal" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left;">
    <tbody>
    <tr>
        <td>
            <img src="<?php echo $options['logo']; ?>" alt="logo" style="max-width:100px;"/>
        </td>
        <td style="padding: 0px; vertical-align: middle;text-align:left;"><h3 color="#000000"
                                                                              style="margin: 0px; font-size: 18px; color: rgb(0, 0, 0);">
                <span><?php echo $firstname ?></span><span>&nbsp;</span><span><?php echo $surname ?></span></h3>

            <p color="#000000" font-size="medium"
               style="margin: 0px; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;">
                <span><?php echo $title ?></span></p>

            <p color="#000000" font)-size="medium"
               style="margin: 0px; color: rgb(0, 0, 0); font-size: 14px; line-height: 22px;">
                <span><?php echo $options['company_name'] ?></span></p>
    </tr>
    <tr>
        <table cellpadding="0" cellspacing="0"
               style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left;">
            <tbody>
            <tr style="vertical-align: middle;">
                <td style="vertical-align: middle;"><span color="#F2547D" width="11"><img
                                src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/phone-icon-2x.png"
                                color="#F2547D"
                                style="display: block; background-color: rgb(242, 84, 125);"></span>
                </td>
                <td style="padding: 0px; color: rgb(0, 0, 0);text-align:left;"><a href="tel:<?php echo $mobile; ?>" color="#000000"
                                                                  style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;text-align:left;"><span><?php echo $mobile; ?></span></a>
                    | <a href="tel:<?php echo $options['phone']; ?>" color="#000000"
                         style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;"><span><?php echo $options['phone']; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;">
                <td style="vertical-align:middle;text-align:left;"><span color="#F2547D"><img
                                src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/email-icon-2x.png"
                                color="#F2547D" style="display: block; background-color: rgb(242, 84, 125);"></span>
                </td>
                </td>
                <td style="padding: 0px;text-align:left;"><a href="mailto:" color="#000000"
                                                             style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;text-align:left;"><span><?php echo $email; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;">
                <td style="vertical-align: bottom;text-align:left;"><span color="#F2547D"><img
                                src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/link-icon-2x.png"
                                color="#F2547D"
                                style="display: block; background-color: rgb(242, 84, 125);"></span>
                </td>
                <td style="padding: 0px;text-align:left;"><a href="<?php echo $options['website']; ?>" color="#000000"
                                                             style="text-decoration: none; color: rgb(0, 0, 0); font-size: 12px;text-align:left;"><span><?php echo $options['website']; ?></span></a>
                </td>
            </tr>
            <tr style="vertical-align: middle;text-align:left;">
                <td style="vertical-align:middle;"><span color="#F2547D" width="11"
                    ><img
                                src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/address-icon-2x.png"
                                color="#F2547D"
                                style="display: block; background-color: rgb(242, 84, 125);"></span>
                </td>
                <td style="padding: 0px;text-align:left;"><span color="#000000"
                                                                style="font-size: 12px; color: rgb(0, 0, 0);"><span><?php echo $options['adress']; ?></span></span>
                </td>
                <td style="padding: 0px;text-align:left;"><span color="#000000"
                                                                style="font-size: 12px; color: rgb(0, 0, 0);"><span><?php echo $linkedin; ?></span></span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <img src="<?php echo $options['banner']; ?>" alt="logo" style="max-width:300px;"/>
                </td>
            </tr>
            </tbody>
        </table>
    </tr>
    </tbody>
</table>
