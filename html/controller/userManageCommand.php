<?php
include_once("./mapper/MySQLDatabase.php");
include_once("./mapper/UserDAO.php");
include_once("./model/User.php");
include_once("./model/Role.php");
include_once("./mapper/RoleDAO.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();



$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite </a> <br> <br>";
$meldung="";
$meldung1="";
$delete="";
$user="";
$userList="";
$userDAO = new UserDAO();

include("views/userManage.php");


?>
