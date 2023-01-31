<?php


	if(isset($_REQUEST['befehl'])){
		$cmd = $_REQUEST['befehl'];
		if(file_exists("controller/" . $cmd . "Command.php")){
			include("controller/" . $cmd . "Command.php");
		}
		else{
			include("controller/loginCommand.php");
		}
	}
	else{
		include("controller/loginCommand.php");
	}
?>
