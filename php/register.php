<?php

include "connect.php";
session_start();

$firstname = trim(ucfirst(strtolower($_POST["firstname"])));
$lastname  = trim(ucfirst(strtolower($_POST["lastname"])));
$username  = trim($_POST["username"]);
$password  = md5($_POST["password"]);

if($firstname == "" || $lastname == "" || $username == "" || $password == "")
{
    $_POST["err"] = 2;
    header("Location: ../index.php?err=1");
    die();
}

$qry = "INSERT INTO tbl_users (userid, firstname, lastname, username, password) VALUES (NULL, ?, ?, ?, ?);";

$statement = $conn->prepare($qry);
$statement->bind_param("ssss", $firstname, $lastname, $username, $password);
$statement->execute();

$_SESSION["userid"] = $conn->insert_id;

header("Location: ../pages/dashboard.php");
die();


?>