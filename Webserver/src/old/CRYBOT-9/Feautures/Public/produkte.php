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
<link rel="stylesheet" href="../../Include/CSS/table.css">


<?php
      include '../../Include/database/DBConnector.php';
  
      // Loggen des Events "Pagechange"
      $DbConn = new DBConnector();
			$DbConn->getPublicSession('CHANGE PG PRODUCTS');
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
    Oure Product's where hot AF !!!
    <img src="../../Include/IMG/21787859.webp" alt="" class="imgbar">

  </article>
  <nav>
    <ul>
    <?php
    $DbConn = new DBConnector();
    echo "<button class='button button1'; onclick= location.href='http://localhost/CRYBOT/Feautures/private/lev.php'; >Login</button>";
			$DbConn->get_MENUEBUTTON('products');
      ?>
    </ul>
  </nav>
  <article>
    <h1>London</h1>
    <p>Crybot is a new products ...
    </p>

    <?php
      // Importiere die Headerbar
      //include '../../Include/PHP/chartslist.php';
    ?>

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