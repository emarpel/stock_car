<?php
include '../inc/db_connect.php';

$cpf = $_POST['cpf'];
$email = $_POST['email'];
$newPassword = MD5('stockcar123');

$queryGetUsers = $database->query("SELECT userId, userCPF, userMail, userPassword FROM users WHERE userCPF = '$cpf' AND userMail = '$email'");
$getRows = mysqli_num_rows($queryGetUsers);
while($dataUsers = mysqli_fetch_array($queryGetUsers)) {
    $userId = $dataUsers['userId'];
}

if($getRows >= 1) {
    $database->query("UPDATE users SET userPassword = '".$newPassword."' WHERE userId = '".$userId."'");
}

echo json_encode($getRows);