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


<script>"sessionStorage.clear();"</script>

<?php
      include '../../Include/database/DBConnector.php';
      // Loggen des Events "Pagechange"
      $DbConn = new DBConnector();
			$DbConn->getPublicSession('CHANGE PG INFO');
    ?>

</head >

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

          <?php
      $DbConn = new DBConnector();
      echo "<button class='button button1'; onclick= location.href='http://localhost:8080/CRYBOT/Feautures/private/login.php'; >Login</button>";


			$DbConn->get_MENUEBUTTON('info');
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
</html>