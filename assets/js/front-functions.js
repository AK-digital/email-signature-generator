function copyHtmlSignature() {
    var copyText = document.getElementById("signature");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand('copy');
    var tooltip = document.getElementById("esg-copy-html-btn");
    tooltip.innerHTML = "Signature copied into clipboard !";
}

function copyRenderedSignature() {
    var copyText = document.getElementById("rendered-signature");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand('copy');
    var button = document.getElementById("esg-copy-rendered-btn");
    button.innerHTML = "Signature copied into clipboard !";
}
