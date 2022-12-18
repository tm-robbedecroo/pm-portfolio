<?php

session_start();
include "../php/connect.php";

$recipeid = $_GET["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIME | Add recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

    <nav>
        <ul>
            <li onclick="navigate('dashboard.php')">DASHBOARD</li>
            <li>GENERATE PDF</li>
            <li class="login" id="btn-login" onclick="navigate('../php/logout.php')">LOG OUT</li>
        </ul>
    </nav>

    <div class="content-wrapper">

        <div class="image-wrapper">
            <center><img src="../images/recipe.png" height="354px;"></center>
            <div class="image-wrapper-form" style="margin-top: -8px;">
                <h1>Ingredients</h1>
                <div id="ingredients">

                <?php

                $i = 1;

                $qry = "SELECT * FROM tbl_ingredients WHERE recipeid = '$recipeid';";
                $result = $conn->query($qry);

                while($row = $result->fetch_assoc())
                {
                    echo '
                    <p>'.$i.'.</p>
                    <input type="text" name="ingredient'.$i.'" value="'.$row["ingredient_name"].'">';
                    $i++;
                }

                ?>

                </div>
                <button type="button" class="add-item" id="add_ingredient_slot">+</button>
            </div>
        </div>
    
        <div class="form-input-wrapper">

            <form method="post" action="../php/update-rating-script.php">
                <div class="rating-wrapper">
                    <?php
                        
                    $qry = "SELECT * FROM tbl_recipes WHERE recipeid = '$recipeid';";
                    $result = $conn->query($qry);

                    while($row = $result->fetch_assoc())
                    {
                        echo '<select onchange="update_image()" name="rating" id="rating_value">';
                        for($i = 0; $i <= 5; $i++)
                        {
                            if($i == $row["rating"])
                            {
                                echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                        }
                            
                        echo '</select>';
                        echo '<img src="../images/ratings/'.$row["rating"].'.png" id="rating" height="26px">';

                    }

                    echo '<input type="hidden" name="recipeid" value="'.$recipeid.'">';
                    ?>
                    <input type="submit" value="UPDATE RATING">
                </div>
            </form>

            <?php

            $qry = "SELECT * FROM tbl_recipes WHERE recipeid = '$recipeid';";
            $result = $conn->query($qry);

            while($row = $result->fetch_assoc())
            {
                echo '
                <input type="text" name="name" value="'.$row["name"].'">
                <input type="number" name="duration" id="duration" value="'.$row["duration"].'"><p>Minutes</p><br>
                <input type="number" name="num_ppl" id="num-ppl" value="'.$row["num_people"].'"><p>People/meal</p>';
            }

            ?>
            
            <h1>Preparation steps</h1>
            <div id="steps">

            <?php

                $i = 1;

                $qry = "SELECT * FROM tbl_steps WHERE recipeid = '$recipeid';";
                $result = $conn->query($qry);

                while($row = $result->fetch_assoc())
                {
                    echo '
                    <p>'.$i.'.</p>
                    <input type="text" name="step'.$i.'" value="'.$row["step"].'">';
                    $i++;
                }

                ?>
            </div>
            <button type="button" class="add-item" id="add_step_slot">+</button><br>
        </div>
    </div>

    <input type="hidden" value="1" id="amt_ingredients" name="amt_ingredients">
    <input type="hidden" value="1" id="amt_steps" name="amt_steps">


    <script>
    
        let s, c;

        window.onload = () => {
            s = 2;
            c = 2;
        }

        function navigate(a){ window.location = a; }

        document.getElementById("add_ingredient_slot").addEventListener("click", () => {

            let counter = document.createElement("p");
            counter.innerHTML = c + ".";

            let slot = document.createElement("input");
            slot.type="text";
            slot.name="ingredient" + c;
            slot.placeholder="Ex. 2 Eggs";

            document.getElementById("ingredients").appendChild(counter);
            document.getElementById("ingredients").appendChild(slot);

            document.getElementById("amt_ingredients").value = c;

            c++;
        });

        document.getElementById("add_step_slot").addEventListener("click", () => {

            let counter = document.createElement("p");
            counter.innerHTML = s + ".";

            let slot = document.createElement("input");
            slot.type="text";
            slot.name="step" + c;
            slot.placeholder="Ex. Break both eggs.";

            document.getElementById("steps").appendChild(counter);
            document.getElementById("steps").appendChild(slot);

            document.getElementById("amt_steps").value = s;

            s++;
        });

        function update_image()
        {
            let rating = document.getElementById("rating_value").value;
            document.getElementById("rating").src = "../images/ratings/" + rating + ".png";
        }

    </script>

</body>
</html>