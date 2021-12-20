<table style="font-size: 10pt;text-align:left; padding:0;border-collapse: collapse;text-decoration:none !important;vertical-align:middle !important;"
       cellpadding="0" cellspacing="0"
       border="0">
    <tr>
        <td width="1%" style="vertical-align:top;">
            <!-- Logo -->
            <?= $logo ?>
        </td>
        <td style="vertical-align:top;padding-left:15px;" >
            <table style="text-align:left;padding:0;border-collapse: collapse;text-decoration:none !important;vertical-align:middle !important;"
                   cellpadding="0" cellspacing="0"
                   border="0">
                <tr>
                    <td>
                        <!-- Prénom Nom -->
                        <?= $user_firstname ?>&nbsp;<?= $user_surname ?> <?= $user_linkedin ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Fonction -->
                        <?= $user_title ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Email -->
                        <?= $user_email ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Téléphone portable -->
                        <?= $user_mobile ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- Adresse -->
                        <?= $company_address ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="100%" style="padding-top:<?= $option['social_section_margin']; ?>px !important; padding-bottom:<?= $option['social_section_margin']; ?>px !important;">
        <!-- Text before social -->
        <?= $before_social_text ?>

        <!-- Icones sociaux -->
        <?= $facebook_icon ?>
        <?= $instagram_icon ?>
        <?= $youtube_icon ?>
        <?= $linkedin_icon ?>
        <?= $twitter_icon ?>
        </td>
    </tr>
    <tr>
        <td colspan="100%">
        <!-- Bannière -->
        <?= $banner ?>
        </td>
    </tr>
    <tr>
        <td colspan="100%">
            <?= $company_name ?> - <!-- Website -->
            <!-- Téléphone fixe -->
            <?= $company_phone ?> - <!-- Nom de l'entreprise -->
            <?= $company_website ?>
        </td>
    </tr>
    <tr>
        <td colspan="100%">
            <!-- Contenu additionnel -->
            <?= $additional_content ?>
        </td>
    </tr>
</table>
