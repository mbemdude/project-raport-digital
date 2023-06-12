<?php 
$username = $_POST['username'];
$password = $_POST['password'];

if((($username == "joko") && ($password == "jokokusayang")) || 
   (($username == "amir") && ($password == "amirkusayang"))) {
    echo "Login sukses";
   } else {
    echo "Login gagal";
   }
?>