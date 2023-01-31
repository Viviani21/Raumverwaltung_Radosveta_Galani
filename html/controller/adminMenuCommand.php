<?php
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

if(isset($_SESSION['user']) && !empty($_SESSION['user'])){ 
	$link = "<a href='../index.php?befehl=logout' title='Logout' > Logout </a> ";
			
			
	$meldung = '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user']. ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
	
	
	include("views/adminMenu.php");
}else{
		session_destroy();
		$link = "<a href='index.php?'></a> ";
		$meldung = " Sie haben keine Berechtigung.<br>";
		include("views/login.php");
	}
?>
