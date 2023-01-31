<?php
include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseie </a><a href='index.php?befehl=userUpdate'> Zurück </a> <br> <br>";
$meldung="";
$userDAO= new UserDAO();


if (isset($_REQUEST['submit']) && !empty($_REQUEST['uid']) && !empty($_REQUEST['name']) && !empty($_REQUEST['secondname']) && !empty($_REQUEST['email']) && !empty($_REQUEST['role_id'])){
    $uid=intval($_REQUEST['uid']);
    $name=$_REQUEST['name'];
    $secondname=$_REQUEST['secondname'];
    $email=$_REQUEST['email'];
    $role_id=intval($_REQUEST['role_id']);

    $update=$userDAO->updateUser($name,$secondname,$email,$role_id,$uid);


    $meldung.="Sie haben Daten über den User mit ID : " . $uid." geändert ";
    include("views/allUsers.php");

}
        elseif (isset($_REQUEST['abbrechen'])){

        header("location: index.php?befehl=allUsers");
        exit;
}
    else{
        $meldung.="Fehler! ";
        header("location: index.php?befehl=userManage");
    exit;
}


?>
