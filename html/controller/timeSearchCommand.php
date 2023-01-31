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

    $meldung="";
    $meldung1="";
    $roomDAO= new RoomDAO();
    $bookingDAO= new BookingDAO();
    $timeperiodDAO= new TimeperiodDAO();
    $periodList=$timeperiodDAO->readALL(); 
 

if($_SESSION['rights']=="Benutzer"){

    $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=userMenu' title='Home'> Startseite </a><a href='index.php?befehl=myBooking'> Meine Buchungen</a>";

        if(isset($_REQUEST['submit']) && !empty($_REQUEST['date'])){
            $date = $_REQUEST['date'];
            include("views/userTime.php");	
        }
        else{
            $meldung .= '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
            $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=myBooking'> Meine Buchungen</a>";
            $meldung1="Bitte geben Sie ein Datum ein!";
            include("views/userMenu.php");
        }
}elseif($_SESSION['rights']=="Gast"){
    $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=gastMenu' title='Home'> Startseite</a>";

    $meldung="";
    
        if(isset($_REQUEST['submit']) && !empty($_REQUEST['date'])){
            $date = $_REQUEST['date'];
            $meldung .= '<h3 class="hallo"> ' ." ". $_SESSION['user'].  ', Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
            include("views/gastTime.php");	
        }
        else{
			$meldung .= '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
            $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=myBooking'> Meine Buchungen</a>";
            $meldung1="Bitte geben Sie ein Datum ein!";
            include("views/gastMenu.php");
            
        }

}elseif($_SESSION['rights']=="Admin"){

    $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a><a href='index.php?befehl=adminRooms' >Räumeübersicht</a>";

    $anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';


        if(isset($_REQUEST['submit']) && !empty($_REQUEST['date'])){
            $date = $_REQUEST['date'];
            include("views/userTime.php");	
        }
        else{
            //$meldung = '<h3 class="hallo"> Hallo ' ." ". $_SESSION['user'].  ' ! Sie sind als ' . $_SESSION['rights']. ' angemeldet. </h3> ';
            $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite</a>";
            $meldung1="Bitte geben Sie ein Datum ein!";
            include("views/adminRooms.php");
        }
}




?>