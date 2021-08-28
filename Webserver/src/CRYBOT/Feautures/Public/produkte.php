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
    echo "<button class='button button1'; onclick= location.href='http://localhost:8080/CRYBOT/Feautures/private/login.php'; >Login</button>";
			$DbConn->get_MENUEBUTTON('products');
      ?>
    </ul>
  </nav>
  <article>
  <div style="overflow-y: scroll; height:93%; max-height: 600px;">
    <h1>Produkte</h1>
    <h2>Cryptofonds</h2>
    <p>Crybot is a new products ...</p>
    <h2>Bot Trading</h2>
    <p>Crybot is a new products ...</p> 
    <h2>Direktkauf</h2>
    <p>Folgende Produkte sind Aktuell verfügbar</p> 
    <div style="overflow-y: scroll; height:93%; width:99%; max-height: 600px;">

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

              echo "<tr     style='background-color: #042347;'>";
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
                  paper_bgcolor: '#755C86',
                  plot_bgcolor: '#6600CC'
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