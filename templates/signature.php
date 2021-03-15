<table style="border-spacing: 0;">
    <tr>
        <td style="font-family: 'Open Sans', sans-serif;color:#2a2b2b;font-size: 14px;line-height:22px;text-transform: capitalize;">
            <strong><?php echo $firstname ?> <?php echo $surname ?></strong><br><span
                    style="font-weight: 500;font-size:12px;line-height:14px;"><?php echo $title ?></span></td>
    </tr>
    <tr>
        <td>
            <div style="display:inline-block;padding:0px;margin:3px 0px 0px 0px;font-size:11px;color:#2a2b2b;">
                <p style="font-family: 'Open Sans', sans-serif;margin: 2px 0px 10px 0px;line-height: 13px;font-size:11px;color:#2a2b2b;">
                    <strong style='color:#2a2b2b;'>Phone: </strong><a href='tel:$mobile_code' value='$mobile_code'
                                                                      target='_blank'
                                                                      style="font-family: 'Open Sans', sans-serif;color:#2a2b2b;text-decoration:none;"><?php echo $mobile ?></a><br>
                    <strong style='color:#2a2b2b;'>Website: </strong><a href='https://plasticodyssey.org/'
                                                                        style="font-family: 'Open Sans', sans-serif;color:#2a2b2b;"
                                                                        target='_blank'>plasticodyssey.org</a>
                </p>
        </td>
    </tr>
    <tr>
        <td style="width: 150px;">
            <a href='https://plasticodyssey.org/' style="text-decoration:none" target='_blank'><img
                        style="width: 150px; margin: 6px 0 10px;"
                        src='<?php echo $options['logo']; ?>'></a>
            <a href='https://plasticodyssey.org/' style="text-decoration:none" target='_blank'><img
                        style="width: 150px; margin: 6px 0 10px;"
                        src='<?php echo $options['banner']; ?>'></a>
        </td>
    </tr>
    <tr>
        <td>
            <a href='https://www.instagram.com/plasticodyssey/' target='_new'
               style="margin: 0 3px;text-decoration:none;display: inline-block;"><img src='<?php echo $instagram_icon ?>'
                                                                                      style="border: none;width: 23px;"></a>
            <a href='https://www.facebook.com/plasticodyssey/' style="text-decoration:none;display: inline-block;"
               target='_blank'><img src='<?php echo $facebook_icon ?>'
                                    style="border:none;width: 23px;" class='CToWUd'></a>
            <a href='$linkedin' target='_new' style="text-decoration:none;display: inline-block;"><img
                        src='https://plasticodyssey.org/front-mail-krack/img//new_icon/linkedin-icon.jpg'
                        style="border: none;width: 23px;margin-left: 3px;"></a>
            <a href='$youtube' target='_new' style="text-decoration:none;display: inline-block;"><img
                        src='https://plasticodyssey.org/front-mail-krack/img//new_icon/youtube-icon.jpg'
                        style="border: none;width: 23px;margin-left: 3px;"></a>
            <br>
            </div>
        </td>
    </tr>
    <tr>
        <td style="width: 400px; height: auto;">
            <img style="width: 400px; height: auto; margin-top: 6px;"
                 src='https://plasticodyssey.org/front-mail-krack/$target_file'/>
        </td>
    </tr>
</table>
