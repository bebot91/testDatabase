<?php

$_SESSION["token"]= $_POST["token"];
$_SESSION["rtoken"]= $_POST["rtoken"];
session_write_close( );
?>