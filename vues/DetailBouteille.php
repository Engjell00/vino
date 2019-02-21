<?php
    if(isset($_SESSION["UserID"]))
    {
        if($data){
?>

<?php
    $bool=false;
foreach ($data as $cle => $bouteille) {
    if($bool==false){
   ?>
     <a href='?requete=ajouterNouvelleBouteilleCellier&id_cellier=<?php echo $bouteille['id_cellier'];?>'  id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Ajouter une bouteille</a>
    <?php
     $bool=true;
    }
    ?>
<div class="mdl-layout mdl-js-layout mdl-color--grey-100">
    <main class="mdl-layout__content">
        <div class="mdl-grid">
            <div class="mdl-card mdl-cell mdl-cell--6-col-phone mdl-cell--6-col-tablet mdl-cell--10-col-desktop mdl-shadow--2dp">
                <figure class="mdl-card__media">
                    <img id="imgBouteille" src="https:<?php echo $bouteille['image_bouteille_cellier'] ?>">
                </figure>
                <div class="mdl-card__title">
                    <h1 class="mdl-card__title-text"><?php echo $bouteille['nom_bouteille_cellier'] ?></h1>
                </div>
                <div class="mdl-card__supporting-text">
                    <ul>
                    <li class="quantite" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" >Quantité : <?php echo $bouteille['quantite'] ?></li>
                        <li>Code SAQ : <?php echo $bouteille['code_saq_cellier'] ?></li>
                        <li>Pays : <?php echo $bouteille['pays_cellier'] ?></li>
                        <li>Prix à l'achat : <?php echo $bouteille['prix_a_lachat'] ?></li>
                        <li>Format : <?php echo $bouteille['format_bouteille_cellier'] ?></li>
                        <li>Date d'achat : <?php echo $bouteille['date_achat'] ?></li>
                        <li>Expiration : <?php echo $bouteille['expiration'] ?></li>
                        <li>Millesime : <?php echo $bouteille['millesime'] ?></li>
                        <li>  <div class="ConteneurCommentaire" >
                <div>
                    
                    <?php 
        if($bouteille['commentaire'])
    {
                echo "<p>";
                   echo "Votre  commentaire : ".$bouteille['commentaire'];
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
            </div></li>
                    </ul>
                </div>
                 <div class="mdl-card__actions mdl-card--border" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" >
                    <a class="mdl-button mdl-button--colored" href='?requete=pageModifierBouteilleCellier&idBouteille=<?php echo $bouteille['id_bouteille_cellier'] ?>' >Modifier</a>
                    <a class="bouton supprimerBouteille mdl-button" type='button'  data-id-bouteille="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-cellier="<?php echo $bouteille['id_cellier'] ?>"  >Supprimer</a>
                    <a class="btnAjouter mdl-button mdl-button--colored">Ajouter</a>
                    <a class="btnBoire mdl-button mdl-button--colored">Boire</a>
                </div>
            </div>
        </div>
           
       
           
         
    
    
<?php

        }
        }
        else{
            echo $_GET["id_cellier"]."<br>";
            echo "<a href='?requete=ajouterNouvelleBouteilleCellier&id_cellier=".$_GET["id_cellier"]."'>Ajouter une bouteille au cellier</a>";
            echo "<h1>vous n avez aucune bouteille dans votre cellier</h1>";
        }
    }
?>	

