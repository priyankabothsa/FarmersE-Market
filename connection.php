<?php 
$dbhost="localhost";
$dbpassword="";
$dbuser="root";
$dbname="farmers_site";
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname)){
    die("Failed to connect");
}


?>