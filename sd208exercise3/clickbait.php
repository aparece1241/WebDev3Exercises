<?php
$clickbait_words = array(
    "scientists",
    "doctors",
    "hate",
    "stupid",
    "weird",
    "simple",
    "tricked",
    "shocked me",
    "you’ll never believe",
    "hack",
    "epic",
    "unbelievable"
);
$replacement_words = array(
    "so-called scientists",
    "so-called doctors",
    "aren't threatened by",
    "average",
    "completely normal",
    "ineffective",
    "method",
    "is no different than the others",
    "you won't be really surprised by",
    "slightly improve",
    "boring",
    "normal"
);

function showRightHeadline($inputed_headline,$clickbait_words,$replacement_words){
    $inputed_headline = strtolower($inputed_headline);

    for($index = 0;$index < count($clickbait_words); $index++){
        if(strpos($inputed_headline,$clickbait_words[$index]) !== false){
            $inputed_headline = str_replace($clickbait_words[$index],$replacement_words[$index],$inputed_headline);
        }
    }
    return ucwords($inputed_headline);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClickBait</title>
</head>
<body>
<center>


</center>
    <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <textarea name="headline" placeholder="Enter a click bait headline" cols="100" rows="10"></textarea>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php if(isset($_GET["submit"])):?>
            <label for="old">ClickBait headline: <p><?php echo $_GET["headline"]?></p></label>
            <label for="old">Honest headline: <p><?php echo showRightHeadline($_GET["headline"],$clickbait_words,$replacement_words); ?></p></label>
        <?php endif;?>
    </div>
</body>
</html>