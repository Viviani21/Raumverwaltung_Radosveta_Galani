<?php

include("mapper/MySQLDatabase.php");
include("mapper/UserDAO.php");
include("model/User.php");
include("mapper/RoleDAO.php");
include("model/Role.php");

$meldung="";

$userDAO= new UserDAO();
$roleDAO = new RoleDAO();

if(isset($_POST['button']) && empty($_POST['email']) && empty($_POST['password'])) {
	$meldung .= " Sie konnten nicht angemeldet werden. Bitte E-mail und Password eingeben!<br>";
		include("views/login.php");
}
elseif (isset($_POST['button']) && (empty($_POST['email']) ||  empty($_POST['password']))) {
	$meldung .= " Sie konnten nicht angemeldet werden. Bitte E-mail und Password eingeben!<br>";
		include("views/login.php");

}
elseif(isset($_POST['button']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

	$user=$userDAO->checkUser($email);

	if ($user !== NULL){
		$hash = $user->getPassword();

		if (password_verify($password,$hash)) {
			session_start();

			$_SESSION['user'] = $user->getName();
			$_SESSION['userID']=$user->getID();
			$_SESSION['rights']=$user->getRole_id();
			$role_id=$_SESSION['rights'];
			$_SESSION['LAST-LOGIN-TIMESTAMP']=time();

			if ($_SESSION['rights']==3){
				$_SESSION['rights']=$roleDAO->read($role_id)->getPosition();
				header('Location: index.php?befehl=adminMenu');
				exit;

			}elseif($_SESSION['rights']==2){
				$_SESSION['rights']=$roleDAO->readPosition($role_id);
				header('Location: index.php?befehl=userMenu');
				exit;

			}elseif ($_SESSION['rights']==1){
				$_SESSION['rights']=$roleDAO->read($role_id)->getPosition();
				header('Location: index.php?befehl=gastMenu');
				exit;
			} else {
				$meldung .= " Sie konnten nicht angemeldet werden. !<br>";
		  	include("views/login.php");
			}
		} else {
			$meldung .= " Sie konnten nicht angemeldet werden. !<br>";
	  	include("views/login.php");
		}
  }
	else{
		$meldung .= " Sie konnten nicht angemeldet werden. !<br>";
  	include("views/login.php");
	}
}

?>
