<?php
    function redirect($location, $statusCode = 303)
    {
        header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . $location, true, $statusCode);
        exit();
    }
?>