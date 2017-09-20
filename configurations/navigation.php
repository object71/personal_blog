<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";

    global $auth;
?>

<header class="navbar navbar-static-top">
    <nav class="container-fluid">
        <ul class="nav nav-tabs" role="navigation">
            <li class="navbar-header"><img alt="Brand" width="32" height="32" style="margin: 2px;" src="/content/images/avatar.svg"></li>
            <li><a href='/index.php'>Home</a></li>
            <?php if ($auth->isAuthorized()) { ?>
                <li><a href='/storyteller/add-post.php'>Add Post</a></li>
                <li><a href='/actions/logout.php'>Logout</a></li>
            <?php } else { ?>

            <?php } ?>
            <li><a href='/about.php' >About</a></li>
            <li><a href='/contacts.php'>Contacts</a></li>
        </ul>
    </nav>
</header>

<script>
    activeElements = $("ul.nav > li > a[href='" + window.location.pathname + "']").parent();
    if(activeElements.length) {
        activeElements.addClass("active");
    } else {
        $("ul.nav > li:has(a):first").addClass("active");
    }
</script>
