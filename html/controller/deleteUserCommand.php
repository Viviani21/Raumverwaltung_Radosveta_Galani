<?php
include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/LoginCheck.php");
LoginCheck::activitätCheck();

$delete="";
$meldung="";
$meldung1="";
$user="";
$userList="";
$link = "<a href='index.php?befehl=logout' title='Logout' > Logout </a><a href='index.php?befehl=adminMenu'> Startseite </a>";
$userDAO= new UserDAO();

if (isset($_REQUEST['abbrechen'])){
    header("location: index.php?befehl=allUsers");
    exit;
}

elseif (isset($_REQUEST['delete']) && !empty($_REQUEST['uid']) && !empty($_REQUEST['name']) && !empty($_REQUEST['secondname']) && !empty($_REQUEST['email'])){
    $uid=intval($_REQUEST['uid']);
    $name=$_REQUEST['name'];
    $secondname=($_REQUEST['secondname']);
    $email=($_REQUEST['email']);

    $delete=$userDAO->delete($uid);
    $delete.="Sie haben  " .$name. " ". $secondname. " mit Email oder Benutzername : " ." ". $email . " und ID: ". " ".  $uid. " gelöscht ";
    include("views/userManage.php");
}else{
        $meldung.="Fehler! ";
        include("views/userManage.php");
}


?>
