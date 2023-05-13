jQuery(document).ready(function ($) {

    $('#esg_reset_default').on('click', function () {
        confirm('Êtes-vous sûr de vouloir restaurer les paramètres par défaut ? (le token Github sera supprimé.');
        ajaxCall(this.id);
    });

    ajaxCall = (action) => {
        // Ajax call to switch between faq category

        $.ajax({
            url: ajax.ajax_url,
            type: "POST",
            data: {
                action: action,
            },
            beforeSend: function () { },
            success: function (response) {
                location.reload();
            },
            error: function (data) {
                console.log(data);
            },
        });
    };
});

