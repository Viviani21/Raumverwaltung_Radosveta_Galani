
<?php
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/TimeperiodDAO.php");
include("model/Timeperiod.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();


$meldung = '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
$meldung1="";


$link = "<a href='index.php?befehl=logout' title='Logout'> Logout </a><a href='index.php?befehl=gastMenu'> Zurück </a>";
$roomDAO=new RoomDAO();
//$bookingDAO=new BookingDAO();
$timeperiodDAO=new TimeperiodDAO();

//$roomList=array();


if(isset($_REQUEST['submit1']) && !empty($_REQUEST['date1']) && !empty($_REQUEST['time1'])){
    $date=$_REQUEST['date1'];
    $tid=$_REQUEST['time1'];
    
$roomList=$roomDAO->searchRoom($date,$tid);
$zeit=$timeperiodDAO->read($tid)->getPeriod();

include("views/roomList.php");

}
elseif(isset($_REQUEST['submit']) && !empty($_REQUEST['rnumber']) && !empty($_REQUEST['building']) && !empty($_REQUEST['date']) && !empty($_REQUEST['time'])){
    $roomnr=$_REQUEST['rnumber'];
    $building=$_REQUEST['building'];
    $date=$_REQUEST['date'];
    $tid=$_REQUEST['time'];
    
    
$zeit=$timeperiodDAO->read($tid)->getPeriod();

include("views/roomList.php");

}
else{
  
   $meldung1="Bite füllen Sie alle Felder aus!";
   $link = "<a href='index.php?befehl=logout' title='Logout'> Logout </a>";
   include("views/gastMenu.php");
}


?>
