<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/database.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    global $auth;
    global $database;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersCount = $database->getValue("users", "count(*)");
    if($usersCount == 0) {

        $data = Array(
            "name" => "hristo stamenov",
            "username" => "admin",
            "password" => password_hash("admin", PASSWORD_DEFAULT),
        );

        $database->insert("users", $data);
    }

    $database->where('username', $username);
    $user = $database->getOne('users');

    if($user && password_verify($password, $user['password'])) {
        $auth->authorize($user['id'], $user['username']);
        redirect("/index.php");
    } else {
        redirect("/login.php");
    }

?>
