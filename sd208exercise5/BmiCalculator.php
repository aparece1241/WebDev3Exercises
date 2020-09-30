<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI calculator</title>

    <style>
        .inputfield, .cal-bnt {
            padding: 20px;
            margin-top: 40px;
        }

        .cal-bnt {
            width: 50%;
        }

        .form-cont {
            width: 400px;
            height: 500px;
            max-height: 100%;
            text-align: center;

        }
        .backdrop {
            position: fixed;
            width: 100%;
            height: 100%;
            padding-top: 80px;
            display: grid;
            justify-content: center;
        }
        .err {
            color: red;
        }
    </style>
</head>

<body>
    <div class="backdrop">
        <fieldset class="form-cont">
            <h1>BMI Calculator</h1>

            <form action="result.php" method="post">
                
                <label for="height">
                <span class="err"><?php echo (isset($_POST["err0"]))?"(".$_POST["err0"].")":""?></span><br>
                    height: <input type="text" name="height" class="inputfield" placeholder="in centemeters ...">
                </label><br>

                <label for="height">
                <span class="err"><?php echo (isset($_POST["err1"]))?"(".$_POST["err1"].")":""?></span><br>
                    weight: <input type="text" name="weight" class="inputfield" placeholder="in kilograms ...">
                </label><br>
                <center><input type="submit" class="cal-bnt" value="Calculate"></center>
            </form>
            
        </fieldset>
        
    </div>
</body>

</html>