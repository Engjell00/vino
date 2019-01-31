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
            <input name="quantite" value="<?php echo $bouteille['code_saq'] ?>"><br>
            <input name="quantite" value="<?php echo $bouteille['prix'] ?>"><br>
            <input name="quantite" value="<?php echo $bouteille['description'] ?>"><br>
            <input name="pays" value="<?php echo $bouteille['pays'] ?>"><br>
            <input name="type" value="<?php echo $bouteille['format'] ?>"><br>
        </div>
    </div>
    <input type="hidden" name="action" value="modifierBouteilleCellier"/>
    <input type="submit" value="Modifier" name="Submit"/>   
  </form>
<?php
}

?>
	
</div>


