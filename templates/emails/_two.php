<table style="font-size: 10pt;text-align:left; padding:0;border-collapse: collapse;text-decoration:none !important;vertical-align:middle !important;"
       cellpadding="0" cellspacing="0"
       border="0">

    <?php if ($logo || $user_firstname || $user_surname || $user_linkedin || $user_title || $user_email || $user_mobile || $company_address) : ?>
        <tr>
            <?php if ($logo) : ?>
                <td width="1%" style="vertical-align:top;padding-right:15px;">
                    <!-- Logo -->
                    <?= $logo ?>
                </td>
            <?php endif; ?>

            <?php if ($user_firstname || $user_surname || $user_linkedin || $user_title || $user_email || $user_mobile || $company_address) : ?>
                <td style="vertical-align:top;">

                    <table style="text-align:left;padding:0;border-collapse: collapse;text-decoration:none !important;vertical-align:middle !important;"
                           cellpadding="0" cellspacing="0"
                           border="0">

                        <?php if ($user_firstname || $user_surname || $user_linkedin) : ?>
                            <tr>
                                <td>
                                    <!-- Prénom Nom -->
                                    <?= $user_firstname ?>&nbsp;<?= $user_surname ?> <?= $user_linkedin ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($user_title) : ?>
                            <tr>
                                <td>
                                    <!-- Fonction -->
                                    <?= $user_title ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($user_email) : ?>
                            <tr>
                                <td>
                                    <!-- Email -->
                                    <?= $user_email ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($user_mobile) : ?>
                            <tr>
                                <td>
                                    <!-- Téléphone portable -->
                                    <?= $user_mobile ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php if ($company_address) : ?>
                            <tr>
                                <td>
                                    <!-- Adresse -->
                                    <?= $company_address ?>
                                </td>
                            </tr>
                        <?php endif; ?>

                    </table>
                </td>
            <?php endif; ?>
        </tr>
    <?php endif; ?>

    <?php if ($before_social_text || $facebook_icon || $instagram_icon || $youtube_icon || $linkedin_icon || $twitter_icon) : ?>
        <tr>
            <td colspan="100%"
                style="padding-top:<?= $option['social_section_margin']; ?>px !important; padding-bottom:<?= $option['social_section_margin']; ?>px !important;">
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

    <?php endif; ?>

    <?php if ($banner) : ?>
    <tr>
        <td colspan="100%">
            <!-- Bannière -->
            <?= $banner ?>
        </td>
    </tr>
    <?php endif; ?>

    <?php if ($company_name || $company_phone || $company_website) : ?>
    <tr>
        <td colspan="100%">
            <!-- Nom de l'entreprise -->
            <?= $company_name ?>
            <!-- Téléphone fixe -->
            <?= ( $company_name && $company_phone) ? ' - ' : ''; ?>
            <?= $company_phone ?>
            <!-- Website -->
            <?= ($company_phone && $company_website) ? ' - ' : ''; ?>
            <?= $company_website ?>
        </td>
    </tr>
    <?php endif; ?>

    <?php if ($additional_content) : ?>
    <tr>
        <td colspan="100%">
            <!-- Contenu additionnel -->
            <?= $additional_content ?>
        </td>
    </tr>
    <?php endif; ?>
</table>
