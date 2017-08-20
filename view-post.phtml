<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";

    global $database;
    if(isset($_REQUEST["id"]) && is_numeric($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $query = "SELECT title, description, content, name, createdOn FROM posts JOIN users ON users.id = posts.authorId WHERE posts.id = " . $id;
        $post = $database->rawQueryOne($query);



?>

<html>
    <head>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/head.php"; ?>
    </head>
    <body>
        <?php include $_SERVER['DOCUMENT_ROOT']."/configurations/navigation.php"; ?>
        <main>
            <article class="content scroll-dark">
                <h2><?= $post["title"] ?></h2>
                <h4><?= $post["description"] ?></h4>
                <hr />
                <?= $post["content"] ?>
                <p><i><?= date_format(date_create($post["createdOn"]),"d/m/Y") . " - " . $post["name"] ?></i></p>
            </article>
        <main>
    </body>
</html>

<?php
    } else {
        redirect("/index.php");
    }
?>
