<?php
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$meldung="";
$anlegen="";
$search="";

if ($_SESSION['rights'] == "Admin") {
  $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite </a>";
} else {
  $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminRooms'> Startseite </a>";
}

if ($_SESSION['rights'] == "Benutzer") {
  $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=userMenu' title='Home'> Startseite </a>";
} 
$bookingDAO= new BookingDAO();

if (isset($_POST['abbrechen'])){

}

elseif (isset($_POST['delete']) && !empty($_POST['bid']) && !empty($_POST['roomnr']) && !empty($_POST['building']) && !empty($_POST['date']) && !empty($_POST['zeit'])){
        $bid=intval($_POST['bid']);
        $roomnr=$_POST['roomnr'];
        $building=intval($_POST['building']);
        $date=($_POST['date']);
        $zeit=($_POST['zeit']);

        $delete=$bookingDAO->delete($bid);
        print_r($delete);
        $meldung.="Sie haben  Buchung  mit ID " . $bid. " für den Raum " .$roomnr. " im Gebäude  ".$building." am   " . $date." für die Zeit  " . $zeit. "  gelöscht !";

}else{
        $meldung.="Fehler! ";

}

if ($_SESSION['rights'] == "Admin") {
  include("views/allBooking.php");
} else {
  include("views/myBooking.php");
}


?>
