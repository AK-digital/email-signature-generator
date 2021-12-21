function downloadInnerHtml(filename, elId, mimeType) {
    var elHtml = document.getElementById(elId).innerHTML;
    var link = document.createElement('a');
    mimeType = mimeType || 'text/plain';

    console.log(elHtml);

    link.setAttribute('download', filename);
    link.setAttribute('href', 'data:' + mimeType + ';charset=utf-8,' + encodeURIComponent(elHtml));
    link.click();
}

var fileName = 'signature.html'; // You can use the .txt extension if you want

jQuery(document).ready(function ($) {

    $('.esg_button-copy-sign').click(function() {

        $('.esg-copy-string', this).html('Signature copiée !');

        var str = $('#sign-preview').html();

        function listener(e) {
            e.clipboardData.setData("text/html", str);
            e.clipboardData.setData("text/plain", str);
            e.preventDefault();
        }

        document.addEventListener("copy", listener);
        document.execCommand("copy");
        document.removeEventListener("copy", listener);
    });

    $('.downloadLink').click(function () {
        downloadInnerHtml(fileName, 'sign-preview', 'text/html');
    });
});
