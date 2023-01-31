<?php

include_once("./mapper/MySQLDatabase.php");
include_once("./mapper/UserDAO.php");
include_once("./model/User.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$delete="";
$meldung="";
$meldung1="";
$user="";
$userList="";
$userDAO = new UserDAO();
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu' title='Home'> Startseite </a> <br> <br>";

if(isset($_REQUEST["save"]) && !empty ($_REQUEST["name"]) && !empty ($_REQUEST["secondname"]) && !empty ($_REQUEST["email"]) && !empty ($_REQUEST["password"]) && !empty ($_REQUEST["role_id"])) {
  $name = $_REQUEST["name"];
  $secondname = $_REQUEST["secondname"];
  $email = $_REQUEST["email"];
  $password = $_REQUEST["password"];
  $role_id = $_REQUEST["role_id"];


  $found=$userDAO->checkByEmail($email);
    if($found==true){
      $meldung="Der User ist schon in Datenbank !";
      include("views/userManage.php");
    }elseif ($found!==true){

      $newUser = $userDAO->create($name, $secondname, $email, $password, $role_id);
      $meldung="Der User ist in Datenbank angelegt !";
      include("views/userManage.php");
    }
  }
else{
  $meldung="Bitte füllen Sie alle Felder aus!";
  include("views/userManage.php");

  }
?>
