<?php
    include 'connection.php';
    if(isset($_POST["submit"])){
        $data = query_executer("INSERT INTO `register_user`(`firstname`, `lastname`, `email`, `password`) VALUES 
                    ('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["password"]."')",
                    $conn,"insert");
            
        header("location: register.php");
    }
    if(isset($_POST["Update"])){
        echo query_executer(sprintf("UPDATE `register_user` SET `firstname` = '%s', `lastname` = '%s',
        `email`= '%s' WHERE `id` = %s",$_POST["fname"],$_POST["lname"],$_POST["email"],$_POST["id"]),$conn,"update")[0];
        echo "Im here";
    } 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time();?>">
</head>

<body>
    <div class="cont">
        <div class="form">
            <h2>Register</h2>
            <form action="register_form.php" method="post">
                <input type="hidden" value = "<?php echo (isset($_POST["update"]))?$_POST["id"]: ""?>">
                <input type="text" name="fname" value = "<?php echo (isset($_POST["update"]))?$_POST["firstname"]: ""?>" class="input_field" placeholder="  First Name">
                <input type="text" name="lname" value = "<?php echo (isset($_POST["update"]))?$_POST["lastname"]: ""?>" class="input_field" placeholder = "  Last Name">
                <input type="email" name="email" value = "<?php echo (isset($_POST["update"]))?$_POST["email"]: ""?>" class="input_field" placeholder="  Email">
                <input type="password" name="password" class="input_field" placeholder="  Password">
                <input type="submit" name="<?php echo (isset($_POST["update"]))?$_POST["update"]: "submit"?>" id = "submit"class="input_field" value="<?php echo (isset($_POST["update"]))?$_POST["update"]: "Submit"?>">
            </form>
        </div>
    </div>
</body>
</html>
