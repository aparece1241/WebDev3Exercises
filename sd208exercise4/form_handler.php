<?php
    $errors = [];
    if(isset($_POST["submit"])){
        $errors["fname"] = (strlen(trim($_POST["fname"])) < 2 or strlen(trim($_POST["fname"])) > 25)? "First name length should not be less than 2 or greater than 25!": NULL;
        $errors["lname"] = (strlen(trim($_POST["lname"])) < 2 or strlen(trim($_POST["lname"])) > 25)? "Last name length should not be less than 2 or greater than 25!": NULL;
    }

    
?>