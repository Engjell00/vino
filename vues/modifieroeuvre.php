<div class="cellier">
<?php
foreach ($data as $cle => $bouteille) {
    //Affichage de la bouteille qu'on a reçu lorsqu'on veut l'ajouter rien de très compliquer,
    //Manque simplement de recevoir l'utilisateur en paramètre par la suite, vu que sans $_SESSION, c'est un peu
    //Mal coder
    ?>
   <form  method ="POST"> 
    <input type="hidden" name="id" value="<?php echo $bouteille['id_bouteille_cellier'];?>" />
    <div class="bouteille" data-quantite="">
        <div class="img">
            <img src="https:<?php echo $bouteille['image'] ?>">
        </div>
        <div class="description">
            <input name="nom" value="<?php echo $bouteille['nom_bouteille_cellier'] ?>"><br>
            <input name="description" value="<?php echo $bouteille['format_bouteille_cellier'] ?>"><br>
            <input name="prix" value="<?php echo $bouteille['pays_cellier'] ?>"><br>
            <input name="format" value="<?php echo $bouteille['prix_a_lachat'] ?>"><br>
            <input name="data_achat" value="<?php echo $bouteille['data_achat'] ?>"><br>
            <input name="expiration" value="<?php echo $bouteille['expiration'] ?>"><br>
            <input name="quantite" value="<?php echo $bouteille['quantite'] ?>"><br>
            <input name="millesime" value="<?php echo $bouteille['millesime'] ?>"><br>
        </div>
    </div>
    <input type="submit" value="Modifier" name="Submit" class="submitModifierBouteille"/>   
  </form>
<?php
}

?>
	
</div>


