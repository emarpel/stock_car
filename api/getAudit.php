<?php
include '../inc/db_connect.php';

$arrayAudit = array();

$queryGetAudit = $database->query("SELECT * FROM audit ORDER BY auditId DESC LIMIT 20");

while ($data = mysqli_fetch_array($queryGetAudit)) {
    $audit['auditUserId'] = $data['auditUserId'];
    $audit['auditDate'] = $data['auditDate'];
    $audit['auditHour'] = $data['auditHour'];
    $audit['auditPage'] = $data['auditPage'];
    $audit['auditTypeAction'] = $data['auditTypeAction'];
    $audit['auditAction'] = $data['auditAction'];
    $arrayAudit[] = $audit;
}

echo json_encode($arrayAudit);