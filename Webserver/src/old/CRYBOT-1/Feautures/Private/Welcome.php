<?php
if (!isset($_SESSION)){
  session_start();
}
?>


<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style7.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">
<script type="text/javascript" src="../../Include/JS/jquery-3.6.0.js"></script>
<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script>


console.log(sessionStorage.getItem('token'));     
console.log(sessionStorage.getItem('rtoken'));
var emp1 = {};
var xhttp = new XMLHttpRequest();
emp1.id = 1;
emp1.token = sessionStorage.getItem('token'); 
emp1.rtoken = sessionStorage.getItem('rtoken'); 
$.ajax({

url:"../../Include/PHP/readJson.php",
method: "post",
data: emp1,
success: function(res){
    console.log(res);
}
})
</script>
<?php
      include '../../Include/database/DBConnector.php';
      include '../../Include/database/kk.php';


      // Loggen des PAgechanges
      if (!array_key_exists('appState',$_SESSION)){

        echo "<script src='http://localhost:8180/auth/js/keycloak.js'></script>";
        echo "<script type='text/javascript'> initKeycloak();</script>";
        $_SESSION["appState"]= 0;
      }       
      sleep (1) ;
          //echo $_SESSION["token"];
          //echo $_SESSION["appState"];
           // Userdaten abrufen
           $KKConn = new KKConnector();
           $userData = $KKConn->getUserbyToken($_SESSION["token"]);
           var_dump($userData);
           // Wenn ein Fehler beim laden der Userdaten passiert ...
           if (array_key_exists("error", $userData)){
              //header('Refresh: 0.1; url=Welcome.php');
              echo "  <script> location.reload(); </script>";

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

      $DbConn = new DBConnector();
			$DbConn->getPublicSession('CHANGE PG WELCOME');
          ?>
</head>


  <body style="background-image: url(../../Include/IMG/bg.jpg);">
  <header>
</header>

<?php
      // Importiere die Headerbar
      include '../header/headerbar.php';

    ?>

<section class="dsec2">
  <nav class="nhead">
    hello Test
  </nav>
  <article class="ahead">
    articlefoot
  </article> 
  <article class="bar">
    This is how trading feels like today ... ;D
    <img src="../../Include/IMG/25117045.webp" alt="" class="imgbar">
  </article>
  <nav>
    <ul>
    <?php
    $DbConn = new DBConnector();
			$DbConn->get_MENUEBUTTON('main');
      ?>
    </ul>
  </nav>
  <article>

            <?php
                echo "<h1>Welcome ".$_SESSION["uInform"]["uVName"]."</h1>";
              ?>
    <p>This is the Information about CRYBOT
    </p>
  </article>
  <nav class="nfoot">
    hello Test
  </nav>
  <article class="afoot">
    articlefoot
  </article> 
</section>

<footer>
  <p>Footer</p>
</footer>
  </body>
  <script>


            console.log(sessionStorage.getItem('token'));     
            console.log(sessionStorage.getItem('rtoken'));
            var emp1 = {};
            var xhttp = new XMLHttpRequest();
            emp1.id = 1;
            emp1.token = sessionStorage.getItem('token'); 
            emp1.rtoken = sessionStorage.getItem('rtoken'); 
            $.ajax({

            url:"../../Include/PHP/readJson.php",
            method: "post",
            data: emp1,
            success: function(res){
                console.log(res);
            }
            })
    </script>
</html>



