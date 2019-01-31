<div class="cellier">
<?php
foreach ($data as $cle => $bouteille) {
    ?>
   <form  method ="POST"> 
    <input type="hidden" name="id" value="<?php echo $bouteille['id_bouteille_cellier'];?>" />
    <div class="bouteille" data-quantite="">
        <div class="img">
            <img src="https:<?php echo $bouteille['image'] ?>">
        </div>
        <div class="description">
            <input name="nom" value="<?php echo $bouteille['nom'] ?>">
            <input name="quantite" value="<?php echo $bouteille['date_achat'] ?>">
            <input name="quantite" value="<?php echo $bouteille['prix'] ?>">
            <input name="quantite" value="<?php echo $bouteille['quantite'] ?>">
            <input name="pays" value="<?php echo $bouteille['pays'] ?>">
            <input name="type" value="<?php echo $bouteille['garde_jusqua'] ?>">
            <input name="millesime" value="<?php echo $bouteille['millesime'] ?>">
        </div>
    </div>
    <input type="hidden" name="action" value="modifierBouteilleCellier"/>
    <input type="submit" value="Modifier" name="Submit"/>   
  </form>
<?php
}

?>
	
</div>


