<div class="cellier">
<?php
foreach ($data as $cle => $usager) {
    //Affichage de la bouteille qu'on a reçu lorsqu'on veut l'ajouter rien de très compliquer,
    //Manque simplement de recevoir l'utilisateur en paramètre par la suite, vu que sans $_SESSION, c'est un peu
    //Mal coder
    ?>
   <form  method ="POST">
   <input type="hidden" name="idUsager" value="<?php echo $_SESSION["UserID"]?>" />
    <div class="bouteille" data-quantite="">
        <div class="description">
            <p>Nom: <input class="input" name="nom" value="<?php echo $usager['nom'] ?>"></p>
            <p>Prenom :<input class="input"  name="prenom" value="<?php echo $usager['prenom'] ?>"></p>
            <p>Courriel: <input class="input"  name="courriel" value="<?php echo $usager['courriel'] ?>"></p>
            <p>Description: <input class="input"  id="description" value="<?php echo $usager['description_usager'] ?>"></p>
        </div>
    </div>
    <input type="submit" value="Modifier" name="Submit" class="submitModifierProfile"/>   
  </form>
<?php
}

?>
	
</div>

