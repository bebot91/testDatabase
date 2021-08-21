
<?php

include 'KKInformation.php';

class KKConnector {

  
    public function __construct(){
 
    }
     


    public function getTokenbyUser( $uname , $passw  ){
            $KKInfo = new KKInformation;

            //next example will insert new conversation
            $service_url = $KKInfo->getRootpath().$KKInfo->getPort().'/auth/realms/'.$KKInfo->getRealm().'/protocol/openid-connect/token';
            $curl = curl_init($service_url);
            $curl_post_data = array(
                    'grant_type' => 'password',
                    'client_id' => $KKInfo->getClient(),
                    'username' => $uname ,   // 'crybottest'
                    'password' => $passw    // 'lorwhsou'
            );
            $data_string = http_build_query( $curl_post_data );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                $KKInfo->getContenttype()
              ));
            $curl_response = curl_exec($curl);
            if ($curl_response === false) {

                $info = curl_getinfo($curl);
                curl_close($curl);
                die('error occured during curl exec. Additioanl info: ' . var_export($info));
            }
            curl_close($curl);
            $decoded = json_decode($curl_response,true);
            if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                die('error occured: ' . $decoded->response->errormessage);
            }
            return $decoded;       
    }

    public function getUserbyToken( $Token){

            $KKInfo = new KKInformation;

            //next example will insert new conversation
            $authorization = "Authorization: Bearer ".$Token;
            $service_url = $KKInfo->getRootpath().$KKInfo->getPort().'/auth/realms/'.$KKInfo->getRealm().'/protocol/openid-connect/userinfo';
            $curl = curl_init($service_url);
            $curl_post_data = array();
            $data_string = http_build_query( $curl_post_data );
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET' );
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            $KKInfo->getContenttype(),
              $authorization
              ));

              $curl_response = curl_exec($curl);
              if ($curl_response === false) {
                  $info = curl_getinfo($curl);
                  curl_close($curl);
                  $_SESSION["sessState"]=0;
                  die('error occured during curl exec. Additioanl info: ' . var_export($info));
                  echo 'error CONN';
              }
              curl_close($curl);
              $decoded = json_decode($curl_response,true);
              if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
                  $_SESSION["sessState"]=0;
                  die('error occured: ' . $decoded->response->errormessage);
                  echo 'error CONN';
                  
              }
            var_dump($decoded);

            return $decoded;

    }

    public function getTokenbyRefToken ( $refToken ){
        $KKInfo = new KKInformation;
        //next example will insert new conversation
        //$service_url = $KKInfo->getRootpath().$KKInfo->getPort().'/auth/realms/'.$KKInfo->getRealm().'/protocol/openid-connect/token';
        //$service_url = 'http://localhost:8080/auth/realms/'.$KKInfo->getRealm().'/protocol/openid-connect/token';
        $service_url = 'http://localhost:8180/auth/realms/CRYBOT/protocol/openid-connect/token';
        echo $service_url;
        echo ".....";
        echo $refToken;
        $curl = curl_init($service_url);
        $curl_post_data = array(
                'grant_type' => 'refresh_token',
                'client_id' => $KKInfo->getClient(),
                'refresh_token' => $refToken
        );
        $data_string = http_build_query( $curl_post_data );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            $KKInfo->getContenttype()
          ));
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($curl);
        ECHO $curl_response;
        $decoded = json_decode($curl_response,true);
        if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
            die('error occured: ' . $decoded->response->errormessage);
        }

        return $decoded;   
    }

}




?>