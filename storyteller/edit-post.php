<?php
    //require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";

    global $auth;
    if(!($auth->isAuthorized())) {
        redirect("/login.php");
    } else {
        if(isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $query = "SELECT id, title, description, content, name FROM posts JOIN users ON users.id = posts.authorId WHERE posts.id = " . $id;
            $post = $database->rawQueryOne($query);
?>

<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/head.php"; ?>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/navigation.php"; ?>
        <div class="container-fluid">
            <form method="POST" action="/actions/edit-post.php" class="fullheight">
                <input type="hidden" name="postId" value="<?= post["id"]?>"
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12">
                            <input class="form-control" placeholder="Title" required type='text' name='title' value="<?= post["title"]?>" /><br />
                        </div>
                        <div class="col-sm-12">
                            <input class="form-control" placeholder="Description" required type='text' name='description' value="<?= post["description"]?>" /><br />
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type='submit' >Submit</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="padding: 5px 25px 5px 35px;">
                        <textarea id="editor" class="editor form-control" name="content"><?= post["content"]?></textarea>
                    </div>
                </div>
            </from>
        </div>
    </body>
</html>

<?php
        } else {
            redirect("/index.php");
        }
    }
?>
