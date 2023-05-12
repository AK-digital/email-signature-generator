<section>
    <div class="js-tabs" id="tabs">
        <ul class="js-tabs__header">
            <li class="js-tabs__title">
                <?php echo __( 'Prévisualisation' ); ?>
            </li>
            <li class="js-tabs__title">
                <?php echo __( 'HTML' ); ?>
            </li>
            <li class="js-tabs__title float-right"><?php echo __( 'Outlook client' ); ?></a></li>
            <li class="js-tabs__title float-right"><?php echo __( 'Outlook.com' ); ?></a></li>
            <li class="js-tabs__title float-right"><?php echo __( 'Gmail' ); ?></li>
            <li class="js-tabs__title float-right"><?php echo __( 'Yahoo' ); ?></li>
            <li class="js-tabs__title float-right"><?php echo __( 'Apple mail' ); ?></li>
            <li class="js-tabs__title float-right"><?php echo __( 'Thunderbird' ); ?></li>
        </ul>

        <div id="preview-tab" class="js-tabs__content">
            <div id="sign-preview"><?php echo $signature; ?></div>
            <div class="esg_action-bar">
                <button class="esg_button esg_button-copy-sign qbutton">
                    <img src="<?php echo ESG_PLUGIN_URL; ?>assets/img/copy-icon.png"/><span
                            class="esg-copy-string"><?php echo __( 'Copier' ); ?></span>
                </button>
                <button class="esg_button downloadLink qbutton">
                    <img src="<?php echo ESG_PLUGIN_URL; ?>assets/img/download-icon.png"/><?php echo __( 'Télécharger' ); ?>
                </button>
                <?php if ( isset( $_POST['submit'] ) ) : ?>
                    <button class="esg_button qbutton" onclick="window.location.href=window.location.href">
                        <img src="<?php echo ESG_PLUGIN_URL; ?>assets/img/edit-icon.png"/><?php echo __( 'Modifier' ); ?>
                    </button>
                <?php endif; ?>
            </div>
        </div>

        <div id="html-tab" class="js-tabs__content">
            <textarea id="sign-raw-html" style="width:100%" rows="13">
            <?php echo $signature; ?>
        </textarea>
            <div class="esg_action-bar">
                <button class="esg_button esg_button-copy-sign qbutton default"
                        ><img
                            src="<?php echo ESG_PLUGIN_URL; ?>assets/img/copy-icon.png"/><span
                            class="esg-copy-string"><?php echo __( 'Copier' ); ?></span>
                </button>
                <button class="esg_button downloadLink qbutton default"><img
                            src="<?php echo ESG_PLUGIN_URL; ?>assets/img/download-icon.png"/><?php echo __( 'Télécharger' ); ?>
                </button>
                <?php if ( isset( $_POST['submit'] ) ) : ?>
                    <button class="esg_button qbutton" onclick="window.location.href=window.location.href">
                        <img src="<?php echo ESG_PLUGIN_URL; ?>assets/img/edit-icon.png"/><?php echo __( 'Modifier' ); ?>
                    </button>

                <?php endif; ?>
            </div>
        </div>
        <div id="tab-1" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Outlook client' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy-sign qbutton"><?php echo __( 'Copier ma signature' ); ?>
                    </button>
                </li>
                <li> <?php echo __( 'Dans Outlook, cliquez sur Outils et Options, puis accédez à l\'onglet "Format du courrier"' ); ?></li>
                <li> <?php echo __( 'Dans la section Signatures, cliquez sur le bouton "Signatures"' ); ?></li>
                <li><?php echo __( 'Cliquez sur "Nouveau"' ); ?></li>
                <li> 
                <?php
                echo __(
                    'Saisissez un nom et assurez-vous que le bouton radio «Commencer avec une signature vierge» est
                    sélectionné, puis cliquez sur "Suivant"'
                ); ?>
                </li>
                <li> 
                <?php
                echo __(
                    'Dans la fenêtre "Modifier la signature", cliquez sur "Modification avancée", ce qui ouvrira
                    l\'éditeur'
                ); ?>
                </li>
                <li> <?php echo __( 'Collez votre contenu et enregistrez-le' ); ?></li>
                <li> 
                <?php
                echo __(
                    'Lorsque vous revenez à l\'onglet Format du courrier, assurez-vous de sélectionner votre nouveau
                    fichier dans la section «Signature pour Nouveau" dans la liste déroulante des messages et cliquez sur "Appliquer."'
                ); ?>
                </li>
            </ol>
        </div>

        <div id="tab-2" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Outlook.com' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy-sign qbutton"
                            ><?php echo __( 'Copier ma signature' ); ?>
                    </button>
                </li>
                <li> <?php echo __( 'Connectez-vous à outlook.com ou live.com et cliquez sur l\'icône d\'engrenage Paramètres.' ); ?></li>
                <li>  
                <?php
                echo __(
                    'Sélectionnez "Plus de paramètres de messagerie", puis "Police et signature du message" sous Ecrire
                    un e-mail'
                ); ?>
                </li>
                <li>  <?php echo __( 'Sélectionnez l\'option "Modifier en HTML" et collez votre contenu' ); ?></li>
                <li>  <?php echo __( 'Cliquez sur "Enregistrer"' ); ?></li>
            </ol>
        </div>

        <div id="tab-3" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Gmail' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy-sign qbutton"
                            ><?php echo __( 'Copier ma signature' ); ?>
                    </button>
                </li>
                <li>  <?php echo __( 'Connectez vous à Gmail et cliquez sur l\'icône d\'engrenage en haut à droite pour atteindre les Paramètres' ); ?></li>
                <li> <?php echo __( 'Sous l\'onglet "Général", faites défiler vers le bas jusqu\'à ce que vous trouviez la section Signature' ); ?></li>
                <li> <?php echo __( 'Cliquez dans la zone Signature et collez le contenu copié' ); ?></li>
                <li> <?php echo __( 'Dessous, cochez la case "Insérer cette signature avant le texte des messages précédents…"' ); ?></li>
                <li> <?php echo __( 'Cliquez sur "Enregistrer"' ); ?></li>
            </ol>
        </div>

        <div id="tab-4" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Yahoo' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy-sign qbutton"
                            ><?php echo __( 'Copier ma signature' ); ?>
                    </button>
                </li>
                <li> <?php echo __( 'Une fois connecté à Yahoo Mail, sélectionnez "Options de messagerie"' ); ?> </li>
                <li> 
                <?php
                echo __(
                    'Accédez à la catégorie Signature et cliquez sur "Couleurs et graphiques" si vous ne voyez pas de code HTML
                    mise en page barre d\'outils'
                ); ?>
                </li>
                <li> <?php echo __( 'Cliquez dans la zone Signature et collez votre contenu' ); ?> </li>
                <li> <?php echo __( 'Enregistrer les modifications' ); ?> </li>
            </ol>
        </div>
        <div id="tab-5" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Apple mail' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy-sign qbutton"
                            ><?php echo __( 'Copier ma signature' ); ?>
                    </button>
                </li>
                <li> <?php echo __( 'Accédez à "Mail et Préférences" et cliquez sur l\'onglet "Signatures"' ); ?> </li>
                <li> <?php echo __( 'Cliquez sur le bouton "Ajouter une signature" et une zone de texte s\'ouvrira' ); ?></li>
                <li> <?php echo __( 'Collez votre contenu dans ce champ de texte et cliquez sur Enregistrer' ); ?> </li>
            </ol>
        </div>
        <div id="tab-6" class="js-tabs__content">
            <h4><?php echo __( 'Intégration Thunderbird' ); ?></h4>
            <ol>
                <li>
                    <button class="esg_button downloadLink qbutton"><?php echo __( 'Télécharger ma signature' ); ?></button>
                </li>
                <li> <?php echo __( 'Dans le menu principal de Thunderbird, accédez à Outils & gt; Paramètres du compte' ); ?> </li>
                <li> <?php echo __( 'Sélectionnez le compte auquel vous souhaitez appliquer cette signature' ); ?> </li>
                <li> <?php echo __( 'Cochez la case "Joindre une signature à partir d\'un fichier à la place"' ); ?> </li>
                <li> <?php echo __( 'Parcourez et sélectionnez votre fichier signature.html, puis cliquez sur "OK"' ); ?> </li>
            </ol>
        </div>
    </div>
    </div>
</section>
