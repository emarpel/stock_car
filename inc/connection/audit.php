<?php
include 'inc/db_connect.php';
date_default_timezone_set('America/Bahia');

function audit($AuditPage, $auditTypeAction, $auditAction)
{
    global $database;

    $auditUserId = $_SESSION['userId'];
    $auditDate = date('Y-m-d');
    $auditHour = date('H:i');

    $database->query("INSERT INTO audit (auditUserId, auditDate, auditHour, AuditPage, auditTypeAction, auditAction) 
	VALUES ('" . $auditUserId . "','" . $auditDate . "','" . $auditHour . "','" . $AuditPage . "','" . $auditTypeAction . "','" . $auditAction . "')");
}
