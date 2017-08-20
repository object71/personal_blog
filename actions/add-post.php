<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/debug.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database.php";
    
    global $auth;

    if($auth->isAuthorized()) {
        global $database;

        $data = Array(
            "title" => $_POST["title"],
            "description" => $_POST["description"],
            "content" => $_POST["content"],
            "authorId" => $_POST["authorId"],
            "createdOn" => (new DateTime())->format("Y-m-d H:i:s"),
        );

        $id = $database->insert("posts", $data);

        redirect("/view-post.php?id=" . $id);

    } else {
        redirect("/login.php");
    }
?>