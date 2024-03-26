<?php
include '../inc/db_connect.php';
include '../inc/connection/audit.php';

$userId = $_POST['userId'];
$userStatus = $_POST['userStatus'];
$today = date('Y-m-d');
$descriptionActivate = "Usuário Reativado";
$descriptionDeactivated = "Usuário Desativado";

if($userStatus == 1) {
    $queryGetUser = $database->query("SELECT userName FROM users WHERE userId = '" . $userId . "'");
    $user = mysqli_fetch_array($queryGetUser);
    $queryUpdateUser = $database->query("UPDATE users SET userStatus = 0 WHERE userId = '" . $userId . "'");
    $queryInsertUserHistoric = $database->query("INSERT INTO users_historic (
        userHistoricUserId,
        userHistoricDate,
        userHistoricDescription
    ) VALUES (
        '" . $userId . "',
        '" . $today . "',
        '" . $descriptionDeactivated . "')");
    audit('page/users/listUsers', 'delete', 'Usuário: ' . $user['userName'] . ' Inativado.');
} else if($userStatus == 0) {
    $queryGetUser = $database->query("SELECT userName FROM users WHERE userId = '" . $userId . "'");
    $user = mysqli_fetch_array($queryGetUser);
    $queryUpdateUser = $database->query("UPDATE users SET userStatus = 1 WHERE userId = '" . $userId . "'");
    $queryInsertUserHistoric = $database->query("INSERT INTO users_historic (
        userHistoricUserId,
        userHistoricDate,
        userHistoricDescription
    ) VALUES (
        '" . $userId . "',
        '" . $today . "',
        '" . $descriptionActivate . "')");
    audit('page/users/listUsers', 'delete', 'Usuário: ' . $user['userName'] . ' Ativado.');
}

echo json_encode($queryDeleteUser);
