<div id="esg-main">
	<!-- lp:insertions start body:before -->
	<!-- lp:insertions end body:before -->
	<!--			<h1 style="text-align: center;">Generate your e-mail signature</h1>-->
<!--	<h1 style="text-align: center;">Signature generator by Studio Krack</h1>
	<p style="text-align: center;">A simple	tool made to automate email signature generation.</p>-->
	<form action="" method="POST" name="signatureForm" enctype="multipart/form-data" id="signature-form">
		<input type="text" id="firstname" name="firstname" placeholder="<?= __('Prénom') ?>"
		class="wpcf7-form-control wpcf7-text" required>
		<input type="text" id="surname" name="surname" placeholder="<?= __('Nom') ?>" class="wpcf7-form-control wpcf7-text" required>
		<input type="text" id="title" name="title" placeholder="<?= __('Fonction') ?>" class="wpcf7-form-control wpcf7-text" required>
		<input type="email" id="email" name="email" placeholder="<?= __('Email') ?>" class="wpcf7-form-control wpcf7-text" required>
		<input type="text" id="mobile" name="mobile" placeholder="<?= __('Mobile') ?>" class="wpcf7-form-control wpcf7-text">
		<input type="text" id="linkedin" name="linkedin" placeholder="<?= __('Linkedin') ?>"
		class="wpcf7-form-control wpcf7-text">
		<input type="submit" name="submit" id="submit" value="<?= __('Générer ma signature'); ?>" class="esg_button qbutton">
	</form>
</div>
