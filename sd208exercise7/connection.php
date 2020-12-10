<?php
    //handles connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "form";

    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn){
        die("Connection field:". mysqli_connect_error());
    }
    echo "Successfully connected!";

    function query_executer($sql_query,$conn,$method){
        $data= mysqli_query($conn,$sql_query);
        $temp = [];
        $message = $method."ed successfully!";
        if($method == "select"){
            if(mysqli_num_rows($data) > 0){
                while($datas = mysqli_fetch_assoc($data)){
                    array_push($temp,$datas);
                }
                $data = $temp;
            }else{
                $data= "0 results!";
            }
        }
    
        if($data){
            return [$message,$data,true];
        }else{
            $err = mysqli_error($conn);
            return [$err,false];
        }
    }
    
?>