<?php
session_start();

class LoginCheck {

    public static function activitätCheck() {
        if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            if ((time()-$_SESSION['LAST-LOGIN-TIMESTAMP'])>12000){
                $meldung="";
                header("Location: index.php?befehl=logout");
                exit;
             }
                else {
                    $_SESSION['LAST-LOGIN-TIMESTAMP'] = time();
                }
        }
        else {
            $meldung="";
            include("views/login.php");
        }
    }
}
?>
