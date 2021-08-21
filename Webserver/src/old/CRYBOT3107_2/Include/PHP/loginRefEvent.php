

    <?php


   class RefreshEvent
   {
    function __construct(){

        }

   public function refreshToken( $token ){
            $KKConn = new KKConnector();
            $DbConn = new DBConnector();
            $decoded = array();
            $decoded = $KKConn->getTokenbyRefToken($token);

            if (array_key_exists("error", $decoded)){
                // Fehler Token inaktiv ...
                $KKConn->logoutEvent($_SESSION["uInform"]["uID"]);
                session_destroy();
                echo '<script language="javascript">';
                echo 'alert("Logout");';
                echo 'window.location = "http://localhost/index.php";';
                echo '</script>';
            } 
            return $decoded;

        }
        
    public function checkToken( $foreward ){
        $KKConn = new KKConnector();
        $DbConn = new DBConnector();

        // Check if Token is still Active 
        $userInfo = $KKConn->getUserbyToken();

        if (array_key_exists("error", $userInfo)){
                $KKConn->logoutEvent($_SESSION["uInform"]["uID"]);
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

