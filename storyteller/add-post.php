<?php 
    //require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";

    global $auth;
    if(!($auth->isAuthorized())) {
        redirect("/login.php");
    } else {
?>

<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/head.php"; ?>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/navigation.php"; ?>
        <div class="container-fluid">
            <form method="POST" action="/actions/add-post.php" class="fullheight">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <input class="form-control" placeholder="Title" required type='text' name='title' /><br />
                        </div>
                        <div class="col-sm-12">
                            <input class="form-control" placeholder="Description" required type='text' name='description' /><br />
                        </div>
                        <input type="hidden" name="authorId" value=<?= $auth->getUserId(); ?>>
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type='submit' >Submit</button>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-sm-12" style="padding: 5px 25px 5px 35px;">
                        <textarea id="editor" class="editor form-control" name="content"></textarea>
                    </div>
                </div>
            </from>
        </div>
    </body>
</html>

<?php
    } 
?>