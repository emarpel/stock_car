<?php
include '../inc/db_connect.php';

$userId = $_POST['userId'];
$type = $_POST['type'];
$arrayUsers = array();

if($type == 'active') {
    $queryGetUser = $database->query("SELECT * FROM users WHERE userStatus = 1 ORDER BY userName ASC");
} else if($type == 'inactive') {
    $queryGetUser = $database->query("SELECT * FROM users WHERE userStatus = 0 ORDER BY userName ASC");
} else if($type == 'unique') {
    $queryGetUser = $database->query("SELECT * FROM users WHERE userId = '".$userId."'");
}

while ($data = mysqli_fetch_array($queryGetUser)) {
    $user['userId'] = $data['userId'];
    $user['userName'] = $data['userName'];
    $user['userCPF'] = $data['userCPF'];
    $user['userMail'] = $data['userMail'];
    $user['userCellphone'] = $data['userCellphone'];
    $user['userLogin'] = $data['userLogin'];
    $user['userPermission'] = $data['userPermission'];
    $user['userStatus'] = $data['userStatus'];
    $arrayUser[] = $user;
}

echo json_encode($arrayUser);
