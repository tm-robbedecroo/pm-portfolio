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
            <li class="active">ADD RECIPE</li>
            <li class="login" id="btn-login" onclick="navigate('../php/logout.php')">LOG OUT</li>
        </ul>
    </nav>

    <form method="post" action="../php/add-recipe-script.php">
        <div class="content-wrapper">

            <div class="image-wrapper">
                <center><img src="../images/recipe.png" height="354px;"></center>
                <div class="image-wrapper-form" style="margin-top: -8px;">
                    <h1>Ingredients</h1>
                    <div id="ingredients">
                        <p>1.</p>
                        <input type="text" name="ingredient1" placeholder="Ex. 2 Eggs">
                    </div>
                    <button type="button" class="add-item" id="add_ingredient_slot">+</button>
                </div>
            </div>
        
            <div class="form-input-wrapper">
                <input type="text" name="name" placeholder="Recipe name">
                <input type="number" name="duration" id="duration" placeholder="Preparation duration"><p>Minutes</p><br>
                <input type="number" name="num_ppl" id="num-ppl" placeholder="People per meal"><p>People/meal</p>
                <h1>Preparation steps</h1>
                <div id="steps">
                    <p>1.</p>
                    <input type="text" name="step1" placeholder="Ex. Break both eggs.">
                </div>
                <button type="button" class="add-item" id="add_step_slot">+</button><br>
            </div>
        </div>

        <input type="hidden" value="1" id="amt_ingredients" name="amt_ingredients">
        <input type="hidden" value="1" id="amt_steps" name="amt_steps">

        <input type="submit" id="submit-recipe" value="SUBMIT RECIPE">

    </form>

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
            slot.name="step" + s;
            slot.placeholder="Ex. Break both eggs.";

            document.getElementById("steps").appendChild(counter);
            document.getElementById("steps").appendChild(slot);

            document.getElementById("amt_steps").value = s;

            s++;
        });

    </script>

</body>
</html>