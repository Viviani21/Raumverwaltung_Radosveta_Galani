<!-- <?php
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/TimeperiodDAO.php");
include("model/Timeperiod.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$link = "<a href='index.php?befehl=logout' > Logout </a><a href='index.php?befehl=userMenu'> Startseite </a> ";
$meldung = "";
$anlegen="";
$search="";

$roomDAO=new RoomDAO();
$bookingDAO=new BookingDAO();
$timeperiodDAO=new TimeperiodDAO();

if(isset($_REQUEST['submit']) && isset($_REQUEST['roomnr']) && isset($_REQUEST['building']) && isset($_REQUEST['date']) && isset($_REQUEST['zeit'])){
    $roomnr=$_REQUEST['roomnr'];
    $building=$_REQUEST['building'];
    $date=$_REQUEST['date'];
    $tid=$_REQUEST['zeit'];

    $room->$roomDAO->readByNumberBuilding($roomnr,$building);
    $rid=$room->getID();
    $period=
    $booking=$bookingDAO->checkBooking($date,$tid, $rid);
    if($booking!==NULL){
        $meldung.='Raum Nr: '.$roomnr." ist leider für diese Zeitraum am : ".$date." belegt! Bitte wählen Sie andere Raum,Datum oder Zeit! ";
        include("views/roomSearch.php");
    }elseif ($booking==NULL){
        $booking=$bookingDAO->create($date, $period, $rid, $_SESSION['userID']);
							$meldung.='Sie haben den Raum '.$roomnr." in Gebäude ". $building." am ". $date." gebucht.".$timeperiodDAO->read($period)->getPeriod();	
							include("views/userRoomBooking.php");
    }else{
        $meldung.="Fehler";
    }
}elseif (isset($_REQUEST['buchen']) && !empty($_REQUEST['roomnr']) && !empty($_REQUEST['building'])&& empty($_REQUEST['date']) && !empty($_REQUEST['zeit'])){
        
    $meldung.='Bitte geben Sie ein Datum ein oder gehen Sie zurück </a> ';
    include("views/roomSearch.php");

}else{
    $meldung.="Fehler";
    include("views/userRoomBooking.php");
}

?>
 -->