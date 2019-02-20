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
    
    <option value="millesime">millesime</option>
    <option value="pays_cellier">pays</option>
  </select>
  <input type="hidden" value="<?php echo $_GET["id_cellier"]; ?>" name="valeurIdCellier">
  <input class='rechercher bouton' type="submit" value="Rechercher des bouteilles"/>
</form>
<input class="SupprimerResultat" type="button" value="X">
<div class="resultatRecherche">
</div>
<?php
    $bool=false;
foreach ($data as $cle => $bouteille) {
    if($bool==false){
   ?>
     <a href='index.php?requete=ajouterNouvelleBouteilleCellier&id_cellier=<?php echo $bouteille['id_cellier'];?>'  id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Ajouter une bouteille</a>
    <?php
     $bool=true;
    }
    ?>
    <div class="bouteille mdl-layout__tab-panel is-active" id="overview">
        <div class="DisplayCellier">
        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
             <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone mdl-color--red-900 mdl-color-text--white">
                <?php
                    if($bouteille['image_bouteille_cellier'] != ""){
                ?>
                    <img src="https:<?php echo $bouteille['image_bouteille_cellier'] ?>" height="200" width="200">
                <?php
                    }else{
                ?>
                    <a href='index.php?requete=pageAjoutPhotoBouteille&id_bouteille_cellier=<?php echo $bouteille['id_bouteille_cellier'];?>&id_Cellier=<?php echo $bouteille['id_cellier'];?>' class="mdl-button">Ajouter une photo</a>      
                <?php
                    }
                 ?>
                    </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--6-col-phone">
                <div  class="description mdl-card__supporting-text">
                    <a href='?requete=afficherDetailsBouteille&id_bouteille_cellier= <?php echo $bouteille['id_bouteille_cellier'] ?>'> <h5 class="nom"><?php echo $bouteille['nom_bouteille_cellier'] ?></h5></a>
                    <ul  data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                        <li class="pays format"><?php echo $bouteille['pays_cellier'] ?>, <?php echo $bouteille['format_bouteille_cellier'] ?> ml </li>
                        <li>$<?php echo $bouteille['prix_a_lachat'] ?></li>
                        <li class="quantite" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" >Quantité : <?php echo $bouteille['quantite'] ?></li>
                    </ul>
                    </div>
                <div class="mdl-card__actions" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                    <a class="bouton mdl-button" href='?requete=pageModifierBouteilleCellier&idBouteille=<?php echo $bouteille['id_bouteille_cellier'] ?>'>Modifier</a>
                    <a class="bouton supprimerBouteille mdl-button" type='button'  data-id-bouteille="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-cellier="<?php echo $bouteille['id_cellier'] ?>"  >Supprimer</a>
                    <a class="bouton btnBoire mdl-button" type='button' >Boire</a>
                    <a class="bouton btnAjouter mdl-button" type='button' >Ajouter</a>
                </div>
            </div>
            
        </section>
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
