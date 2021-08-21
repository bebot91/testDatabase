

<?php

include 'DBInformation.php';

class DBConnector {
  
  public function __construct(){

  }
  
public function   generateNewTelegramUser ( $userID ){
    $DbInfo = new DBInformation;
    $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());

    $randomNumber = rand (  1111111 ,  9999999 );
    $intActMoment = date("Ymd");
    $secretNumber = strval($randomNumber).strval($intActMoment);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  
      }

      $result = $conn->query(" call User.sps_IN_newTelegramUser('".$userID."','".hash('ripemd160', $secretNumber)."','".$_SERVER['REMOTE_ADDR']."','"."NO BROWSER"."'); ");
      $tData = array();
      while($row = $result->fetch_assoc()) {
          $array = array("Secret" => $row["Secret"],
                         "Art" => $row["Art"],
                         "GueltigVon" =>   $row["GueltigVon"]
                        );
          array_push($tData, $array );
          }
      return $tData ;
  }
  

  public function getTelegramUser ( $userID ) {
    $DbInfo = new DBInformation;
    $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  
      }
  $result = $conn->query(" call User.sps_GET_TelegramAccount('".$userID."'); ");

  $tData = array();
  while($row = $result->fetch_assoc()) {
  $array = array("Aktiv" => $row["Aktiv"],
                  "Art" =>  $row["Art"],
                  "Verwendung" =>  $row["Verwendung"],
                  "GueltigVon" =>  $row["DatumErstellt"],
                  "LastDate" =>    $row["LastDate"]
                );

  array_push($tData, $array );
              }
  return $tData ;

}

public function deleteTelegramUser ( $userID ) {
      $DbInfo = new DBInformation;
      $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());
      
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "erg";
        }
        $conn->query(" call User.sps_TD_TelegramAccount('".$userID."'); ");
}



  public function loginUser( $userID ){
    $DbInfo = new DBInformation;
    $conn = new mysqli($DbInfo->getServername(),$DbInfo->getUsername(),$DbInfo->getPassword(),$DbInfo->getDbName());
    
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  
      }
      $result = $conn->query(" call User.sps_GET_LOGIN('".$userID."','".$_SERVER['REMOTE_ADDR']."','"."NO BROWSER"."'); ");

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