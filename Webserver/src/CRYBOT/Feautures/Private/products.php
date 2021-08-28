<?php
// Start the PHP session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../Include/CSS/style.css">
<link rel="stylesheet" href="../../Include/CSS/style5.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">

<script src='https://cdn.plot.ly/plotly-latest.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



<script>
            $(document).ready(function() {
                $('#coinTable').DataTable();
            } );
</script>

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
    <div style="overflow-y: scroll; height:93%; max-height: 600px;">

        <table id="coinTable" class="productRow">
        <thead>
                    <tr>
                        <th>Coin</th>
                        <th>Wert </th>
                        <th>Kurs 1</th>
                        <th>Kurs 2</th>
                        <th>Börse</th>
                        <th>Statistic</th>
                    </tr>
          </thead>
          <tbody>
          <?php

          $Coindata  = $DbConn->get_Coindata('main');
            for ($x = 0; $x <= count($Coindata)-1; $x++) {

              echo "<tr     style='background-color: #f1dc85;'>";
                echo "<td><div style='float:left;'>".$Coindata[$x]["KursBez"]."</div> </td> ";
                echo "<td><div style='float:left;' id='actvalue".$x."'>USDT</div> </td> ";
                echo "<td><div style='float:left;'>".$Coindata[$x]["iroot"]."</div> </td> ";
                echo "<td><div style='float:left;'>".$Coindata[$x]["icall"]."</div> </td> ";
                echo "<td><div style='float:left;'>".$Coindata[$x]["ID_System"]."</div> </td> ";
                echo "<td><div id='chart".$x."' style='float:left;'></div></td>";
              echo "</tr>";


              echo "
              <script>

              function rand() {
                return Math.random();
              }



              $(document).ready(function(){
                TESTER = document.getElementById('tester');

                var data = [
                  {
                    x: [],
                    y: [],
                    type: 'scatter'
                  }
                ];
                var layout = {
                  autosize: false,
                  showlegend: false,
                  showgrid: false,
                  showline: false,
                  width: 150,
                  height: 140,
                  margin: {
                    l: 8,
                    r: 8,
                    b: 8,
                    t: 8,
                    pad: 10
                  },
                  paper_bgcolor: '#d6bb4c',
                  plot_bgcolor: '#97812C'
                };

                  Plotly.newPlot('chart".$x."', data, layout);


                  var cnt = 0;
                  var interval = setInterval(function() {
                    $.get( 'http://localhost:8080/CRYBOT/Include/PHP/api/getCoindata.php/".$Coindata[$x]["ID_System"]."/".$Coindata[$x]["KursBez"]."', function( data ) {
                      var datas = JSON.parse(data);
                      console.log(datas);
                      var d2 = new Array();
                      var d1 = new Array();

                      for (var i = 20; i > 0 ; i -- ){

                        d2.push(datas.datarow1[i]);
                        d1.push(i);
                    }
                    document.getElementById('actvalue".$x."').innerHTML = 'USDT: ' + datas.datarow1[0];
                    Plotly.update('chart".$x."', {
                      y:        [d2],
                      x:        [d1]

                    }, [0])

                    });

                    if(++cnt === 100) clearInterval(interval);
                  }, 1100);


              });

              </script>
              ";





            }



            ?>
                      </tbody>
        </table>



<script></script>

  </div>
  </div>
  </article>


</section>
</div>


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
