<?php
// Start the PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../Include/CSS/style.css">
<link rel="stylesheet" href="../../Include/CSS/style7.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">

<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>


<?php
      include '../../Include/database/DBConnector.php';
      include '../../Include/database/kk.php';
      include '../../Include/PHP/loginRefEvent.php';

      $DbConn = new DBConnector();
      $tokenHandler = new RefreshEvent();
      $newToken = $tokenHandler->refreshToken($_SESSION["rtoken"]);
      $_SESSION["rtoken"] = $newToken["refresh_token"];
      $_SESSION["token"] = $newToken["access_token"];
    ?>

</head>

<body style="background-image: url(../../Include/IMG/back_klein.jpg);">


<section class="dsec1">
</section>

<section class="dsec2">

  <!--START MENU -->
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight" style="width: 256px;">

				<ul class="nav flex-column">
					<img src="../../Include/IMG/skizze2.png" width="183" height="auto" class="d-inline-block align-top" alt="Logo from CryBot">
          <li class="nav-item">

    <button class='button button1'; id="index_link"; onclick="openIndex()">Account Management</button>
    <?php
    $DbConn = new DBConnector();
			$DbConn->get_MENUEBUTTON('main');
      ?>
         </li>
         </ul>
     </aside>

    </div> <!-- END MENU -->

  <div id="colorlib-main">
			<section class="ftco-section pt-4 mb-5 ftco-intro">
				<div class="container-fluid px-3 px-md-0">
					<div class="row">
						<div class="col-md-12 mb-4">
							<h1 class="h2">London</h1>
              <p>This is the Information about CRYBOT
                </p>
					</div>
				</div>
        </div>


</section>
</div>

<script src="../../Include/js/jquery.min.js"></script>
  <script src="../../Include/js/popper.js"></script>
  <script src="../../Include/js/bootstrap.min.js"></script>
  <script src="../../Include/js/main.js"></script>

  </body>

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
