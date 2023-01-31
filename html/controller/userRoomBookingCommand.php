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


$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=myBooking'> Meine Buchungen </a>";
$meldung='<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
$meldung1="";
$roomDAO= new RoomDAO();
$bookingDAO= new BookingDAO();
$timeperiodDAO=new TimeperiodDAO();


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
			
			include("views/userMenu.php");
		}
		elseif ($booking==NULL  &&  $tid==4){
				$hourscheck=$bookingDAO->bookingHours($date,$rid);
					if($hourscheck ==true){
						
						include("views/userMenu.php");

					}
					else{
						$booking=$bookingDAO->create($date, $tid, $rid, $_SESSION['userID']);
						$meldung1='Sie haben den Raum '.$roomnr." in Gebäude ". $building." am ". $date." gebucht";

						include("views/userMenu.php");
					}
		}
		elseif($booking==NULL  && $tid!==4){
				$tagcheck=$bookingDAO->bookingTag($date,$rid);
					if($tagcheck!==NULL){
					

						include("views/userMenu.php");
					}else{
						$booking=$bookingDAO->create($date, $tid, $rid, $_SESSION['userID']);
						$meldung1='Sie haben den Raum '.$roomnr." in Gebäude ". $building." am ". $date." gebucht";

						include("views/userMenu.php");
					}
		}
	}

}	

elseif(isset($_POST['abbrechen'])){


	$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=myBooking' > Meine Buchungen </a>";
	include("views/userMenu.php");
}
?>
