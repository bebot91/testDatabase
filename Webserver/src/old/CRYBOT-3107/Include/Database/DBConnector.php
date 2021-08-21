

<?php

include 'DBInformation.php';

class DBConnector {
  
  public function __construct(){

  }
  

public function get_MENUEBUTTON ( $Herkunft ){
  $DbInfo = new DBInformation;
  $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "erg";
    }
    $result = $conn->query(" call User.sps_GET_MENUEBUTTON('".$Herkunft."'); ");


      while($row = $result->fetch_assoc()) {
        echo "<button class='button button1'; onclick=location.href='".$row["Link"]."';>".$row["Bezeichnung"]."</button>";
        }

      }



  public function getPublicSession( $var ){
    $DbInfo = new DBInformation;
    $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      echo "erg";
      }
      $conn->query(" call User.sps_IN_PublicSession('"   .$_SERVER['REMOTE_ADDR'].
                                                    "','"."NO BROWSER".
                                                    "','".$var ."'); ");

        }

 
    public function get_Coindata ( $Selection ){
      $DbInfo = new DBInformation;
      $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());
    
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "erg";
        }
        $result = $conn->query(" call User.sps_GET_COINDATA(1); ");
        
        $Coindata = array();
        while($row = $result->fetch_assoc()) {
            $array = array("ID_System" => $row["ID_System"],
                           "KursBez" =>   $row["KursBez"],
                           "iroot" =>     $row["iRoot"],
                           "icall" =>     $row["iCall"],
                           "kp1" =>       $row["k1"],
                           "kp2" =>       $row["k2"],      
                           "kp3" =>       $row["k3"],         
                           "kpL" =>       $row["k"]                
                          );
            array_push($Coindata, $array );
            }
        return $Coindata ;
          }
        }

?>