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
        //exercise 1
        echo "Harvey D. Aparece";
        //exercise 2
        echo "<h2>Chess Board</h2>";
        $fcolor = "black";
        $scolor = "white";
        $c = "";
        for($counter = 0;$counter < 8;$counter++){   
            ($counter % 2 != 0)?($fcolor = "white" AND $scolor = "black") : ($fcolor = "black" AND $scolor = "white");
            for($count = 0;$count < 8;$count++){
                $c = ($count % 2 == 0)? $fcolor :$scolor;
                echo "<div class = 'box $c'></div>";
            }
            echo "<br>";
        }

        //exercise 3



        //exercise 4
        

    ?>
</body>
</html>