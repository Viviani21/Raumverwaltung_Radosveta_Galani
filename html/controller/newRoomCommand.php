<?php
include("mapper/MySQLDatabase.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();
$meldung1="";
$meldung="";
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a><a href='index.php?befehl=adminRooms'> Zurück </a>";
$anlegen="";
$search='Raum suche <a href="index.php?befehl=adminRoomSearch" class="button table">Suchen</a>';


$roomDAO= new RoomDAO();

if (isset($_POST['abbrechen'])){
    $anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
    $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'>Startseite </a> ";
    include("views/adminRooms.php");
}

elseif(isset($_REQUEST['save'])  && !empty($_REQUEST['number']) && !empty($_REQUEST['floor']) && !empty($_REQUEST['building']) && !empty($_REQUEST['personen']) && !empty($_REQUEST['art']) && !empty($_REQUEST['equipment'])){
    $number=$_REQUEST['number'];
    $floor=$_REQUEST['floor'];
    $building=$_REQUEST['building'];
    $personen=$_REQUEST['personen'];
    $art=$_REQUEST['art'];
    $equipment=$_REQUEST['equipment'];
    $room=$roomDAO->readByNumberBuilding($number, $building);

    if ($room ==NULL){
      $room=$roomDAO->create($number, $floor, $building, $personen, $art, $equipment);
      $meldung.=" Sie haben einen neuen Raum angelegt! ";
      $anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
      $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'>Startseite </a> ";
     
  include("views/adminRooms.php");
    }else{
      $meldung.=" Raum ist schon in Datenbank !";
        include("views/newRoom.php");
       }
    }
else{
    $meldung.="Bitte füllen Sie alle Felder aus!";
    include("views/newRoom.php");

    }
?>
