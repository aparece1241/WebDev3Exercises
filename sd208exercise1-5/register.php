<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <title>Register</title>
</head>
<body>
    <div class="background">
        <div class="form_card">
            <h1>Rigester</h1>
            <form action="" method="post">
                <input type="text" name="firstname" placeholder="First Name"><br>
                <input type="text" name="lastname" placeholder="Last Name"><br>
                <input type="text" name="address" placeholder="Address"><br>
                <input type="email" name="emailadd" placeholder="Email Address"><br>
                <input type="email" name="emailaddcon" placeholder="Confirm Email Address"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <input type="password" name="conpassword" placeholder="Confirm Password"><br>
                <input type="submit" class="submitBnt" value="Register">
            </form>
            <p>Already have an account? <a href="login.php">Login here!</a></p>
        </div>
    </div>
</body>
</html>
