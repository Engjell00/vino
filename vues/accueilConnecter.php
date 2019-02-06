
<html>
<body>
    <?php
        if($_SESSION["UserID"]){
    ?>
    <h1>L'utilisateur est connecter<?php echo $_SESSION["UserID"]?></h1>
    <?php
        }else
        {
            echo "Non connecter";
        }
    ?>
     
</body>
</html>
