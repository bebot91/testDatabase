<?php
// Start the PHP session
session_destroy();
session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style5.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">

<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>
</head>
    <body onload= initKeycloak();>
</body> 
