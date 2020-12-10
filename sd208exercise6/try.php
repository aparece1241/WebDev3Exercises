<?php
    session_start();
    $data = (isset($_SESSION["bookmarks"]))? $_SESSION["bookmarks"] : array();

    if(isset($_POST["submit"])){

        array_push($data,[$_POST["bookmark_name"],$_POST["bookmark_url"]]);
        $_SESSION["bookmarks"] = $data;
    
    }
    if(isset($_POST['del'])){
        array_splice($_SESSION["bookmarks"],$_POST["id"],1);
    }

    if(isset($_POST["clear"])){
        $_SESSION["bookmarks"] = [];
    }
    print_r($_SESSION["bookmarks"]); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <label for="">Bookmark name:</label><br>
        <input type="text" name="bookmark_name"><br>
        <label for="">Bookmark url:</label><br>
        <input type="text" name="bookmark_url"><br>
        <br>
        <input type="submit" name="submit" value="Submit">
        <input type="submit" name="clear" value="Clear">
    </form>

    <?php if(isset($_SESSION["bookmarks"])):?>

        <?php for($id = 0;$id < count($_SESSION["bookmarks"]); $id++):?>

            <a href="<?php echo $_SESSION["bookmarks"][$id][1]?>"><?php echo $_SESSION["bookmarks"][$id][0]?></a>

            <form action="try.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="del" value="X">
            </form>
            <br>
        <?php endfor?>
    <?php endif?>
</body>
</html>