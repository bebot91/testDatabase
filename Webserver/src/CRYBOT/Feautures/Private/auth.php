<?php
// Start the PHP session
session_start();
?>
<!DOCTYPE html>
<html lang="en"> 
<script type="text/javascript" src="../../Include/JS/jquery-3.6.0.js"></script>
  <script>

            onload = function() {
              console.log(sessionStorage.getItem('token'));     
              console.log(sessionStorage.getItem('rtoken'));
              console.log("reh");
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

              location.href='http://localhost:8080/CRYBOT/Feautures/private/Welcome.php';
            };
    </script>