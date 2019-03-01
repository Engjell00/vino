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
<a href='index.php?requete=ajouterNouvelleBouteilleCellier&id_cellier=<?php echo $bouteille['id_cellier'];?>'  id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast"><i class="material-icons">add</i></a>

<?php
     $bool=true;
    }
    ?>
<div class="bouteille mdl-layout__tab-panel is-active" id="overview">
 
    <div class="DisplayCellier">
            <div class="mdl-card mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone mdl-shadow--2dp">
              <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col"><?php echo $bouteille['nom_bouteille_cellier'] ?></h4>
                <div class="section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                  <div class="mdl-card__media"><?php
                    if($bouteille['image_bouteille_cellier'] != "" && $bouteille['image_bouteille_cellier'] != "imageNONdeposer" ){
                           /**Condition qui regarde si le lien de l'image reçu provient de la SAQ ou seulement de l'usager */
                        if (strpos($bouteille['image_bouteille_cellier'], '//s7d9') === 0) {
                ?>
                           <a href='?requete=afficherDetailsBouteille&id_bouteille_cellier= <?php echo $bouteille['id_bouteille_cellier'] ?>'><img src="<?php echo $bouteille['image_bouteille_cellier'] ?>" height="100" width="100"></a>
                <?php
                        }else{
                            ?>
                      <a href='?requete=afficherDetailsBouteille&id_bouteille_cellier= <?php echo $bouteille['id_bouteille_cellier'] ?>'><img src="/vino/<?php echo $bouteille['image_bouteille_cellier'] ?>" height="100" width="100"></a>
                            <?php 
                        }
                    }else{
                ?>
                    <a href='index.php?requete=pageAjoutPhotoBouteille&id_bouteille_cellier=<?php echo $bouteille['id_bouteille_cellier'];?>&id_Cellier=<?php echo $bouteille['id_cellier'];?>' class="mdl-button">Ajouter une photo</a>      
                <?php
                    }
                 ?>
                    </div>
                </div>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                  <ul  data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                        <li class="pays format"><?php echo $bouteille['pays_cellier'] ?>, <?php echo $bouteille['format_bouteille_cellier'] ?> ml </li>
                        <li>$<?php echo $bouteille['prix_a_lachat'] ?></li>
                        <li class="quantite" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" >Quantité : <?php echo $bouteille['quantite'] ?></li>
                    </ul>
                </div>
                  <div class="mdl-card__actions mdl-card--border" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>">
                
                      
                     
                      
                      
                      
                      
                    <a class="bouton btnBoire mdl-js-button mdl-button--fab mdl-button--mini-fab" data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" type='button' ><i class="material-icons">remove</i></a>
                    <a class="btnAjouter mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab" type='button' data-id="<?php echo $bouteille['id_bouteille_cellier'] ?>" ><i class="material-icons">add</i></a>
                      
                      
                       <a class="boutonPoubelle supprimerBouteille mdl-button" type='button'  data-id-bouteille="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-cellier="<?php echo $bouteille['id_cellier'] ?>"><i class="material-icons" data-id-bouteille="<?php echo $bouteille['id_bouteille_cellier'] ?>" data-id-cellier="<?php echo $bouteille['id_cellier'] ?>">delete</i></a>
                      
              </div>
             
                </div>
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
