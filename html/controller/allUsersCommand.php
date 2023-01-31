<?php	
include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/RoleDAO.php");
include("model/Role.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$meldung="";
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a><a href='index.php?befehl=userManage'> Zurück </a> ";

$userDAO = new UserDAO();

if(isset($_REQUEST['ballusers'])){
$userList = $userDAO->readAll();

}

	include("views/allUsers.php"); 
?>  
