<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/auth.php";
    require_once $_SERVER['DOCUMENT_ROOT']."/configurations/functions.php";

    global $auth;
    $auth->revoke();

    global $session;
    $session->end();

    redirect("/index.php");

?>