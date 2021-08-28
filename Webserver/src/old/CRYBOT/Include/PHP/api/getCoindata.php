<?php
function getCoindata ( $idSys , $cName ) {
    $curl = curl_init();
    $service_url = '172.104.234.105:8083/coindata/'.$idSys.'/'.$cName;
    curl_setopt_array($curl, array(
      CURLOPT_URL => $service_url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_USERPWD => 'user:xdx158'
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
    $decoded = json_decode($response,true);
    return  $decoded;

  }
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $uri = explode( '/', $uri );

  if (!isset($uri[6]) or !isset($uri[7])){
    $data = getCoindata(0,'');
    $datarow1 = array(
        "0"
    );
}
else {
    $data = getCoindata($uri[6],$uri[7]);
    $datarow1 = array();
    for ($x = 0; $x <= count($data[1][0])-1; $x++) { 
        array_push($datarow1, (string) $data[1][0][$x]);
      }
}



$array = array(
    "datarow1" => $datarow1,
    "uri" => null 
);

echo json_encode($array);






?>