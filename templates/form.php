<div id="esg-main">

    <?php $esg_admin_settings = get_option( ESG_PLUGIN_SETTINGS ); ?>

	<form action="" method="POST" name="signatureForm" enctype="multipart/form-data" id="signature-form" class="signature-form">
        <label for="firstname"><?= __('Prénom'); ?></label>
		<input  type="text" id="firstname" name="firstname" <?php echo $esg_admin_settings['user_firstname_required'] == '1' ? 'required' : ''; ?> />

        <label for="surname"><?= __('Nom'); ?></label>
		<input  type="text" id="surname" name="surname" <?php echo $esg_admin_settings['user_surname_required'] == '1' ? 'required' : ''; ?> />

        <label for="title"><?= __('Fonction'); ?></label>
		<input  type="text" id="title" name="title" <?php echo $esg_admin_settings['user_title_required'] == '1' ? 'required' : ''; ?> />

        <label for="email"><?= __('Email'); ?></label>
		<input type="email" id="email" name="email" <?php echo $esg_admin_settings['user_email_required'] == '1' ? 'required' : ''; ?> />

        <label for="mobile"><?= __('Mobile'); ?></label>
		<input  type="text" id="mobile" name="mobile" <?php echo $esg_admin_settings['user_mobile_required'] == '1' ? 'required' : ''; ?> />

        <label for="linkedin"><?= __('Url Linkedin perso'); ?></label>
        <input  type="text" id="linkedin" name="linkedin" />

        <?php wp_nonce_field('esg-form', 'nonce-esg-form'); ?>

		<input type="submit" name="submit" id="submit" value="<?= __('Générer ma signature'); ?>" class="esg_button qbutton" />
	</form>
</div>

<script type="text/javascript">
    var floatlabels = new FloatLabels( '.signature-form', {
        customEvent      : null,
        customLabel      : null,
        customPlaceholder: null,
        exclude          : '.no-label',
        inputRegex       : /email|number|password|search|tel|text|url/,
        prefix           : 'fl-',
        prioritize       : 'label',
        requiredClass    : 'required',
        style            : 2,
        transform        : 'input, select, textarea',
    });
</script>
