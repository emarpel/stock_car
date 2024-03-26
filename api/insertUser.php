<?php
include '../inc/db_connect.php';
include '../inc/connection/audit.php';

$today = date('Y-m-d');
$userPassword = MD5('stockcar123');
$description = "Usuário Criado e Ativado";

$userName = $_POST['userName'];
$userCPF = $_POST['userCPF'];
$userMail = $_POST['userMail'];
$userCellphone = $_POST['userCellphone'];
$userLogin = $_POST['userLogin'];
$userPermission = $_POST['userPermission'];

$queryInsertUser = $database->query("INSERT INTO users (
    userName,
    userCPF,
    userMail,
    userCellphone,
    userLogin,
    userPermission,
    userPassword,
    userDateCadastre
) VALUES (
    '" . $userName . "',
    '" . $userCPF . "',
    '" . $userMail . "',
    '" . $userCellphone . "',
    '" . $userLogin . "',
    '" . $userPermission . "',
    '" . $userPassword . "',
    '" . $today . "')");

$userId = mysql_insert_id();

$queryInsertUserHistoric = $database->query("INSERT INTO users_historic (
    userHistoricUserId,
    userHistoricDate,
    userHistoricDescription
) VALUES (
    '" . $userId . "',
    '" . $today . "',
    '" . $description . "')");

audit('page/users/listUsers', 'insert', 'Usuário: ' . $userName . ' Cadastrado.');

echo json_encode($queryInsertUser);
