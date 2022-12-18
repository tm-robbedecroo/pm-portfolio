<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECIME</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <nav>
        <ul>
            <li class="active">HOME</li>
            <li>CONTACT</li>
            <li class="login" id="btn-login" onclick="swapform()">LOGIN</li>
        </ul>
    </nav>

    <div class="container">
        <h1>RECIME</h1>
        <h3>Your cooking made easy</h3>

        <div class="form-wrapper">
            <div class="register-wrapper" id="register-wrapper">
                <div class="register-form">
                    <?php

                    if(isset($_GET["err"]))
                    {
                        if($_GET["err"] == 1)
                        {
                            echo '<p class="err">Please fill in all the fields.</p>';
                        }
                    }

                    ?>
                    <table>
                        <form method="post" action="php/register.php">
                            <tr>
                                <td><input type="text" name="firstname" placeholder="First name"></td>
                                <td><input type="text" name="lastname" placeholder="Last name"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" name="username" placeholder="Username"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="password" name="password" placeholder="Password"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="BECOME A MEMBER"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="#" onclick="swapform()">Already have an account?</a></td>
                            </tr>
                        </form>
                    </table>
                </div>
                <div class="register-text">
                    <h3>Create your account now!</h3>
                    <p>Fill in this form and become a member in less than 1 minute!</p>
                </div>
            </div>
            <div class="login-wrapper" id="login-wrapper">
                <div class="login-form">
                    <?php

                    if(isset($_GET["err"]))
                    {
                        if($_GET["err"] == 1)
                        {
                            echo '<p class="err">Please fill in all the fields.</p>';
                        }
                    }

                    ?>
                    <table>
                        <form method="post" action="php/login.php">
                            <tr>
                                <td><input type="text" name="username" placeholder="Username"></td>
                                <td><input type="password" name="password" placeholder="Password"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="LOGIN"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><a href="#" onclick="swapform()">Don't have an account yet?</a></td>
                            </tr>
                        </form>
                    </table>
                </div>
                <div class="login-text">
                    <h3>Welcome back!</h3>
                    <p>Enter your username and password and get started!</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <ul>
            <li><strong>&copy;</strong> Robbe Decroo 2022</li>
        </ul>
    </footer>

    <script>

        let form_status = 0;

        function swapform()
        {
            if(form_status == 0)
            {
                document.getElementById("register-wrapper").style = "display: none";
                document.getElementById("login-wrapper").style = "display: block";
                document.getElementById("btn-login").innerHTML = "JOIN US";
                form_status = 1;
            }
            else
            {
                document.getElementById("register-wrapper").style = "display: block";
                document.getElementById("login-wrapper").style= "display: none";
                document.getElementById("btn-login").innerHTML = "LOGIN";
                form_status = 0;
            }
            
        }

    </script>

</body>
</html>