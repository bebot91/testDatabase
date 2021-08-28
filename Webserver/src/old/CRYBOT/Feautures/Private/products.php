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
<link rel="stylesheet" href="../../Include/CSS/charts.css">
<link rel="stylesheet" href="../../Include/CSS/table.css">



<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
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
    <h1>Custom Scrollbar Example</h1>
    <div style="overflow-y: scroll; height:93%;">

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

              echo "<tr>";
                echo "<td><div style='float:left;'>".$Coindata[$x]["KursBez"]."</div> </td> ";
                echo "<td><div style='float:left;'>12.5</div> </td> ";
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
                  paper_bgcolor: '#755C86',
                  plot_bgcolor: '#6600CC'
                };
              
                  Plotly.newPlot('chart".$x."', data, layout);


                  var cnt = 0;
                  var interval = setInterval(function() {
                    $.get( 'http://localhost:80/CRYBOT/Include/PHP/api/getCoindata.php/".$Coindata[$x]["ID_System"]."/".$Coindata[$x]["KursBez"]."', function( data ) {
                      var datas = JSON.parse(data);
                      console.log(datas);
                      var d2 = new Array();
                      var d1 = new Array();

                      for (var i = 0; i < 20 ; i ++ ){
                        
                        d2.push(datas.datarow1[i]);
                        d1.push(i);
                    }

                    Plotly.update('chart".$x."', {
                      y:        [d2],
                      x:        [d1]

                    }, [0])
                    
                    });

                    if(++cnt === 100) clearInterval(interval);
                  }, 900);


              });
              
              </script>
              ";





            }


            //<div style="width:60%;">
            //<canvas id="myChart5"></canvas>
            //<script src="../../Include/JS/chart.js"> </script>
            //</div>



            ?>
                      </tbody>
        </table>



<script></script>

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

