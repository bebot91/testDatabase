
   <?php

        class ChartCard {
        
            public function __construct(){
        
            }

            public function getChartCard ( $Coinvalues ){

                //var_dump($Coinvalues);

                echo "<table class='chart'>"; 
                echo "<tbody>"; 
                echo "<tr><td>"; 
                echo "<div class='chart'>  ";
                    echo "<button class = 'chart'>  ";
                    echo "Dies ist ein Kurs der ausgegeben wird";
                    echo "</td>"; 

                    echo "<td>"; 
                    echo "<div class='chart'>  ";
                        echo "<button class = 'chart1'>  ";
                        echo "Dies ist ein Kurs der ausgegeben wird";
                        echo "</td>"; 
    

                echo "</tr>"; 
                echo "</div>  ";
                echo "</tbody>"; 
                echo "</table>";
            }
        }
    ?>
