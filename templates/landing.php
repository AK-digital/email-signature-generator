<section>
    <ul class="nav egs_nav-tabs" style="float:left">
        <li class="fadeIn active"><a href="#preview-tab"><img src="<?= $this->plugin_url; ?>assets/img/eye-icon.png"
                                                              alt="eye icon" class="esg_icon"
                                                              width="18px"/><?= __('Prévisualisation'); ?></a>
        </li>
        <li class="fadeIn"><a href="#html-tab"><img src="<?= $this->plugin_url; ?>assets/img/code-icon.png"
                                                    alt="html icon" class="esg_icon" width="18px"/><?= __('HTML'); ?>
            </a></li>
    </ul>

    <ul class="nav egs_nav-tabs" style="float:right">
        <li class="fadeIn"><a href="#tab-1"><?= __('Outlook client'); ?></a></li>
        <li class="fadeIn"><a href="#tab-2"><?= __('Outlook.com'); ?></a></li>
        <li class="fadeIn"><a href="#tab-3"><?= __('Gmail'); ?></a></li>
        <li class="fadeIn"><a href="#tab-4"><?= __('Yahoo'); ?></a></li>
        <li class="fadeIn"><a href="#tab-5"><?= __('Apple mail'); ?></a></li>
        <li class="fadeIn"><a href="#tab-6"><?= __('Thunderbird'); ?></a></li>
    </ul>

    <div class="egs_tab-content">
        <div id="preview-tab" class="egs_tab-pane fadeIn active">
            <div id="sign-preview"><?= $signature; ?></div>
            <div class="esg_action-bar">
                <button class="esg_button esg_button-copy qbutton"
                        onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><img
                            src="<?= $this->plugin_url; ?>assets/img/copy-icon.png"/><?= __('Copier ma signature'); ?>
                </button>
                <button class="esg_button downloadLink qbutton">
                    <img src="<?= $this->plugin_url; ?>assets/img/download-icon.png"/><?= __('Télécharger ma signature'); ?>
                </button>
            </div>
        </div>

        <div id="html-tab" class="egs_tab-pane fadeIn">
                       <textarea id="sign-raw-html" style="width:100%" rows="13">
<?php echo $signature; ?>
        </textarea>
            <div class="esg_action-bar">
                <button class="esg_button esg_button-copy qbutton default"
                        onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><img
                            src="<?= $this->plugin_url; ?>assets/img/copy-icon.png"/><?= __('Copier ma signature'); ?>
                </button>
                <button class="esg_button downloadLink qbutton default"><img
                            src="<?= $this->plugin_url; ?>assets/img/download-icon.png"/><?= __('Télécharger ma signature'); ?>
                </button>
            </div>
        </div>
        <div id="tab-1" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Outlook client'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><?= __('Copier ma signature'); ?>
                    </button>
                </li>
                <li> <?= __('Dans Outlook, cliquez sur Outils et Options, puis accédez à l\'onglet "Format du courrier"'); ?></li>
                <li> <?= __('Dans la section Signatures, cliquez sur le bouton "Signatures"'); ?></li>
                <li><?= __('Cliquez sur "Nouveau"'); ?></li>
                <li> <?= __('Saisissez un nom et assurez-vous que le bouton radio «Commencer avec une signature vierge» est
                    sélectionné, puis cliquez sur "Suivant"'); ?>
                </li>
                <li> <?= __('Dans la fenêtre "Modifier la signature", cliquez sur "Modification avancée", ce qui ouvrira
                    l\'éditeur'); ?>
                </li>
                <li> <?= __('Collez votre contenu et enregistrez-le'); ?></li>
                <li> <?= __('Lorsque vous revenez à l\'onglet Format du courrier, assurez-vous de sélectionner votre nouveau
                    fichier dans la section «Signature pour Nouveau" dans la liste déroulante des messages et cliquez sur "Appliquer."'); ?>
                </li>
            </ol>
        </div>

        <div id="tab-2" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Outlook.com'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><?= __('Copier ma signature'); ?>
                    </button>
                </li>
                <li> <?= __('Connectez-vous à outlook.com ou live.com et cliquez sur l\'icône d\'engrenage Paramètres.'); ?></li>
                <li>  <?= __('Sélectionnez "Plus de paramètres de messagerie", puis "Police et signature du message" sous Ecrire
                    un e-mail'); ?>
                </li>
                <li>  <?= __('Sélectionnez l\'option "Modifier en HTML" et collez votre contenu'); ?></li>
                <li>  <?= __('Cliquez sur "Enregistrer"'); ?></li>
            </ol>
        </div>

        <div id="tab-3" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Gmail'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><?= __('Copier ma signature'); ?>
                    </button>
                </li>
                <li>  <?= __('Connectez-vous à outlook.com ou live.com et cliquez sur l\'icône d\'engrenage Paramètres'); ?></li>
                <li> <?= __('Sélectionnez "Plus de paramètres de messagerie", puis "Police et signature du message" sous Ecrire
                    un e-mail'); ?>
                </li>
                <li> <?= __('Sélectionnez l\'option "Modifier en HTML" et collez votre contenu'); ?></li>
                <li> <?= __('Cliquez sur "Enregistrer"'); ?></li>
            </ol>
        </div>

        <div id="tab-4" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Yahoo'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><?= __('Copier ma signature'); ?>
                    </button>
                </li>
                <li> <?= __('Une fois connecté à Yahoo Mail, sélectionnez "Options de messagerie"'); ?> </li>
                <li> <?= __('Accédez à la catégorie Signature et cliquez sur "Couleurs et graphiques" si vous ne voyez pas de code HTML
                    mise en page barre d\'outils'); ?>
                </li>
                <li> <?= __('Cliquez dans la zone Signature et collez votre contenu'); ?> </li>
                <li> <?= __('Enregistrer les modifications'); ?> </li>
            </ol>
        </div>
        <div id="tab-5" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Apple mail'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><?= __('Copier ma signature'); ?>
                    </button>
                </li>
                <li> <?= __('Accédez à "Mail et Préférences" et cliquez sur l\'onglet "Signatures"'); ?> </li>
                <li> <?= __('Cliquez sur le bouton "Ajouter une signature" et une zone de texte s\'ouvrira') ?></li>
                <li> <?= __('Collez votre contenu dans ce champ de texte et cliquez sur Enregistrer') ?> </li>
            </ol>
        </div>
        <div id="tab-6" class="egs_tab-pane fadeIn">
            <h4><?= __('Intégration Thunderbird'); ?></h4>
            <ol>
                <li>
                    <button class="esg_button downloadLink qbutton"><?= __('Télécharger ma signature') ?></button>
                </li>
                <li> <?= __('Dans le menu principal de Thunderbird, accédez à Outils & gt; Paramètres du compte') ?> </li>
                <li> <?= __('Sélectionnez le compte auquel vous souhaitez appliquer cette signature') ?> </li>
                <li> <?= __('Cochez la case "Joindre une signature à partir d\'un fichier à la place"') ?> </li>
                <li> <?= __('Parcourez et sélectionnez votre fichier signature.html, puis cliquez sur "OK"') ?> </li>
            </ol>
        </div>
    </div>
</section>
<section>
    <div id="esg-landing_footer">
        <?php if (isset($_POST['submit'])): ?>
            <form action="<?php unset($_POST['submit']) ?>">
                <input type="submit" class="qbutton default" name="submit" value="<?= __('Modifier ma signature') ?>"/>
            </form>
        <?php endif; ?>
    </div>
</section>
