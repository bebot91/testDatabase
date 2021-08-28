<?php
// Start the PHP session
if(!isset($_SESSION)) {
session_start();}

?>

<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style5.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">
<script type="text/javascript" src="../../Include/JS/jquery-3.6.0.js"></script>



<?php
      include '../../Include/database/DBConnector.php';
      include '../../Include/database/kk.php';
      include '../../Include/PHP/loginEvent.php';  
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
    <button class='button button1'; id="index_link"; onclick="openIndex()">Account Management</button>
    <?php
        $DbConn = new DBConnector();
          $DbConn->get_MENUEBUTTON('main');

      ?>

    </ul>
  </nav>
  <article>
    <?php
        echo "<h1>Willkommen ".$_SESSION["uInform"]["uVName"]."</h1>";
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
<script>
          document.addEventListener('DOMContentLoaded', () => {
            var y = document.getElementById("index_link");
            y.addEventListener("click", openIndex);
          });

          function openIndex() {
            let height = window.screen.availHeight-400;
            let width = window.screen.availWidth-750;
            window.open("http://localhost:8180/auth/realms/CRYBOT/account",'_blank', 'width=${width},height=${height}'); //.focus();
          }
</script>
</html>



