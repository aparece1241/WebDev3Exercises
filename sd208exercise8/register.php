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
            $errorStatus = true;
        }
        if($_POST["confirmed-password"] != $_POST["password"]){
            $errors["confirmed-password"] = "Doesn't match to the password!";
            $errorStatus = true;
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
    <link href='https://fonts.googleapis.com/css?family=Kavoon' rel='stylesheet'>
    <link rel="stylesheet" href="./src/style.css">
    <title>Register</title>
    <style>
        body {
            font-family: 'Kavoon';
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="form_card">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br>
            <h1 style="margin-top: -6px;">Register</h1>
                <span style="margin-top: -15px;" class="err"><?php echo (empty($errors["firstname"]))?"":$errors["firstname"];?></span><br>
                <input style="margin-top: 0px;" type="text" name="firstname" placeholder="First Name" value="<?php echo (empty($_POST["firstname"]))? "": $_POST["firstname"]?>"><br>

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
                <br>


                <label for="avatar">Choose your avatar: </label>
                <select name="avatar" class="avatars">
                    <option value="avatar1">Default.png</option>
                    <option value="avatar2">Male.png</option>
                    <option value="avatar3">Female.png</option>
                    <option value="avatar4">Random.png</option>
                </select>
           
                <input type="submit" style="margin-top: 10px;" class="submitBnt" value="Register">



            </form>
            <p>Already have an account? | <a class="redirect" style="color: rgb(96, 197, 236);" href="login.php">Login here!</a></p>
        </div>
        <br>
        <br>
    </div>
</body>
</html>
