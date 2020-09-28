<!-- read this -->
<!-- https://www.w3schools.in/php-script/php-login-without-using-database/  -->
<?php
    session_start();

    $errors = [];

    if(isset($_POST["email"]) && isset($_POST["password"]) ){
        
        $errors["email"] = (empty($_POST["email"]))?"Email should not be empty!":"";
        $errors["password"] = (empty($_POST["password"]))?"Password should not be empty!":"";
        $errors["email"] = ($_SESSION["user"]["userdata"]["email"] != $_POST["email"]) ? "This email doesn't much any email!":"";
        $errors["password"] = ($_SESSION["user"]["userdata"]["password"] != $_POST["password"]) ? "Incorrect password!": "";
        
        if(isEmpty($errors) == "false"){
            $_SESSION["user"]["logging_in"] = ["email" => $_POST["email"],"password" =>$_POST["password"]];
            header("location: bio.php");
        }
    }

    function isEmpty($arr){
        foreach ($arr as $el){
            if($el != ""){
                return "true";
            }
        }
        return "false";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
    <title>login</title>
    <style>
         body {
            font-family: 'Kavoon';
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="form_card">
        <h1>Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="err"><?php echo (empty($errors["email"]))?"":$errors["email"];?></span><br>
                <input type="text" name="email" placeholder="Email" value="<?php echo (empty($_POST["email"]))? "": $_POST["email"]?>">
                <br>
                <span class="err"><?php echo (empty($errors["password"]))?"":$errors["password"];?></span><br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <br>
                <input type="submit" class="submitBnt" value="Login">
            </form>
            <p>Haven't join yet? | <a style="color: rgb(96, 197, 236);" class="links" href="register.php">Join Now!</a></p>
        </div>
        <br>
        <br>
    </div>
    <script src="./src/main.js"></script>
</body>
</html>