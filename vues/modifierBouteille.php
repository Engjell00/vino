<div class="cellier">
<?php
foreach ($data as $cle => $bouteille) {
    //Affichage de la bouteille qu'on a reçu lorsqu'on veut l'ajouter rien de très compliquer,
    //Manque simplement de recevoir l'utilisateur en paramètre par la suite, vu que sans $_SESSION, c'est un peu
    //Mal coder
    ?>
   <form  method ="POST">
    <input type="hidden" name="idBouteille" value="<?php echo $bouteille['id_bouteille'];?>" /> 
    <input type="hidden" name="idBouteilleCellier" value="<?php echo $bouteille['id_bouteille_cellier'];?>" />
    <input type="hidden" name="idCellier" value="<?php echo $bouteille['id_cellier'];?>" />
    <div class="bouteille" data-quantite="">
        <div class="img">
            <img src="https:<?php echo $bouteille['image_bouteille_cellier'] ?>">
        </div>
        <div class="description">
            <p>Nom: <input class="input" name="nom" value="<?php echo $bouteille['nom_bouteille_cellier'] ?>"></p>
            <p>Format :<input class="input"  name="format" value="<?php echo $bouteille['format_bouteille_cellier'] ?>"></p>
            <p>Pays: <input class="input"  name="pays" value="<?php echo $bouteille['pays_cellier'] ?>"></p>
            <p>Prix: <input class="input"  name="prix" value="<?php echo $bouteille['prix_a_lachat'] ?>"></p>
            <p>Date Achat :<input class="input"  name="date_achat" value="<?php echo $bouteille['date_achat'] ?>"></p>
            <p>Expiration :<input class="input"  name="expiration" value="<?php echo $bouteille['expiration'] ?>"></p>
            <p>Quantite :<input class="input"  name="quantite" value="<?php echo $bouteille['quantite'] ?>"></p>
            <p>Millesime: <input class="input"  name="millesime" value="<?php echo $bouteille['millesime'] ?>"></p>
        </div>
    </div>
    <input type="submit" value="Modifier" name="Submit" class="submitModifierBouteille"/>   
  </form>
<?php
}

?>
	
</div>


