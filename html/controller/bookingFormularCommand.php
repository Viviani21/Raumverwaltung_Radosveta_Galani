<?php
include("mapper/MySQLDatabase.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();


$meldung="";
$link="";


if (isset($_REQUEST['roomnr']) && isset($_REQUEST['building'] )){
        $roomnr=$_REQUEST['roomnr'];
        $building=intval($_REQUEST['building']); 
        $date= $_REQUEST['date'];
        $period = $_REQUEST['period'];
        if ( $_SESSION['rights']=="Benutzer"){
                $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=userMenu' > Startseite </a><a href='index.php?befehl=myBooking'> Meine Buchungen  </a> ";
                include("views/userRoomBooking.php");    
        }elseif( $_SESSION['rights']=="Admin"){
                $link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a><a href='index.php?befehl=adminRooms'> Räumeübersicht </a> ";
                include("views/roomBooking.php");
        }

}else{
        $building="";
        $roomnr="";
        header("location : index.php?befehl=logout");
        exit;
}

?> 
