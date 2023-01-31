<?php
include("mapper/MySQLDatabase.php");
include("mapper/RoomDAO.php");
include("model/Room.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$anlegen='Neuen Raum anlegen <a href="index.php?befehl=newRoom" class="button table" > Anlegen</a>';
$meldung="";
$meldung1="";
$search=' <p> Freie Räume nach Datum suchen </p>
<form style="width:20%; margin:auto; " action="index.php?befehl=experiment" method="post" >

<label for="date"> Datum :</label>
<input type="date" name="date" >
<button type="submit" name="submit" class="button table">Suche</button>

</form>';


$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a> <a href='index.php?befehl=adminMenu' title='Home'> Startseite </a>";



$roomDAO = new RoomDAO();

$roomList = $roomDAO->readAll();


	include("views/adminRooms.php");
?>
