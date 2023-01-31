<?php
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();


$meldung = '<h3 class="hallo"> ' ." ". $_SESSION['user'].  ' , Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
$anlegen="";
$search="";
if($_SESSION['rights']=="Benutzer"){
	$link = "<a href='index.php?befehl=logout'> Logout </a><a href='index.php?befehl=userMenu' > Startseite </a>";
}else{
$link = "<a href='index.php?befehl=logout'> Logout </a><a href='index.php?befehl=gastMenu' title='Logout' > Zurück </a>
";
}
$bookingDAO=new BookingDAO();
$uid=$_SESSION['userID'];
$list1 = $bookingDAO-> bookingUser($uid);

	include("views/myBooking.php");
?>
