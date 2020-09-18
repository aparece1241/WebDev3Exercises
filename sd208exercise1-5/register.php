<?php
    session_start();

    $fields = [
        "firstname",
        "lastname",
        "address",
        "email",
        "confirmed-email",
        "password",
        "confirmed-password",
        "avatar"
    ];
    $errors;
    $userData;
    $errorStatus = false;
    //validation
    if(isset($_POST["firstname"])){
        foreach($fields as $field){
            if(empty($_POST[$field])){
                $errors[$field] = $field ." should not be empty!";
                $errorStatus = true;
            }else{
                $errors[$field] = "";
            }
        }
    
        if($_POST["confirmed-email"] != $_POST["email"] ){
            $errors["confirmed-email"] = "Doesn't match to the email!";
        }
        if($_POST["confirmed-password"] != $_POST["password"]){
            $errors["confirmed-password"] = "Doesn't match to the password!";
        }

        //saving to the session
        if(!$errorStatus){
            foreach($fields as $field){
                $userData[$field] = $_POST[$field];
            }
            $_SESSION["user"]["userdata"] = $userData;
            print_r($_SESSION["user"]["userdata"]);
            header("location: login.php");
            $errorStatus = false;
        }
    }
    
    


?>
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
            <br>
            <br>
            <h1>Rigester</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

                <span class="err"><?php echo (empty($errors["firstname"]))?"":$errors["firstname"];?></span><br>
                <input type="text" name="firstname" placeholder="First Name" value="<?php echo (empty($_POST["firstname"]))? "": $_POST["firstname"]?>"><br>

                <span class="err"><?php echo (empty($errors["lastname"]))?"":$errors["lastname"];?></span><br>
                <input type="text" name="lastname" placeholder="Last Name" value="<?php echo (empty($_POST["lastname"]))? "": $_POST["lastname"]?>"><br>

                <span class="err"><?php echo (empty($errors["address"]))?"":$errors["address"];?></span><br>
                <input type="text" name="address" placeholder="Address" value="<?php echo (empty($_POST["address"]))? "": $_POST["address"]?>"><br>

                <span class="err"><?php echo (empty($errors["email"]))?"":$errors["email"];?></span><br>
                <input type="email" name="email" placeholder="Email Address" value="<?php echo (empty($_POST["email"]))? "": $_POST["email"]?>"><br>

                <span class="err"><?php echo (empty($errors["confirmed-email"]))?"":$errors["confirmed-email"];?></span><br>
                <input type="email" name="confirmed-email" placeholder="Confirm Email Address" value="<?php echo (empty($_POST["confirmed-email"]))? "": $_POST["confirmed-email"]?>"><br>

                <span class="err"><?php echo (empty($errors["password"]))?"":$errors["password"];?></span><br>
                <input type="password" name="password" placeholder="Password" value="<?php echo (empty($_POST["password"]))? "": $_POST["password"]?>"><br>

                <span class="err"><?php echo (empty($errors["confirmed-password"]))?"":$errors["confirmed-password"];?></span><br>
                <input type="password" name="confirmed-password" placeholder="Confirm Password" value="<?php echo (empty($_POST["confirmed-password"]))? "": $_POST["confirmed-password"]?>"><br>

                <select name="avatar" class="avatar" style = "margin-top: 10px;width: 87%;padding:10px;border-radius:10px;">
                    <option value="avatar1">Default.png</option>
                    <option value="avatar2">Male.png</option>
                    <option value="avatar3">Female.png</option>
                    <option value="avatar4">Random.png</option>
                </select>
                <br>
                <input type="submit" class="submitBnt" value="Register"><br>
                <p>Already have an account? <a href="login.php">Login here!</a></p>
                <br>
                <br>
            </form>
            
        </div>
        <br>
        <br>
    </div>
</body>
</html>
