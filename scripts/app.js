
function onDocumentReady () {
    if(document.getElementById("editor")) {
        CKEDITOR.replace("editor");
        CKEDITOR.config.height = 500;
    }

    $(".scroll-dark").mCustomScrollbar({
        theme: "minimal-dark"
    });

    $(".scroll-light").mCustomScrollbar({
        theme: "minimal"
    });
}

jQuery(document).ready(onDocumentReady);
