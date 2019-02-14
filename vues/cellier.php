<?php
    if(isset($_SESSION["UserID"]))
    {
        if($data){
?>
<form method="POST">
  <input class="input" name="valeurRechercher" >
  <select name="typeDeRecherche">
    <option value="nom_bouteille_cellier">nom</option>
    <option value="prix_a_lachat">prix</option>
    <option value="quantite">quantite</option>
    <option value="millesime">millesime</option>
    <option value="pays_cellier">pays</option>
  </select>
  <input type="hidden" value="<?php echo $_GET["id_cellier"]; ?>" name="valeurIdCellier">
  <input class='rechercher bouton' type="submit" value="Rechercher des bouteilles"/>
</form>
<input class="SupprimerResultat" type="button" value="Annuler Recherche">
<div class="resultatRecherche">
</div>
<div class="cellier">
   
<?php
                  $bool=false;
foreach ($data as $cle => $bouteille) {
    
    if($bool==false){
   
    
 
    ?>
     <a href='?requete=ajouterNouvelleBouteilleCellier&id_cellier=<?php echo $bouteille['id_cellier'];?>'>Ajouter une bouteille au cellier</a>
    <?php
        $bool=true;
    }
    ?>
    <div class="bouteille" data-quantite="">
        <div class="img">
            
            <img src="https:<?php echo $bouteille['image_bouteille_cellier'] ?>">
        </div>
        <div class="description">
            <p class="nom">Nom : <?php echo $bouteille['nom_bouteille_cellier'] ?></p>
            <p class="quantite" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">Quantité : <?php echo $bouteille['quantite'] ?></p>
            <p class="code_saq">Code SAQ : <?php echo $bouteille['code_saq_cellier'] ?></p>
            <p class="pays">Pays : <?php echo $bouteille['pays_cellier'] ?></p>
            <p class="prix">Prix à l'achat : <?php echo $bouteille['prix_a_lachat'] ?></p>
            <p class="format">Format : <?php echo $bouteille['format_bouteille_cellier'] ?></p>
            <p class="date_achat">Data Achat : <?php echo $bouteille['date_achat'] ?></p>
            <p class="expiration">Expiration : <?php echo $bouteille['expiration'] ?></p>
            <p class="millesime">Millesime : <?php echo $bouteille['millesime'] ?></p>
            <p><a href="<?php echo $bouteille['url_saq_bouteille'] ?>">Voir SAQ</a></p>
        </div>
        <div class="options" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
            <a class="bouton" href='?requete=pageModifierBouteilleCellier&idBouteille=<?php echo $bouteille['id_bouteille_cellier'] ?>'>Modifier bouteille</a>
             <button class="bouton supprimerBouteille" type='button'  data-id-bouteille="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-cellier="<?php echo $bouteille['id_cellier'] ?>">Supprimer</button>
           <img src="./img/iconeAjoutBouteille-Red.png" class='btnAjouter' height="60px" width="60px">
            <button class='btnBoire bouton'>Boire</button>
            <button class='commentaire bouton' name="commentaire">laisser un commentaire</button>
            <div class="ConteneurCommentaire" >
                <div>
                    
                    <?php
        if($bouteille['commentaire'])
    {
                echo "<p>";
                   echo "votre ancien commentaire : ".$bouteille['commentaire'];
                   echo "</p>"; 
    }
    else{
    echo "<p>vous n'avez pas de commentaire!!</p>";
    }
                        ?>
                </div>
                Votre nouveau commentaire : <input type="text" classe="textecommentaire" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
            <button class='envoyerComm'data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">envoyer</button>
                <input type="hidden" name="valeurIdCellier" data-id="<?php echo $bouteille['id_cellier'] ?>">
            </div>
  
        </div>
    </div>
<?php
//LIGNE 24 J'AI AJOUTER UN HREF QUI REDIRIGE VERS LA PAGE DE MODIF AVEC L'ID DE LA BOUTEILLE DANS LE CELLIER
//Il y a des meilleurs façon mais cela fonctionne bien.
//NOTE:
//L'AJOUT DEVRA ÊTRE MODIFIER AUSSI DANS SA VUE ET bouteille class ->>> function ajouterBouteilleCellier

        }
        }
        else{
            echo $_GET["id_cellier"]."<br>";
            echo "<a href='?requete=ajouterNouvelleBouteilleCellier&id_cellier=".$_GET["id_cellier"]."'>Ajouter une bouteille au cellier</a>";
            echo "<h1>vous n avez aucune bouteille dans votre cellier</h1>";
        }
    }
?>	
</div>
