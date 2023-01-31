<?php	
include("mapper/MySQLDatabase.php");
include("mapper/BookingDAO.php");
include("model/Booking.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/TimeperiodDAO.php");
include("model/Timeperiod.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
//$search='Raumsuche <a href="index.php?befehl=adminRoomSearch" class="button table">Suchen</a>';
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a>";
$meldung1="";
$meldung="";
$roomDAO= new RoomDAO();
$bookingDAO= new BookingDAO();
$timeperiodDAO= new TimeperiodDAO();


if(isset($_REQUEST['buchen']) && !empty($_REQUEST['roomnr']) && !empty($_REQUEST['building'])&& !empty($_REQUEST['date']) && !empty($_REQUEST['period'])){
	$roomnr = $_REQUEST['roomnr'];
	$building = $_REQUEST['building'];
	$date = $_REQUEST['date'];
	$period= $_REQUEST['period'];
	$tid=$timeperiodDAO->readByPeriod($period)->getID();
	
	$room=$roomDAO->readByNumberBuilding($roomnr, $building);
	$rid=$room->getID();
	
	$booking=$bookingDAO->readByDateRoom($date,$tid,$rid);
	
	if($room!==NULL){
		if($booking!==NULL){
			//$meldung=' Raum ist für diese Datum und Zeit gebucht. Bitte wählen Sie einen anderen Raum oder Zeit.';
			
			include("views/adminRooms.php");
		}
		elseif ($booking==NULL  &&  $tid==4){
				$hourscheck=$bookingDAO->bookingHours($date,$rid);
					if($hourscheck ==true){
						//$meldung=" Sie können den Raum für den ganzen Tag nicht buchen!";
						include("views/adminRooms.php");
					}
					else{
						$booking=$bookingDAO->create($date, $tid, $rid, $_SESSION['userID']);
						$meldung='Sie haben den Raum '.$roomnr." in Gebäude ". $building." am ". $date." gebucht";	
						
						include("views/adminRooms.php");
					}
		}
		elseif($booking==NULL  && $tid!==4){
				$tagcheck=$bookingDAO->bookingTag($date,$rid);
					if($tagcheck!==NULL){
						//$meldung="Leider ist der Raum für den ganzen Tag gebucht. Bitte Wählen Sie andere Raum oder Tag !";
						
						include("views/adminRooms.php");
					}else{
						$booking=$bookingDAO->create($date, $tid, $rid, $_SESSION['userID']);
						$meldung='Sie haben den Raum '.$roomnr." in Gebäude ". $building." am ". $date." gebucht";	
						
						include("views/adminRooms.php");
					}
		}
	}		
				
}		
	
elseif(isset($_POST['abbrechen'])){
	
	include("views/adminRooms.php");
}
?>