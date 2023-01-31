<?php

include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/RoleDAO.php");
include("model/Role.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();


$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseie </a>";
$meldung = "";
$meldung1="";
$user="";
$userList="";
$delete="";

$userDAO = new UserDAO();


if(isset($_REQUEST['ballusers'])){
$userList = $userDAO->readAll();
$link .= "<a href='index.php?befehl=userManage'> Zurück </a> ";
include("views/allUsers.php");
}
elseif(isset($_REQUEST['bsearch']) && !empty($_REQUEST['choose']) && !empty($_REQUEST['search'])){

            if($_REQUEST['choose']=="email"){
                $email=$_REQUEST['search'];
                $user=$userDAO->readbyEmail($email);
                if($user==NULL){
                    $user="Der Benutzer ist nicht in Datenbank!";
                    include("views/userManage.php");
                }else{
                    $user=$user;
                    include("views/userManage.php");
                }
            }elseif($_REQUEST['choose']=="uid"){
                $uid=$_REQUEST['search'];
                $user=$userDAO->readbyUID($uid);
                    if($user==NULL){
                        $user="Der Benutzer ist nicht in Datenbank!";
                        include("views/userManage.php");
                    }else{
                        $user=$user;
                        include("views/userManage.php");
                    }
            }elseif($_REQUEST['choose']=="name"){
                $name=$_REQUEST['search'];
                $user=$userDAO->readbyName($name);
                    if($user==NULL){
                        $user="Der Benutzer ist nicht in Datenbank!";
                        include("views/userManage.php");
                    }else{
                        $user=$user;
                        include("views/userManage.php");
                    }
            }elseif($_REQUEST['choose']=="secondname"){
                $secondname=$_REQUEST['search'];
                $user=$userDAO->readbySecondname($secondname);
                    if($user==NULL){
                        $user="Der Benutzer ist nicht in Datenbank!";
                         include("views/userManage.php");
                    }else{
                        $user=$user;
                        include("views/userManage.php");
                    }
            }
}elseif(empty($_REQUEST['search'])){
    $meldung1="Bitte fühelen Sie alle Felder aus";
       
    include("views/userManage.php");
}else{
    $user="Fehler!";
    include("views/userManage.php");
}

?>

 