<?php
$server = "sql205.epizy.com";
$username = "epiz_32441610";
$password = "bmlsfOcBo3";
$database = "epiz_32441610_cms";

$conn = mysqli_connect($server, $username, $password,$database);
if(!$conn){
    die("Error!" . mysqli_connect_error());
}
?>
