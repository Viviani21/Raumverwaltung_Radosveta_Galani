<?php
include("mapper/MySQLDatabase.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();
$meldung1="";
$meldung="";
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite </a>";
$anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
$roomDAO= new RoomDAO();
$search='Freien Raum suchen <a href="index.php?befehl=adminRoomSearch" class="button table">Suchen</a>';


if (isset($_POST['abbrechen'])){
       
    }
elseif (isset($_POST['submit']) && !empty($_POST['rid']) && !empty($_POST['roomnr']) && !empty($_POST['floor']) && !empty($_POST['building']) && !empty($_POST['personen']) && !empty($_POST['art']) && !empty($_POST['equipment'])){
        $rid=intval($_POST['rid']); 
        $roomnr=$_POST['roomnr'];
        $floor=intval($_POST['floor']);  
        $building=intval($_POST['building']); 
        $personen=intval($_POST['personen']);
        $art=($_POST['art']);   
        $equipment=$_POST['equipment'];
        
        $update=$roomDAO->updateRoom($roomnr,$floor, $building, $personen, $art, $equipment, $rid);
      
    $meldung.="Sie haben Daten über den Raum mit ID : " . $rid." geändert ";
              
}else{
        $meldung.="Fehler! ";      
}
include("views/adminRooms.php");

?> 