<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head >
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<link rel="stylesheet" href="../../Include/CSS/style5.css">
<link rel="stylesheet" href="../../Include/CSS/slider.css">
<script type="text/javascript" src="../../Include/JS/jquery-3.6.0.js"></script>
<script src="http://localhost:8180/auth/js/keycloak.js"></script>
<script src="../../Include/JS/keycloak.js"></script>
</head>
    <body onload= initKeycloak();>
        <header onload= ajax();></header>

</body> 
<script>


console.log(sessionStorage.getItem('token'));     
console.log(sessionStorage.getItem('rtoken'));
var emp1 = {};
var xhttp = new XMLHttpRequest();
emp1.id = 1;
emp1.token = sessionStorage.getItem('token'); 
emp1.rtoken = sessionStorage.getItem('rtoken'); 




$.ajax({
url:"../../Include/PHP/readJson.php",
method: "post",
data: emp1,
success: function(res){
    console.log(res);
}
})


$.ajax({
url:"Welcome.php",
method: "post",
data: emp1,
success: function(res){
    console.log(res);
}
})

location.href='http://localhost/CRYBOT/Feautures/private/Welcome.php';
</script>
</html>
