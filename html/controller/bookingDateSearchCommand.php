<?php
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();


$meldung ="";
$meldung1="";
$date="";

$link = "<a href='index.php?befehl=logout' title='Logout'> Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a><a href='index.php?befehl=allBooking'> Alle Buchungen </a>";

$bookingDAO=new BookingDAO();


if(isset($_REQUEST['submit']) && !empty($_REQUEST['date'])){
    $date=$_REQUEST['date'];
    $list = $bookingDAO->searchDateBooking($date);

include("views/bookingDateSearch.php");

}else{

   $meldung="Bite geben Sie ein Datum ein!";
   $link = "<a href='index.php?befehl=logout' title='Logout'> Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a>";
   include("views/allBooking.php");
}


?>
