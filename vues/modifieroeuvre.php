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
            <input name="nom" value="<?php echo $bouteille['nom'] ?>"><br>
            <input name="description" value="<?php echo $bouteille['description'] ?>"><br>
            <input name="prix" value="<?php echo $bouteille['prix'] ?>"><br>
            <input name="format" value="<?php echo $bouteille['format'] ?>"><br>
            <input name="data_achat" value="<?php echo $bouteille['data_achat'] ?>"><br>
            <input name="expiration" value="<?php echo $bouteille['expiration'] ?>"><br>
            <input name="quantite" value="<?php echo $bouteille['quantite'] ?>"><br>
            <input name="notes" value="<?php echo $bouteille['notes'] ?>"><br>
            <input name="millesime" value="<?php echo $bouteille['millesime'] ?>"><br>
        </div>
    </div>
    <input type="submit" value="Modifier" name="Submit" class="submitModifierBouteille"/>   
  </form>
<?php
}

?>
	
</div>


