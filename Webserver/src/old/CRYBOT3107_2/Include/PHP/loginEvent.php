<?php
// Start the PHP session
session_start();
?>

    <?php

        include '../Database/kk.php';     
        include '../Database/DBConnector.php';
        include '../../Include/PHP/loginRefEvent.php';    
        $KKConn = new KKConnector();
        $DbConn = new DBConnector();


        $loginname = $_POST["login"];
        $password  = $_POST["passw"];


        // starte neue session falls keine Session existiert //
        if (!session_id()) 
        {
            $_SESSION["sessState"]=0;
        }

        if ($loginname != null and  $password != null){
            // Login with KK / get Access Token //
            $decoded = $KKConn->getTokenbyUser($loginname,$password);
            // Wenn Login erfolgreich setze sessState = 1 //
            if (array_key_exists('access_token',$decoded)){
                $_SESSION["sessToken"]=$decoded['access_token'];
                $_SESSION["sessRefresh"]=$decoded['refresh_token'];
                $_SESSION["sessState"]=1;

            }
        }


        // Falls Login Inkorrekt Abbruch und Callout 
        // Falls Login Korrekt Schreiben der Variabeln und laden Daten aus DB
        if ($_SESSION["sessState"] == 0){

            echo '<script language="javascript">';
            echo 'alert("Logininformation fehlerhaft");';
            echo 'window.location = "http://localhost/CRYBOT/Feautures/public/login.php";';
            echo '</script>';

			$DbConn->getPublicSession('ERROR LOGIN');
            session_destroy();

        } else {
            $userInfo = $KKConn->getUserbyToken();

            if ($_SESSION["sessState"] == 1 and !array_key_exists('error',$userInfo)){

                $_SESSION["uID"]       =$userInfo['sub'];
                $_SESSION["uFirstName"]=$userInfo['given_name'];         
                $_SESSION["uLastName"] =$userInfo['family_name'];    
                $_SESSION["uMail"]     =$userInfo['email'];    
                $_SESSION["uMailVerif"]=$userInfo['email_verified'];   
                $_SESSION["uAgent"]    =$_SERVER['HTTP_USER_AGENT'];


                echo '<script language="javascript">';
                echo 'window.location = "http://localhost/CRYBOT/Feautures/Private/main.php";';
                echo '</script>';
            } else {
                echo '<script language="javascript">';
                echo 'window.location = "http://localhost/CRYBOT/Feautures/public/login.php";';
                echo '</script>';
            }

        }

    ?>