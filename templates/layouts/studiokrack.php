<table class="standard-vertical" cellpadding="0" cellspacing="0"
       style="vertical-align: -webkit-baseline-middle; font-size: medium; font-family: Arial; text-align:left; max-width: 500px;">
    <tbody>
    <tr>
        <td width="100px">
            <img src="<?php echo $options['logo']; ?>" alt="logo" style="max-width:70px;"/>
        </td>
        <td style="padding: 0px; vertical-align: middle;text-align:left;"><h3 color="<?php echo $options['text_color']; ?>"
                                                                              style="margin: 0px; font-size: 18px;color:<?php echo $options['text_color']; ?>;">
                <span><?php echo $firstname ?></span><span>&nbsp;</span><span><?php echo $surname ?></span></h3>

            <p color="<?php echo $options['text_color']; ?>" font-size="medium"
               style="margin: 0px; color: <?php echo $options['text_color']; ?>; font-size: 14px; line-height: 22px;">
                <span><?php echo $title ?></span></p>

            <p color="<?php echo $options['text_color']; ?>" font)-size="medium"
               style="margin: 0px; color: <?php echo $options['text_color']; ?>; font-size: 14px; line-height: 22px;">
                <span><?php echo $options['company_name'] ?></span></p>
        </td>
    </tr>
    <tr style="vertical-align: middle;line-height:17px;">
        <td style="vertical-align: middle;"><span color="<?php echo $options['icon_color'] ?>"><img
                        src="<?php echo $this->plugin_url;?>assets/img/phone-icon.webp"
                        color="<?php echo $options['icon_color']; ?>" style="background-color:<?php echo $options['icon_color'] ?>;float:right; margin-right:10px;"
                        width="12px"></span>
        </td>
        <td style="padding: 0px;color:<?php echo $options['text_color']; ?>;text-align:left;"><a href="tel:<?php echo $mobile; ?>"
                                                                                                 color="<?php echo $options['text_color']; ?>"
                                                                                                 style="text-decoration: none; color:<?php echo $options['text_color']; ?>; font-size: 12px;text-align:left;"><span><?php echo $mobile; ?></span></a>
            | <a href="tel:<?php echo $options['phone']; ?>" color="<?php echo $options['text_color']; ?>"
                 style="text-decoration: none; color:<?php echo $options['text_color']; ?>; font-size: 12px;"><span><?php echo $options['phone']; ?></span></a>
        </td>
    </tr>
    <tr style="vertical-align:middle;line-height:17px;">
        <td style="vertical-align:middle;"><span color="<?php echo $options['icon_color'] ?>"><img
                        src="<?php echo $this->plugin_url;?>assets/img/email-icon.webp"
                        color="<?php echo $options['icon_color']; ?>" style="background-color:<?php echo $options['icon_color'] ?>;float:right; margin-right:10px;"
                        width="12px"></span>
        </td>
        </td>
        <td style="padding: 0px;text-align:left;"><a href="mailto:" color="<?php echo $options['text_color']; ?>"
                                                     style="text-decoration: none; color:<?php echo $options['text_color']; ?>; font-size: 12px;text-align:left;"><span><?php echo $email; ?></span></a>
        </td>
    </tr>
    <tr style="vertical-align:middle;line-height:17px;">
        <td style="vertical-align:middle;"><span color="<?php echo $options['icon_color'] ?>"><img
                        src="<?php echo $this->plugin_url;?>assets/img/link-icon.webp"
                        color="<?php echo $options['icon_color']; ?>" style="background-color:<?php echo $options['icon_color'] ?>;float:right; margin-right:10px;"
                        width="12px"></span>
        </td>
        <td style="padding: 0px;text-align:left;"><a href="<?php echo $options['website']; ?>" color="<?php echo $options['text_color']; ?>"
                                                     style="text-decoration: none; color:<?php echo $options['text_color']; ?>; font-size: 12px;text-align:left;"><span><?php echo $options['website']; ?></span></a>
        </td>
    </tr>
    <tr style="vertical-align: middle;line-height:17px;">
        <td style="vertical-align:middle;"><span color="<?php echo $options['icon_color'] ?>"
            ><img
                        src="<?php echo $this->plugin_url;?>assets/img/address-icon.webp"
                        color="<?php echo $options['icon_color']; ?>" style="background-color:<?php echo $options['icon_color'] ?>;float:right; margin-right:10px;"
                        width="12px"></span>
        </td>
        <td style="padding: 0px;text-align:left;"><span color="<?php echo $options['text_color']; ?>"
                                                        style="font-size: 12px; color:<?php echo $options['text_color']; ?>;"><span><?php echo $options['adress']; ?></span></span>
        </td>
    </tr>
    <tr style="vertical-align: middle;line-height:25px;">
        <td style="vertical-align: middle;line-height: 25px;text-align:left;"></td>
        <td style="vertical-align: middle;line-height: 25px;text-align:left;padding-top: 6px;">
            <?php if(!empty($linkedin_url)): ?>
                <a href="<?php echo $linkedin_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/linkedin-icon-2x.webp" style="background-color:<?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif;
            if(!empty($facebook_url)): ?>
                <a href="<?php echo $facebook_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/facebook-icon.png" style="background-color: <?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif;
            if(!empty($instagram_url)): ?>
                <a href="<?php echo $instagram_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/instagram-icon.png" style="background-color: <?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif;
            if(!empty($youtube_url)): ?>
                <a href="<?php echo $youtube_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/youtube-icon.png" style="background-color: <?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif;
            if(!empty($twitter_url)): ?>
                <a href="<?php echo $twitter_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/twitter-icon.png" style="background-color: <?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif;
            if(!empty($tiktok_url)): ?>
                <a href="<?php echo $tiktok_url; ?>" target="_blank"><img src="<?php echo $this->plugin_url;?>assets/img/social-icons/tiktok-icon.png" style="background-color:<?php echo $options['icon_color']; ?>; width:24px;"/></a>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:left; padding-top: 10px;">
            <img src="<?php echo $options['banner']; ?>" alt="banner"/>
            <p style="font-family: Arial; font-size:13px;line-height:15px"><?php echo $options['additional_content']; ?></p>
        </td>
    </tr>
    </tbody>
</table>
