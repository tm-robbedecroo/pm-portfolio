<?php

include "connect.php";

$recipeid = $_POST["recipeid"];
$rating   = $_POST["rating"];

$qry = "UPDATE tbl_recipes SET rating = '".$rating."' WHERE recipeid = '".$recipeid."';";
$result = $conn->query($qry);

header("Location: ../pages/recipe.php?id=".$recipeid);
die();

?>