<?php
    if(!isset($_SESSION["UserID"]))
    {
?>
    <h1>Formulaire d'authentification</h1>
                <form method="POST">
                        Nom d'usager : <input type="text" name="utilisateur"/><br>
                        Mot de Passe :<input type="password" name="motDePasse">
                        <input class= "connexion" type="submit" value="Log in"/>
                </form><br>
        <a class="bouton" href='?requete=formulaireInscription'>Inscrivez-vous</a>    
<?php
    }
    else
    {
?>
    Vous êtes déjà authentifiés...
    <a href="?requete=Logout">Se déconnecter</a>
        <?php
    }
?>