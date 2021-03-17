function copyToClip(str) {
    function listener(e) {
        e.clipboardData.setData("text/html", str);
        e.clipboardData.setData("text/plain", str);
        e.preventDefault();
    }

    document.addEventListener("copy", listener);
    document.execCommand("copy");
    document.removeEventListener("copy", listener);
};

function CopyToClipboard(containerid) {
    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("copy");
        alert("Signature has been copied")
    }
}

function downloadInnerHtml(filename, elId, mimeType) {
    var elHtml = document.getElementById(elId).innerHTML;
    var link = document.createElement('a');
    mimeType = mimeType || 'text/plain';

    console.log(elHtml);

    link.setAttribute('download', filename);
    link.setAttribute('href', 'data:' + mimeType  +  ';charset=utf-8,' + encodeURIComponent(elHtml));
    link.click();
}

var fileName =  'signature.html'; // You can use the .txt extension if you want

jQuery(document).ready(function ($) {
    $('.esg_button-copy').click(function (e) {
        $('.esg_button-copy').html('Copied to clipboard !');

        setTimeout(copyAgain, 1200);

        function copyAgain() {
            $('.esg_button-copy').html('Copy to clipboard again');
        }
    });

    $('.downloadLink').click(function(){
        downloadInnerHtml(fileName, 'sign-preview','text/html');
    });
});
