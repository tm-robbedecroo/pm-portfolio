<?php

include "connect.php";
session_start();

$firstname = trim(ucfirst(strtolower($_POST["firstname"])));
$lastname  = trim(ucfirst(strtolower($_POST["lastname"])));
$username  = trim($_POST["username"]);
$password  = md5($_POST["password"]);

$qry = "INSERT INTO tbl_users (userid, firstname, lastname, username, password) VALUES (NULL, ?, ?, ?, ?);";

$statement = $conn->prepare($qry);
$statement->bind_param("ssss", $firstname, $lastname, $username, $password);
$statement->execute();

$_SESSION["userid"] = $conn->insert_id;

header("Location: ../pages/dashboard.php");
die();


?>