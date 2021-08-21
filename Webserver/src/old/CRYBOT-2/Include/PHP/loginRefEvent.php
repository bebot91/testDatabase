

    <?php


   class RefreshEvent
   {
    function __construct(){

        }

   public function refreshToken( $foreward , $token ){
            $KKConn = new KKConnector();
            $DbConn = new DBConnector();
            echo  $token;
            //$decoded = $KKConn->getUserbyToken();
            $decoded = $KKConn->getTokenbyRefToken($token);

            return $decoded;

        }
        

    public function checkToken( $foreward ){
        $KKConn = new KKConnector();
        $DbConn = new DBConnector();

        // Check if Token is still Active 
        $userInfo = $KKConn->getUserbyToken();

        if (array_key_exists("error", $userInfo)){
            
                // Session Timeout -> Logout
                session_destroy();
                echo '<script language="javascript">';
                echo 'alert("Logout");';
                echo 'window.location = "http://localhost/CRYBOT/Feautures/public/login.php";';
                echo '</script>';
            }
    }

   }

?>

