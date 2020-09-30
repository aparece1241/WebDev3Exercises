<?php
    $errors = [];
    (is_numeric($_POST["height"]))? $height = $_POST["height"]: array_push($errors,$_POST["height"] ." is not a number!");
    (is_numeric($_POST["weight"]))? $weight = $_POST["weight"]: array_push($errors,$_POST["weight"] ." is not a number!");

//Formula: weight (kg) / [height (m)]2
    //calculate BMI

    function calcualteBMI($weight, $height){
        $message = "";
        $heightMeter = $height/100;
        $bmi = $weight/($heightMeter * $heightMeter);
        if($bmi < 18.5){
            $message = "Underweight";
        }elseif($bmi >= 18.5 && $bmi <= 24.9){
            $message = "Normal weight";
        }elseif($bmi >= 25 && $bmi <= 29.9){
            $message = "Overweight";
        }else {
            $message = "Obesity";
        }

        return $message;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        .backdrop {
            position: fixed;
            width: 100%;
            height: 100%;
            padding-top: 80px;
            display: grid;
            justify-content: center;
        }
        fieldset {
            text-align: center;
            width: 400px;
            height: 300px;
        }
        .back {
            padding: 20px;
            border: solid green 1px;
            background-color: rgba(0,0,0,0.4);
        }

    </style>
</head>
<body>
    <?php if (count($errors)>0):?>
        <form action='BmiCalculator.php' method='post' id='sub'>
               <?php for($index = 0;$index < count($errors);$index++): ?>
                <input type = "text" name="<?php echo 'err'.$index;?>" value="<?php echo $errors[$index]?>">
                <?php endfor?>
                <input type = 'submit'>
        </form>
        <script>document.getElementById("sub").submit();</script>
    <?php else:?>
        <div class="backdrop">
            <fieldset>
                <H1>Result</H1>
                <h2>You Are</h2>
                <h2><?php echo calcualteBMI($weight,$height);?></h2><br>
                <br>
                <a class="back" href="BmiCalculator.php">Back to Calculator</a>
            </fieldset>
        </div>
    <?php endif?>
</body>
</html>