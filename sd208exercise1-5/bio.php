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
        <h1>Hello <?php echo $_SESSION["user"]["userdata"]["firstname"]; ?></h1>
    </div>
    <div class="profile">
        <div class="profile-items">
            <img id="avatar" src="./src/img/<?php echo $_SESSION["user"]["userdata"]["avatar"]; ?>.png" alt="avatar" srcset="">
        </div>
        
        <div class="profile-items">
            <h2>Hello <?php echo $_SESSION["user"]["userdata"]["firstname"]; ?></h2>
        </div>
    </div>
  

</body>
</html>