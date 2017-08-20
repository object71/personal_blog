<?php
    //require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";
    global $auth;
    if($auth->isAuthorized()) {
        redirect("/index.php");
    } else {
?>

<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/head.php"; ?>
    </head>
    <body class="fullheight">
        <div class="container">
            <div class="row vertical-align" >
                <form class="col-sm-4 col-sm-offset-4" action="/actions/login.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon">User</span>
                        <input class="form-control" placeholder="Username" type='text' name='username' /><br />
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">Pass</span>
                        <input class="form-control" placeholder="Password" type='password' name='password' /><br />
                    </div>
                    <button class="btn btn-primary" type='submit' >Login</button>
                </form>
            </div>
        </div>
    </body>
</html>



<?php
    }
?>
