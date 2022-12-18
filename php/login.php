<?php

session_start();
include "connect.php";

$username     = $_POST["username"];
$password  = md5($_POST["password"]);

$statement = $conn->prepare("SELECT * FROM tbl_users WHERE tbl_users.username LIKE ? AND tbl_users.password LIKE ?;");
$statement->bind_param("ss", $username, $password);
$statement->execute();

$result    = $statement->get_result();

if($row = $result->fetch_assoc())
{

    $_SESSION["userid"] = $row["userid"];

    $statement->close();

    header("Location: ../pages/dashboard.php");
    die();
}

header("Location: ../index.php");
die();

?>