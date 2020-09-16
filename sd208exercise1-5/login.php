<!-- read this -->
<!-- https://www.w3schools.in/php-script/php-login-without-using-database/  -->
<?php
    session_start();

    $errors = [];

    if(isset($_POST["email"]) && isset($_POST["password"]) ){
        if(empty($_POST["email"])){
            array_push($$errors,"ERROR: email should not be empty!");
        }
        if(empty($_POST["password"])){
            array_push($$errors,"ERROR: password should not be empty!");
        }
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["password"];
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
                <input type="text" name="email" placeholder="Email">
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <input type="submit" class="submitBnt" value="Login">
            </form>
            <p>Haven't join yet?<a class="links" href="register.php">Join Now!</a></p>
        </div>
        
    </div>
</body>
</html>