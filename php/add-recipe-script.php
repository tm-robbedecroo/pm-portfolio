<?php

session_start();
include "connect.php";

$userid = $_SESSION["userid"];

$name       = $_POST["name"];
$num_people = $_POST["num_ppl"];
$duration   = $_POST["duration"];
$rating     = 0;

$amt_ingredients = $_POST["amt_ingredients"];
$amt_steps       = $_POST["amt_steps"];

$ingredients = array();
$steps       = array();

$qry = "INSERT INTO tbl_recipes (recipeid, userid, name, num_people, duration, rating) VALUES (NULL, '$userid', '$name', '$num_people', '$duration', '$rating');";
$conn->query($qry);
$recipeid = $conn->insert_id;

for($i = 1; $i <= $amt_ingredients; $i++)
{
    array_push($ingredients, $_POST["ingredient".$i]);

    $j = $i - 1;

    $qry = "INSERT INTO tbl_ingredients (ingredientid, recipeid, ingredient_name) VALUES (NULL, '$recipeid', '$ingredients[$j]');";
    $conn->query($qry);
}

for($i = 1; $i <= $amt_steps; $i++)
{
    array_push($steps, $_POST["step".$i]);

    $j = $i - 1;

    $qry = "INSERT INTO tbl_steps (stepid, recipeid, step) VALUES (NULL, '$recipeid', '$steps[$j]');";
    $conn->query($qry);
}

header("Location: ../pages/dashboard.php");
die();

?>