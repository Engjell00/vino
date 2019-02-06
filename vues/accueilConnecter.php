
<html>
<body>
    <?php
        if($_SESSION["UserID"]){
    ?>
    <h1>L'utilisateur est connecter <?php echo $_SESSION["UserID"]?></h1>
    <a href="index.php?requete=Logout">Se déconnecter</a>
    <?php
        }else
        {
            echo "Non connecter";
        }
       
    ?>
     
</body>
</html>
