
<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../JS/keycloak.js"></script>

<?php
session_start();
include '../Database/kk.php';
// Logout on Keycloak !
$KKConn = new KKConnector();
$KKConn->logoutEvent($_SESSION["uInform"]["uID"]);

// Benachrichtigung
echo "<script> alert('Schönen Tag noch ".$_SESSION["uInform"]["uVName"]." !'); </script>";

// Session destroy und Weiterleitung
session_destroy();
echo "<script> location.href='http://localhost/CRYBOT/Feautures/public/info.php'; </script>";
?>
