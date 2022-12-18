<?php

session_start();
include "../php/connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIME | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <nav>
        <ul>
            <li class="active">DASHBOARD</li>
            <li onclick="navigate('add-recipe.php')">ADD RECIPE</li>
            <li class="login" id="btn-login" onclick="navigate('../php/logout.php')">LOG OUT</li>
        </ul>
    </nav>
    
    <div class="recipe-wrapper">

    <?php

        $c = 0;

        $qry = "SELECT * FROM tbl_recipes WHERE userid = '".$_SESSION["userid"]."';";
        $result = $conn->query($qry);

        while($row = $result->fetch_assoc())
        {
            echo '
            <div class="recipe">
                <img src="../images/dinner.png" class="recipe-img" height="150px">
                <div class="recipe-desc">
                    <h1>'.$row["name"].'</h1>
                    <p>'.$row["duration"].'\' | '.$row["num_people"].' <i>ppl</i></p>
                    <button onclick="navigate(\'recipe.php?id='.$row["recipeid"].'\')">OPEN RECIPE</button>
                </div>
                <img src="../images/ratings/'.$row["rating"].'.png" class="rating" height="26px">
            </div>
            ';
        }

    ?>

    </div>

    <script>
        function navigate(a){ window.location = a; }
    </script>

</body>
</html>