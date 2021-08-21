

   <?php


    if (!array_key_exists('appState',$_SESSION)){
      echo "<script type='text/javascript'> initKeycloak();</script>";
      $_SESSION["appState"]= 0;
    }         

         // Userdaten abrufen

            $KKConn = new KKConnector();
            $userData = $KKConn->getUserbyToken($_SESSION["token"]);



         // Wenn ein Fehler beim laden der Userdaten passiert ...
         if (array_key_exists("error", $userData)){
            session_destroy();
            header('Refresh: 0.1; url=Welcome.php');

            // Wird erneut versucht die Seite zu laden, wobei erneut versucht wird die UD's zu laden
            if ($_SESSION["appState"] == 2){

               // Wenn dies mehrmals nicht gelingt wird der USer ausgeloggt.
              session_destroy();
              header("Location: http://localhost/index.php");
              die();
            }
            $_SESSION["appState"] += 1;
         } 
         
         // Wenn kein Fehler passiert werden die grundlegenden USerdaten in den Sessionstorage geladen...
         else {
            $_SESSION["appState"] = 0;
            $array = array(
                "uID" =>    $userData["sub"],
                "uVName" => $userData["given_name"],
                "uNName" => $userData["family_name"],
                "uMail" =>  $userData["email"],
            );
            $_SESSION["uInform"] = $array;
         }

      ?>
