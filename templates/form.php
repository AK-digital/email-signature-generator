<div id="esg-main">
	<!-- lp:insertions start body:before -->
	<!-- lp:insertions end body:before -->

<h1 style="text-align: center;">Signature generator by Marconinio</h1>
	<p style="text-align: center;">A simple	tool made to automate email signature generation.</p>
	<form action="" method="POST" name="signatureForm" enctype="multipart/form-data" id="signature-form" class="signature-form">

        <label for="firstname"><?= __('Prénom'); ?></label>
		<input  type="text" id="firstname" name="firstname" required />

        <label for="surname"><?= __('Nom'); ?></label>
		<input  type="text" id="surname" name="surname" required />

        <label for="title"><?= __('Fonction'); ?></label>
		<input  type="text" id="title" name="title" required />

        <label for="email"><?= __('Email'); ?></label>
		<input type="email" id="email" name="email" />

        <label for="mobile"><?= __('Mobile'); ?></label>
		<input  type="text" id="mobile" name="mobile" />

        <label for="linkedin"><?= __('Url Linkedin perso'); ?></label>
		<input  type="text" id="linkedin" name="linkedin" />

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
