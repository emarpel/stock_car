<?php
include 'inc/db_connect.php';
session_start();

function validateUser($userLogin, $userPassword)
{
	global $database;

	$userLogin = $userLogin;
	$userPassword = $userPassword;

	$querySession = $database->query("SELECT userId, userName, userMail, userLogin, userPermission FROM users WHERE userLogin = '" . $userLogin . "' AND userPassword = '" . $userPassword . "' LIMIT 1");
	$result = mysqli_fetch_assoc($querySession);

	$queryConfig = $database->query("SELECT * FROM configurations");
	$config = mysqli_fetch_assoc($queryConfig);

	if (empty($result)) {
		return false;
	} else {
		$_SESSION['userId'] = $result['userId'];
		$_SESSION['userName'] = $result['userName'];
		$_SESSION['userMail'] = $result['userMail'];
		$_SESSION['userLogin'] = $result['userLogin'];
		$_SESSION['userPermission'] = $result['userPermission'];
		$_SESSION['userLogin'] = $userLogin;
		$_SESSION['userPassword'] = $userPassword;

		$_SESSION['configSystemName'] = $config['configSystemName'];
		$_SESSION['configSystemPhone'] = $config['configSystemPhone'];
		$_SESSION['configSystemCNPJ'] = $config['configSystemCNPJ'];
		$_SESSION['configSystemCity'] = $config['configSystemCity'];
		$_SESSION['configPasswordMaster'] = $config['configPasswordMaster'];
		return true;
	}
}

function protectPage()
{
	if (!isset($_SESSION['userId']) or !isset($_SESSION['userName'])) {
		getOut();
	} elseif (!validateUser($_SESSION['userLogin'], $_SESSION['userPassword'])) {
		getOut();
	}
}

function getOut()
{
	unset($_SESSION['userId'], $_SESSION['userName'], $_SESSION['userLogin'], $_SESSION['userPassword']);
	header("Location: index.php");
	exit;
}
