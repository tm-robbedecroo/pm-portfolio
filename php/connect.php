<?php

//LOCALHOST
$host     = "localhost";
$username = "root";
$password = "";
$database = "recipe";

//WEBHOST
//$host     = "ID386063_recime.db.webhosting.be";
//$username = "ID386063_recime";
//$password = "Harambe24";
//$database = "ID386063_recime";

$conn = new mysqli($host, $username, $password, $database);
?>
