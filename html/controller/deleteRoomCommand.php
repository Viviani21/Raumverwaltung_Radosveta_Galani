<?php
include("mapper/MySQLDatabase.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();
$meldung1="";
$meldung="";
$search='Raum suche <a href="index.php?befehl=adminRoomSearch" class="button table">Suchen</a>';
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite </a>";
$anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
$roomDAO= new RoomDAO();

if (isset($_POST['abbrechen'])){
    
}

elseif (isset($_POST['delete']) && !empty($_POST['rid']) && !empty($_POST['roomnr']) && !empty($_POST['floor']) && !empty($_POST['building']) && !empty($_POST['personen']) && !empty($_POST['art']) && !empty($_POST['equipment'])){
        $rid=intval($_POST['rid']); 
        $roomnr=$_POST['roomnr'];
        $building=intval($_POST['building']); 
       
        $delete=$roomDAO->delete($rid);
        $meldung.="Sie haben  Raum  " .$roomnr. " im Gebäude  ".$building." mit ID : " . $rid." gelöscht ";
              
}else{
        $meldung.="Fehler! "; 
       
}
include("views/adminRooms.php");

?> 