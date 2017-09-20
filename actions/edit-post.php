<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database.php";

    global $auth;

    if($auth->isAuthorized()) {
        global $database;

        $id = $_POST["postId"];
        $data = Array(
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "content" => $_POST["content"],
            "authorId" => $_POST["authorId"],
        );
        $database->where("id", $id);
        $database->update("posts", $data);

        redirect("/view-post.php?id=" . $id);

    } else {
        redirect("/login.php");
    }
?>
