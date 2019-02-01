<div class="cellier">
<?php
foreach ($data as $cle => $bouteille) {
 
    ?>
    <div class="bouteille" data-quantite="">
        <div class="img">
            
            <img src="https:<?php echo $bouteille['image_bouteille_cellier'] ?>">
        </div>
        <div class="description">
            <p class="nom">Nom : <?php echo $bouteille['nom_bouteille_cellier'] ?></p>
            <p class="quantite">Quantité : <?php echo $bouteille['quantite'] ?></p>
            <p class="code_saq_cellier">Pays : <?php echo $bouteille['code_saq_cellier'] ?></p>
            <p class="pays_cellier">Pays : <?php echo $bouteille['pays_cellier'] ?></p>
            <p class="prix_a_lachat">Pays : <?php echo $bouteille['prix_a_lachat'] ?></p>
            <p class="format_bouteille_cellier">Type : <?php echo $bouteille['format_bouteille_cellier'] ?></p>
            <p class="date_achat">Type : <?php echo $bouteille['date_achat'] ?></p>
            <p class="expiration">Type : <?php echo $bouteille['expiration'] ?></p>
            <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
            <p><a href="<?php echo $bouteille['url_saq'] ?>">Voir SAQ</a></p>
        </div>
        <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
            <a href='?requete=pageModifierBouteilleCellier&idBouteille=<?php echo $bouteille['id_bouteille_cellier'] ?>'>Modifier bouteille</a>
            <button class='btnAjouter'>Ajouter</button>
            <button class='btnBoire'>Boire</button>
            
        </div>
    </div>
<?php


}

?>	
</div>


