<?php
include "connection.php";
//query serve


echo isset($_POST["submit"]);

$data = query_executer("SELECT * FROM `register_user`",$conn,"select")[1];   

if(isset($_POST["delete"])){
    // echo $_POST["id"];
    echo "<script>alert(".$_POST["id"].")</script>";
    echo query_executer("DELETE FROM `register_user` WHERE id = ".$_POST["id"]."",$conn,"delete")[0];
    // header("location: register.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered</title>
    <link rel="stylesheet"  href="style.css?v=<?php echo time(); ?>">

</head>
<body>
    <div class="cont">

            <table class="table">
                 
                <?php if(is_array($data)):?>
                    <tr style="border: solid 2px ">
                            <td class="table_row">id</td>
                            <td class="table_row">firstname</td>
                            <td class="table_row">lastname</td>
                            <td class="table_row">email</td>
                            <td class="table_row"></td>
                            <td class="table_row"></td>
                    </tr> 
                    <?php foreach($data as $elem):?>
                        <tr style="border: solid 2px ">
                            
                            <td class="table_row"><?php echo $elem["id"]?></td>
                            <td class="table_row"><?php echo $elem["firstname"]?></td>
                            <td class="table_row"><?php echo $elem["lastname"]?></td>
                            <td class="table_row"><?php echo $elem["email"]?></td>
                            <td class="table_row">
                                <form action="register_form.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $elem["id"]?>">
                                    <input type="hidden" name="firstname" value="<?php echo $elem["firstname"]?>">
                                    <input type="hidden" name="lastname" value="<?php echo $elem["lastname"]?>">
                                    <input type="hidden" name="email" value="<?php echo $elem["email"]?>">
                                    <input class="update" type="submit" name="update" value="Update">
                                </form>
                            </td>
                            <td class="table_row">
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $elem["id"]?>">

                                    <input class="delete" type="submit" name="delete" value="delete">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach?>
                <?php else:?>
                    <h4>NO CONTENT TO DISPLAY</h4>
                <?php endif?>
            </table>      
    </div>
</body>
</html>




<?php
//first define a query
//select all data from user table
$sql = "SELECT * FROM `user`";

//mysqli takes two parameters connection and the query
$data = mysqli_query($conn, $sql);
//check if the query executed correctly

$retrieveData = [];
if($data){
    //if it executed successfully 
    //check if it has data
    if(mysqli_num_rows($data)){
        //if there is fetch the data
        while($row = mysqli_fetch_assoc($data)){
            //store data in retrieveData variable
            array_push($retrieveData, $row);
        }
    }else{
        echo "no data";
    }
}else{
    //show error
    echo "ERROR".mysqli_error($conn);
}


?>