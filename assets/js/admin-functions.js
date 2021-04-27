jQuery(document).ready(function ($) {

    //use wordpress media uploader to set logo
    var mediaUploader;
    $('#upload_logo_button').click(function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            }, multiple: false
        });
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#logo_input_url').val(attachment.url);
            $('#upload_logo_button').val('Change logo');
            $('#logo_image').attr('src', attachment.url).removeAttr('hidden');
            $('#remove_logo_button').css("display", "inline-block");
        });
        mediaUploader.open();
    });
    $('#remove_logo_button').click(function (e) {
        $('#logo_image').attr("hidden", true);
        $('#logo_input_url').val('');
        $('#remove_logo_button').css("display", "none");
        $('#upload_logo_button').val('Choose logo');
    });

    //same for banner
    $('#upload_banner_button').click(function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            }, multiple: false
        });
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#banner_input_url').val(attachment.url);
            $('#upload_banner_button').val('Change banner');
            $('#banner_image').attr('src', attachment.url).removeAttr('hidden');
            $('#remove_banner_button').css("display", "inline-block");
        });
        mediaUploader.open();
    });
    $('#remove_banner_button').click(function (e) {
        $('#banner_image').attr("hidden", true);
        $('#banner_input_url').val('');
        $('#remove_banner_button').css("display", "none");
        $('#upload_banner_button').val('Choose banner');
    });

    //required for color picker
    $('.color-picker').wpColorPicker();


    $('#esg-settings')
    {
        var subClasses = $('[class^=subsetting]').map(function () {
            return $(this).attr('class');
        });

        var parClasses = $('[class^=parent-]').map(function () {
            return ($(this).attr('class'));
        });

        // Filter only unique ones
        var uniqueSubClasses = $.unique(subClasses);
        var uniqueParClasses = $.unique(parClasses);

        // Now group them
        $(uniqueSubClasses).each(function (i, v) {
          $('.' + v).wrapAll('<div class ="group-subsetting group-' + v + '"></div>');
        });


        $(uniqueParClasses).each(function (i, p) {
            let pc = p.replace('parent-', '');

            $('.' + p + ' td').append('<button class="button-' + pc + ' button button-primary ml-5"><span class="dashicons dashicons-plus"></span> style</button>').click(function (e) {
                e.preventDefault();
                $('.group-subsetting-' + pc).toggle();
                console.log($(this));
                $(this).find('.dashicons').toggleClass(['dashicons-minus', 'dashicons-plus']);
            });
        });
    }
});
