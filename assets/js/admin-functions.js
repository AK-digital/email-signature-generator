jQuery(document).ready(function ($) {

    //use wordpress media uploader to set image url as input value
    var mediaUploader;

    //using this class will alway trigger wordpress uploader
    $('.esg-button-upload').click(function (e) {
        var parentNode = $(this).parent();

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
            //We get the media url in attachement var through JSON response
            var attachment = mediaUploader.state().get('selection').first().toJSON();

            // Call the actions on elems
            $(this).val('Change logo');
            parentNode.children('.upload-input-url').val(attachment.url);
            parentNode.children('.upload-image').attr('src', attachment.url).css('display', '');
            parentNode.children('.esg-button-remove').css('display', '');

            $('.' + parentNode.children('.upload-input-url').attr('id')).attr('src', attachment.url);

            mediaUploader = undefined; //destroy store data in the var
        });
        mediaUploader.open(); //close the uploader
    });

    $('.esg-button-remove').click(function () {
        var parentNode = $(this).parent();
        $(this).attr("hidden", true).css("display", "none");
        parentNode.children('.upload-image').attr('src', '').css('display', 'none');
        parentNode.children('.upload-input-url').val('');
        parentNode.children('.esg-button-upload').val('Choose logo');
        $('.' + parentNode.children('.upload-input-url').attr('id')).attr('src', '');
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
            $('.' + v).wrapAll('<tr class="group-subsetting-row"><td colspan="100%" class="group-subsetting group-' + v + '"></td></tr>');
        });


        $(uniqueParClasses).each(function (i, p) {
            let pc = p.replace('parent-', '');

            $('.' + p + ' td').append('<button class="button-' + pc + ' button button-primary subsetting-button"><span class="dashicons dashicons-plus"></span> style</button>').click(function (e) {
                e.preventDefault();
                if ($('.group-subsetting-' + pc).hasClass("open")) {
                    $('.group-subsetting-' + pc).removeClass('open');
                }
                else {
                    $('.group-subsetting').removeClass('open');
                    $('.dashicons').removeClass('dashicons-minus').addClass('dashicons-plus');
                    $('.group-subsetting-' + pc).addClass('open');
                }
                $(this).find('.dashicons').toggleClass('dashicons-minus dashicons-plus');
            });
        });
    }

    $('input[type=text], input[type=password], input[type=number], textarea').each(function () {
        $(this).on('input', function () {
            $('.' + $(this).attr('id')).text($(this).val());
        });
    });
});

