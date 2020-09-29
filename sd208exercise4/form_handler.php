<?php
    $errors = [];
    $data = [];
    if(isset($_POST["submit"])){
        (strlen(trim($_POST["fname"])) < 2 or strlen(trim($_POST["fname"])) > 25)? array_push($errors,"First name length should not be less than 2 or greater than 25!"): array_push($data,$_POST["fname"]);
        (strlen(trim($_POST["lname"])) < 2 or strlen(trim($_POST["lname"])) > 25)? array_push($errors,"Last name length should not be less than 2 or greater than 25!"): array_push($data,$_POST["lname"]);
        (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL))? array_push($errors,"Invalid email!"):array_push($data,$_POST["email"]);
        (empty($_POST["address"]))? array_push($errors,"Address should not be empty!"): array_push($data,$_POST["address"]);
        //check if there's no error
        $isErr = false;
        if(count($errors) == 0){
            displayResult("Data",$data);
        }else{
            displayResult("Errors",$errors);
        }
    }

    function displayResult($identifier, $data){
        echo $identifier."<br>";
        foreach($data as $el){
            echo $el ."<br>";
        }
    }
    
?>