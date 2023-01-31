<?php
session_start();

include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");

$meldung="";

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
	unset($_SESSION['user']);
	unset($_SESSION['userID']);
	unset($_SESSION['rights']);
	unset($_SESSION['LAST-LOGIN-TIMESTAMP']);
	session_destroy();
	include("views/login.php");
	

}else{
	$meldung .= " Sie haben keine Berechtigung.<br>";
	include("views/login.php");
	session_destroy();

}

?>
