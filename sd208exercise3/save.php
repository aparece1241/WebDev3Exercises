<?php
    session_start();
   
    $errors = [];
    //validation

    
    $data = (isset($_SESSION["task"]))? $_SESSION["task"]:$_SESSION["task"] = [];
    // print_r($data);
    $data = [];
    
    $errors["name"] = (empty($_POST["name"]))?"Task Name should not be empty!":"";
    $errors["description"] = (empty($_POST["description"]))?"Descritpion should not be empty!":"";
    
    $err = false;
    foreach($errors as $key => $val){
        if($val != ""){
            $err = true;
            break;
        }
    }

    if(!$err){
        array_push($data,$_POST["name"],$_POST["description"]);
        // print_r($data);
        array_push($_SESSION["task"],$data);
    }   

    header("location: todolist.php");
?>