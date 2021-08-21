
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="CRYBOT/Include/CSS/style5.css">
<link rel="stylesheet" href="CRYBOT/Include/CSS/slider.css">
<link rel="stylesheet" href="CRYBOT/Include/CSS/table.css">


<script>"sessionStorage.clear();"</script>

<?php
      include 'CRYBOT/Include/database/DBConnector.php';
    ?>

</head >
  <body style="background-image: url(CRYBOT/Include/IMG/bg.jpg);">
  <header>
</header>

<section class="dsec1">
<img src="CRYBOT/Include/IMG/skizze2.png" alt="" class="imglogo">

    <label class="switch">
  <input type="checkbox">
  <span class="slider"></span>
</label>

</section>


<section class="dsec2">


  <nav class="nhead">
    hello Test
  </nav>
  <article class="ahead">
    articlefoot
  </article> 
  <article class="bar">
    This is how trading feels like today ... ;D
    <img src="CRYBOT/Include/IMG/25117045.webp" alt="" class="imgbar">



  </article>
  <nav>
    <ul>
    <?php
      $DbConn = new DBConnector();
      echo "<button class='button button1'; onclick= location.href='http://localhost/CRYBOT/Feautures/private/lev.php'; >Login</button>";
			$DbConn->get_MENUEBUTTON('index');

    ?>
    </ul>
  </nav>

  <article class="centr">
    <h1>London</h1>
      <caption>
      <p >London is the capital city of England. It is the most populous city in the  United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>
      <p >Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.
      Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.
      Standing on the River Thames, London has been a major settlement for two millennia, its history going back to its founding by the Romans, who named it Londinium.

      </p>
      </caption>
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