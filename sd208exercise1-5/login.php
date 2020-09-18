<!-- read this -->
<!-- https://www.w3schools.in/php-script/php-login-without-using-database/  -->
<?php
    session_start();

    $errors = [];

    if(isset($_POST["email"]) && isset($_POST["password"]) ){
        if(empty($_POST["email"])){
            $errors["email"] = "email should not be empty!";
        }
        if(empty($_POST["password"])){
            $errors["password"] = "password should not be empty!";
        }
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
        if(empty($errors)){
            header("location: bio.php");
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <title>login</title>
</head>
<body>
    <div class="background">
        <div class="form_card">
        <h1>Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span class="err"><?php echo (empty($errors["email"]))?"":$errors["email"];?></span><br>
                <input type="text" name="email" placeholder="Email">
                <br>
                <span class="err"><?php echo (empty($errors["password"]))?"":$errors["password"];?></span><br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="submit" class="submitBnt" value="Login">
            </form>
            <p>Haven't join yet?<a class="links" href="register.php">Join Now!</a></p>
        </div>
        
    </div>
    <script src="./src/main.js"></script>
</body>
</html>