
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../CSS/settings.css">

<body>
<div style="overflow-y: scroll; height:93%;">
<table>
  <tbody>
    <tr>
    <form class="frms" method="post">
    <fieldset><legend>LOGIN INFORMATIONEN</legend>
    <br>
    Kontrollieren Sie Ihre Daten, oder halten Sie uns über Ihre Situation auf dem Laufenden...
    <br>
    <br>
    <input type="submit" name="button2"  class="submit" value="Ansehen / Bearbeiten" >
    <br>
      <br>
            <?php
              if(array_key_exists('button2', $_POST)) {
                  $newToken = $tokenHandler->refreshToken($_SESSION["rtoken"]);
                  $_SESSION["rtoken"] = $newToken["refresh_token"];
                  $_SESSION["token"] = $newToken["access_token"];
                  button2();
              }
              function button2() {
                include '../../Include/PHP/formLogin.php';
              }
            ?>
    </fieldset>
    </form>
    </tr>
    <br>
    <tr>
    <form class="frms" method="post">
    <fieldset><legend>TELEGRAM NOTIFICATION</legend>
    <br>
      Mit dem Dienst Telegram Notifications werden Sie laufend auf dem neuesten Stand
      gehalten und können bequem von unterwegs Daten abfragen.
      <br>
      <br>
      <form class="frms">
      <input type="submit" name="button1"  class="submit" value="Aktivieren / Bearbeiten" >
      <br>
      <br>
            <?php
              if(array_key_exists('buttonTaction', $_POST)) {
                $DbConn->deleteTelegramUser($_SESSION["uInform"]["uID"]); 
                echo "<script>alert('Der Telegram-Client wurde entfernt');</script>";
              }


              if(array_key_exists('button1', $_POST)) {
                  $newToken = $tokenHandler->refreshToken($_SESSION["rtoken"]);
                  $_SESSION["rtoken"] = $newToken["refresh_token"];
                  $_SESSION["token"] = $newToken["access_token"];
                  $tData =    $DbConn->getTelegramUser($_SESSION["uInform"]["uID"]);  

              if ($tData[0]["Aktiv"] < 0){    
                    $tData =    $DbConn->generateNewTelegramUser($_SESSION["uInform"]["uID"]);   
                    telegramInit($tData);
                  } 
              else if ($tData[0]["Aktiv"] == 1){
                    telegramShow($tData);
                  }
              }
              function telegramInit( $tData ) {
                echo "Um den Bot zu aktivieren, senden Sie folgende Nachricht an den Bot ...";
                echo "<br><br>";
                echo "<label for=''></label><input type='text' name='land' value='"."/init ".$tData[0]["Secret"]."' readonly>";
              }
              function telegramShow( $tData ) {
                echo "<br><br>";
                echo "<fieldset>";
                echo "<button  type='button' name='status'  style='border-radius: 20%;padding: 10px; background-color: #4CAF50;'>Aktiv</button>";
                echo "<button  type='button' name='status'  style='border-radius: 20%;padding: 10px; background-color: #4CAF50;'>Telegram-Client</button>";
                echo "<button  type='button' name='status'  style='border-radius: 10%;padding: 10px; background-color: #4CAF50;'>Initialisiert: ".$tData[0]["GueltigVon"]."</button>";
                echo "<button  type='button' name='status'  style='border-radius: 10%;padding: 10px; background-color: #4CAF50;'>Letzte Aktivität: ".$tData[0]["LastDate"]."</button>";
                echo "</fieldset>";
                echo "<br><br>";
                echo "<input type='submit' name='buttonTaction'  class='submit' value='Inaktiv Setzen / Entfernen' >";

              }
            ?>



        </form>

      </fieldset>
      </form>
    </tr>

  </tbody>
</table>

<html>
<body >

</body>
</html>


</div>
  </body>
</html>