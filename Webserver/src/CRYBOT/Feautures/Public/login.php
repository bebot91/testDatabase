<?php
// Start the PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style5.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">
<?php

      include '../../Include/database/DBConnector.php';

      // Loggen des Events "Pagechange"
      $DbConn = new DBConnector();
			$DbConn->getPublicSession('CHANGE PG LOGIN');
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
    Get Access today ;D
    <img src="../../Include/IMG/19780831.webp" alt="" class="imgbar">

  </article>
  <nav>
    <ul>
    <ul>
    <?php
      $DbConn = new DBConnector();
      echo "<button class='button button1'; onclick= location.href='http://localhost:8080/CRYBOT/Feautures/private/login.php'; >Login</button>";
			$DbConn->get_MENUEBUTTON('login');
    ?>
    </ul>
    </ul>
  </nav>
  <article>

    <p>
        <form class="frms" action="../../Include/PHP/loginEvent.php" method="post">
        <fieldset><legend>Login</legend>
            Email:    <br/><input name="login" type="text"     class="form-control"><br><br/>
            Passwort: <br/><input name="passw" type="password" class="form-control"><br><br/>
            <input type="submit" class="submit" class="form-control">
        </form>
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