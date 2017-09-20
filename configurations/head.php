<?php
    $styles = array(
        "/content/styles/bootstrap.min.css",
        "/content/styles/bootstrap-theme.min.css",
        "/content/styles/font.css",
        "/vendors/ckeditor/skins/moono-lisa/editor.css",
        "/vendors/ckeditor/plugins/scayt/skins/moono-lisa/scayt.css",
        "/vendors/ckeditor/plugins/wsc/skins/moono-lisa/wsc.css",
        "/content/styles/mCustomScrollbar.min.css",
        "/content/styles/app.css"
    );

    $scripts = array(
        "/scripts/jquery-3.2.0.min.js",
        "/scripts/bootstrap.min.js",
        "/scripts/mCustomScrollbar.concat.min.js",
        "/vendors/ckeditor/ckeditor.js",
        "/vendors/ckeditor/config.js",
        "/vendors/ckeditor/lang/en.js",
        "/vendors/ckeditor/styles.js",
        "/scripts/app.js"
    );

    foreach($styles as $style) {
        echo "<link rel='stylesheet' type='text/css' href='$style'></link>";
    }

    foreach($scripts as $script) {
        echo "<script type='text/javascript' src='$script'></script>";
    }
?>

<link rel='shortcut icon' type='image/png' href='/content/images/avatar.png' />
<title>Blog - Object71</title>
