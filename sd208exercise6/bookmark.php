<?php
    
    session_start();
    $data = (isset($_SESSION["bookmarks"]))? $_SESSION["bookmarks"]:array();


    if(isset($_POST["submit"])){

        if(!empty($_POST["bookmark_name"]) && !empty($_POST["bookmark_url"])){
            array_push($data,[$_POST["bookmark_name"],$_POST["bookmark_url"]]);
            $_SESSION["bookmarks"] = $data;
        }
        
    }
    if(isset($_POST["x"])){
        array_splice($_SESSION["bookmarks"],$_POST["del"],1);
    }
    if(isset($_POST["clear"])){
        $_SESSION = [];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookmark</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label>Bookmark Name:</label><br>
            <input type="text" placeholder="" name="bookmark_name">
            <br>
            <label>Bookmark Url:</label><br>
            <input type="text" placeholder="" name="bookmark_url">
            <br>
            <br>
            <input type="submit" value="Add bookmark" name="submit">
            <input type="submit" value="Clear" name="clear">
        </form>
      
    </div>
    <?php if(isset($_SESSION["bookmarks"])):?>
        <?php for($id = 0;$id < count($_SESSION["bookmarks"]);$id++):?>

            <a href="<?php echo $_SESSION["bookmarks"][$id][1];?>"><?php echo $_SESSION["bookmarks"][$id][0]?></a>
            
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                <input type="hidden" name="del" value="<?php echo $id;?>">
                <input type="submit" name="x" value="X">
            </form>

        <?php endfor?>
    <?php endif?>
</body>
</html>