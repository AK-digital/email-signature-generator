<section>
    <ul class="nav egs_nav-tabs" style="float:left">
        <li class="fadeIn active"><a href="#preview-tab"><img src="<?= $this->plugin_url; ?>assets/img/eye-icon.png" alt="eye icon" class="esg_icon" width="16px" />Preview</a></li>
        <li class="fadeIn"><a href="#html-tab"><img src="<?= $this->plugin_url; ?>assets/img/code-icon.png" alt="html icon" class="esg_icon" width="18px" />HTML</a></li>
    </ul>

    <ul class="nav egs_nav-tabs" style="float:right">
        <li class="fadeIn"><a href="#tab-1">Outlook client</a></li>
        <li class="fadeIn"><a href="#tab-2">Outlook.com</a></li>
        <li class="fadeIn"><a href="#tab-3">Gmail</a></li>
        <li class="fadeIn"><a href="#tab-4">Yahoo</a></li>
        <li class="fadeIn"><a href="#tab-5">Apple mail</a></li>
        <li class="fadeIn"><a href="#tab-6">Thunderbird</a></li>
    </ul>

    <div class="egs_tab-content">
        <div id="preview-tab" class="egs_tab-pane fadeIn active">
            <div id="sign-preview"><?= $signature; ?></div>
            <div class="esg_action-bar">
                <button class="esg_button esg_button-copy qbutton"
                        onclick="copyToClip(document.getElementById('sign-preview').innerHTML)"><img
                            src="<?= $this->plugin_url; ?>assets/img/copy-icon.png"/>Copy signature
                </button>
                <button class="esg_button downloadLink qbutton">
                    <img src="<?= $this->plugin_url; ?>assets/img/download-icon.png"/>Download signature
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
                            src="<?= $this->plugin_url; ?>assets/img/copy-icon.png"/>Copy signature
                </button>
                <button class="esg_button downloadLink qbutton default"><img
                            src="<?= $this->plugin_url; ?>assets/img/download-icon.png"/>Download signature
                </button>
            </div>
        </div>
        <div id="tab-1" class="egs_tab-pane fadeIn">
            <h4>Outlook client</h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)">Copy signature
                    </button>
                </li>
                <li>In Outlook, click Tools &gt; Options and then go to the 'Mail Format' tab</li>
                <li>Under the Signatures section, click the 'Signatures' button</li>
                <li>Click 'New'</li>
                <li>Enter a name and be sure 'Start with a blank signature' radio button is selected then click
                    'Next'
                </li>
                <li>In Edit Signature window, click 'Advance Edit' which will open up the defaolt editor</li>
                <li>Paste your content and save</li>
                <li>When returning back to Mail Format tab, be sure to select your new file in the 'Signature for
                    new
                    messages'&nbsp;drop-down and hit 'Apply'
                </li>
            </ol>
        </div>

        <div id="tab-2" class="egs_tab-pane fadeIn">
            <h4>Outlook.com</h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)">Copy signature
                    </button>
                </li>
                <li>Log-in to outlook.com or live.com and click the Settings gear icon</li>
                <li>Select 'More mail settings' and then 'Message font and signature' under Writing email</li>
                <li>Select 'Edit in HTML' option and paste your content</li>
                <li>Click 'Save'</li>
            </ol>
        </div>

        <div id="tab-3" class="egs_tab-pane fadeIn">
            <h4>Gmail</h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)">Copy signature
                    </button>
                </li>
                <li>Once logged-in to Gmail, click on the Settings gear icon</li>
                <li>Under 'General' tab, scroll down until you find the Signature section</li>
                <li>Click inside the Signature box and paste your content</li>
                <li>Check the box that reads 'Insert this signature before…'</li>
                <li>Save changes</li>
            </ol>
        </div>

        <div id="tab-4" class="egs_tab-pane fadeIn">
            <h4>Yahoo</h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)">Copy signature
                    </button>
                </li>
                <li>Once logged-in to Yahoo mail, select Options &gt; Mail Options</li>
                <li>Go to the Signature category and click 'Color and Graphics' if you don’t see an HTML formatting
                    toolbar
                </li>
                <li>Click inside the Signature box and paste your content</li>
                <li>Save changes</li>
            </ol>
        </div>
        <div id="tab-5" class="egs_tab-pane fadeIn">
            <h4>Apple mail</h4>
            <ol>
                <li>
                    <button class="esg_button esg_button-copy qbutton"
                            onclick="copyToClip(document.getElementById('sign-preview').innerHTML)">Copy signature
                    </button>
                </li>
                <li>Go to Mail &gt; Preferences and click the 'Signatures' tab</li>
                <li>Click the 'Add Signature' button and a text area will slide open</li>
                <li>Paste your content into that text field and click Save</li>
            </ol>
        </div>
        <div id="tab-6" class="egs_tab-pane fadeIn">
            <h4>Thunderbird</h4>
            <ol>
                <li>
                    <button class="esg_button downloadLink qbutton">Download your signature</button>
                </li>
                <li>From the main Thunderbird menu, go to Tools &gt; Account Settings</li>
                <li>Select the account you wish to apply this signature to</li>
                <li>Tick the box "Attach a signature from a file instead"</li>
                <li>Browse and select your signature.html file and click 'OK'</li>
            </ol>
        </div>
    </div>
</section>
<header id="esg-landing_header">
    <?php if (isset($_POST['submit'])): ?>
        <form action="<?php unset($_POST['submit']) ?>">
            <input type="submit" class="qbutton default" name="submit" value="<?= __('Modifier ma signature') ?>"/>
        </form>
    <?php endif; ?>
</header>
