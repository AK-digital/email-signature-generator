<div id="esg-main">

    <?php $esg_admin_settings = get_option( 'asg_admin_settings' ); ?>

    <form action="" method="POST" name="signatureForm" enctype="multipart/form-data" id="signature-form" class="signature-form">
        <label for="firstname"><?php echo __( 'Prénom' ); ?></label>
        <input  type="text" id="firstname" name="firstname" <?php echo isset( $esg_admin_settings['user_firstname_required'] ) && $esg_admin_settings['user_firstname_required'] == '1' ? 'required' : ''; ?> />

        <label for="surname"><?php echo __( 'Nom' ); ?></label>
        <input  type="text" id="surname" name="surname" <?php echo isset( $esg_admin_settings['user_surname_required'] ) && $esg_admin_settings['user_surname_required'] == '1' ? 'required' : ''; ?> />

        <label for="title"><?php echo __( 'Fonction' ); ?></label>
        <input  type="text" id="title" name="title" <?php echo isset( $esg_admin_settings['user_title_required'] ) && $esg_admin_settings['user_title_required'] == '1' ? 'required' : ''; ?> />

        <label for="email"><?php echo __( 'Email' ); ?></label>
        <input type="email" id="email" name="email" <?php echo isset( $esg_admin_settings['user_email_required'] ) &&$esg_admin_settings['user_email_required'] == '1' ? 'required' : ''; ?> />

        <label for="mobile"><?php echo __( 'Mobile' ); ?></label>
        <input  type="text" id="mobile" name="mobile" <?php echo isset( $esg_admin_settings['user_mobile_required'] ) && $esg_admin_settings['user_mobile_required'] == '1' ? 'required' : ''; ?> />

        <label for="linkedin"><?php echo __( 'Url Linkedin perso' ); ?></label>
        <input  type="text" id="linkedin" name="linkedin" />

        <?php wp_nonce_field( 'esg-form', 'nonce-esg-form' ); ?>

        <input type="submit" name="submit" id="submit" value="<?php echo __( 'Générer ma signature' ); ?>" class="esg_button qbutton" />
    </form>
</div>