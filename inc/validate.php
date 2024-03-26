<?php
include 'db_connect.php';
include 'connection/security.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userLogin = (isset($_POST['userLogin'])) ? $_POST['userLogin'] : '';
    $userPassword = (isset($_POST['userPassword'])) ? $_POST['userPassword'] : '';
    $userPassword = md5($userPassword);

    if (validateUser($userLogin, $userPassword) == true) {
        header("Location: ../home.php");
        exit;
    } else {
        unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userLogin'], $_SESSION['userPassword']);
        header("Location: ../index.php?error=error");
        exit;
    }
}
