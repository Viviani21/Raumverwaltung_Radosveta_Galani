<?php
	
include("mapper/MySQLDatabase.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();
/* $meldung1=""; */
/* $meldung = ""; */
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=myBooking' > Meine Buchungen </a>";
$roomDAO = new RoomDAO();

$roomList = $roomDAO->readAll();

	if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
		$meldung1="";
		$meldung = '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
		include("views/userMenu.php");
	}
	else{
		session_destroy();
		$meldung = " Sie haben keine Berechtigung.<br>";
		include("views/login.php");
	} 
?>