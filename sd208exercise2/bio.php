<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/style.css">
    <title>bio</title>
</head>
<body>
    <div class="header">
        <h1 style="margin-left: 10px;"><?php echo $_SESSION["user"]["userdata"]["firstname"].'\'s bio';?></h1>
    </div>
    <div class="profile">
        <div class="profile-items">
            
            <img id="avatar" style = "width: 250px; height: 250px;" src="./src/img/<?php echo $_SESSION["user"]["userdata"]["avatar"]; ?>.png" alt="avatar" srcset="">
            
        </div>
        
        <div class="profile-items">
            <div id="items">
                <h2><?php echo $_SESSION["user"]["userdata"]["firstname"]." " ; ?><?php echo $_SESSION["user"]["userdata"]["lastname"]; ?></h2>
                <p><?php echo "From: ". $_SESSION["user"]["userdata"]["address"]." " ; ?></p>
                <p><?php echo "Contact me through: ". $_SESSION["user"]["userdata"]["email"]." " ; ?></p>
            </div>
        </div>
    </div>
  

</body>
</html>