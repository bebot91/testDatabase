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
      include '../../Include/database/kk.php';
      // Loggen des Events "Pagechange"
      $DbConn = new DBConnector();
			$DbConn->getPublicSession('CHANGE PG ANMELDEN');
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
    Why don't u come in ?
    <img src="../../Include/IMG/19780831.webp" alt="" class="imgbar">

  </article>
  <nav>
    <ul>
    <?php
    $DbConn = new DBConnector();
    echo "<button class='button button1'; onclick= location.href='http://localhost/CRYBOT/Feautures/private/login.php'; >Login</button>";
			$DbConn->get_MENUEBUTTON('anmelden');
      ?>
    </ul>
  </nav>
  <article>
  <form class="frms">
        <fieldset><legend>Login</legend>
        <fieldset><legend>Grundinformation</legend>
            <input type="text" class="half" text="Vorname"value="Vorname">
            <input type="text" class="half" text="Nachname"value="Nachname">
            Geburtsdatum: <input type="date" name="Geburtsdatum" class = "full"
            value="2000-01-01"
            min="1920-01-01" 
            max="2005-12-31"
            ><br>


        </fieldset>
        <fieldset><legend>Adresse</legend>
            <input type="text"class="half" text="Strasse"value="Strasse">
            <input type="text"class="half" text="Ort"value="Ort">
        </fieldset>
        <fieldset><legend>Account</legend>
            <input type="email"class="half"value="Mailadresse"><br></br></br>
            Passwort: <br>
            <input type="password"class="half"value="password"><br></br></br>
            Passwort wiederholen: <br>
            <input type="password"class="half"value="password">
            <input type="text" class="half" text="secgen"value="code">
          </fieldset>
          <br>
          <input type="submit" class="submit">
        </form>


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