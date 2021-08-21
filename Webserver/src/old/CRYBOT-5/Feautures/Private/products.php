<?php
// Start the PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style7.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/charts.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">



<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>


<?php
      include '../../Include/database/DBConnector.php';
      include '../../Include/database/kk.php';
      include '../../Include/PHP/loginRefEvent.php';    
      include '../../Include/PHP/charts.php';
      
      $DbConn = new DBConnector();
      $tokenHandler = new RefreshEvent();
      $newToken = $tokenHandler->refreshToken($_SESSION["rtoken"]);
      $_SESSION["rtoken"] = $newToken["refresh_token"];
      $_SESSION["token"] = $newToken["access_token"];
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
    <h1>Custom Scrollbar Example</h1>
    <div style="overflow-y: scroll; height:93%;">

        <table class="productRow">
          <?php

          $Coindata  = $DbConn->get_Coindata('main'); 
          $Chart= new ChartCard();
            for ($x = 0; $x <= count($Coindata)-1; $x++) {
              echo "<tr><td>".$Chart->getChartCard($Coindata[$x])." </td></tr>";
              
            }
            ?>
        </table>




  </div>
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

