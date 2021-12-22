<table style="font-size: 10pt;text-align:left; padding:0;border-collapse: collapse;text-decoration:none !important;vertical-align:middle !important;"
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
            <!-- Fonction --> <!-- Nom de l'entreprise -->
            <?= $user_title ?> <?= $company_name ? ' - ' : ''; ?> <?= $company_name ?>
        </td>
    </tr>
    <tr>
        <td>
            <!-- Téléphone portable -->  <!-- Téléphone fixe -->
            <?= $user_mobile ?><?= $company_phone ? ' - ' : ''; ?><?= $company_phone ?>
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
            <!-- Website -->
            <?= $company_website ?>
        </td>
    </tr>
    <tr>
        <td>
            <!-- Adresse -->
            <?= $company_address ?>
        </td>
    </tr>
    <tr>
        <td width="1%" style="padding-top:10px;">
            <!-- Logo -->
            <?= $logo ?>
        </td>
    </tr>
    <tr>
        <td style="padding-top:<?= $option['social_section_margin']; ?>px !important; padding-bottom:<?= $option['social_section_margin']; ?>px !important;">
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
        <td width="1%">
            <!-- Bannière -->
            <?= $banner ?>
        </td>
    </tr>
    <tr>
        <td>
            <!-- Contenu additionnel -->
            <?= $additional_content ?>
        </td>
    </tr>
</table>
