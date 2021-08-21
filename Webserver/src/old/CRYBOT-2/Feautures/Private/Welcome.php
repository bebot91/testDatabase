<?php
// Start the PHP session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style7.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">

<script src="keycloak:8080/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>





<?php
      include '../../Include/database/DBConnector.php';
      include '../../Include/database/kk.php';
      include '../../Include/PHP/loginRefEvent.php';    

      $DbConn = new DBConnector();
      $tokenHandler = new RefreshEvent();
      // Loggen des Events "Pagechange"

      //$tokenHandler->refreshToken("http://localhost/CRYBOT/Feautures/private/main.php");
			//$DbConn->getPublicSession('CHANGE PG INFO');
    ?>



</head>
  <body   style="background-image: url(../../Include/IMG/bg.jpg);">
    <?php


    if (!array_key_exists('appState',$_SESSION)){
      echo "<script type='text/javascript'> initKeycloak();</script>";
      $_SESSION["appState"]= 0;
    }         






    $array = array(
              "uVName" => "Reto",
              "uNName" => "Bolliger",
              "uMail"  => "retobolliger@gmx.ch",
              "uID"    => "1233456457"
          );

         $_SESSION["uInform"]=$array;
         $_SESSION["sessToken"]="<script>document.writeln(sessionStorage.getItem('token'));</script>";
         $_SESSION["sessRefresh"]="<script>document.writeln(sessionStorage.getItem('rtoken'));</script>";
          


         $KKConn = new KKConnector();
         //$KKConn->getTokenbyRefToken($_SESSION["sessRefresh"]);
         $KKConn->getUserbyToken($_SESSION["sessToken"]);


         var_dump($_SESSION["uInform"]);
      ?>
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
    <h1>London</h1>
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
</html>
