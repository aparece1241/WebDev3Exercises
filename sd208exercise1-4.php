<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD208Exercises</title>
    <style>
        .box {
            border: solid 1px black;
            width: 50px;
            height: 50px;
            display: inline-block;
            margin-top: -4px;
        }
        .black {
            background-color: black;
        }
        .white {
            background-color: white;
        }
    </style>
</head>
<body>
    <?php
       //exercise 4
       $number = 1; 
       while($number <= 100){
            $message = "";
            if($number % 3 == 0){
                $message .= "FIZZ";
            }
            if($number % 5 == 0){
                $message .= "BUZZ";
            }
            if($number % 3 != 0 AND $number % 5 != 0){
                $message .= $number;
            }
            $number++;
            echo $message . "<br>";
       }

    ?>
</body>
</html>