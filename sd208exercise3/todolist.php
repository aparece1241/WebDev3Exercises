<?php

session_start();
// print_r($_SESSION["task"]);
// $_SESSION["task"]=[];

(isset($_POST["delete"])? deleteTask($_POST["id"]): "");    

$errors = [];
/**
 * Deletes a single task
 */
 function deleteTask($id){
    $name = $_SESSION["task"][$id][0];
    array_splice($_SESSION["task"],$id,1);
    echo "<script>alert('successfully deleted!')</script>";
 }

 /**
  * Deletes all task
  */
 function deleteAllTask(){

 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- this is my modal part -->
    <div onclick="hideModalForm()" id="form_handler">
        <div class="modal-content">
            <h2>Create a Task</h2>
            <form action="<?php echo htmlspecialchars("save.php");?>" method="post">
                <input name="name" class="input_box" type="text" placeholder="Task name" required>
                <textarea placeholder="Task Description ..." name="description" class="input_box" cols="30" rows="10" required></textarea>
                <input type="submit" class="input_box input_submit" value="create">
            </form>
        </div>
    </div>
<!-- end of modal part -->

<!-- this is the header part  -->
<div class="header">
    <h2 class="header-items" >This is Todo List</h2>
    <span class="header-items create-bnt items" onclick="showModalForm()">Create Task</span>
    <?php if (count($_SESSION["task"])> 0):?>
        <form action="" class="header-items create-bnt"  method="post">
            <input type="submit" name="all" style = "background-color: none;"  value="Delete All">
        </form>
    <?php endif?>
</div>
<!-- header part end  -->

 <!-- task content start  -->
<div class="task_cont">
    <?php if(isset($_SESSION["task"]) && count($_SESSION["task"]) > 0): ?>
        <?php for($index = 0;$index < count($_SESSION["task"]);$index++):?>    
            <div class="task_card"> 
                <div class="descript">
                <h2><?php echo $_SESSION["task"][$index][0];?></h2>
                    <br>
                    <br>
                    <p><?php echo $_SESSION["task"][$index][1];?></p>
                    <div class="del">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <input type="hidden" name="id" value="<?php echo $index;?>">
                        <input type="submit" name="delete" class="del-bnt" value="Delete">
                    </form>
                    </div>
                </div>
            </div>
        <?php endfor?>
    <?php else:?>
        <h2>There is no task to display</h2>
    <?php endif?>
</div>
 <!-- task content end -->




<script>
    // show the form
    function showModalForm(){
        console.log("Clicked!");
        document.getElementById("form_handler").style = "display: grid";
    }

    // hide form
    function hideModalForm(e){
        e.stopPropagation();
        document.getElementById("form_handler").style = "display: none";
    }
</script>
</body>
</html>