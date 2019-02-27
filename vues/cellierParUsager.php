<?php
if($data){
    ?>
    <form method="POST">
        <input  class="input" name="valeurRechercher">
        <select name="typeDeRecherchetoutcelliers">
        <option value="nom_bouteille_cellier">nom</option>
        <option value="prix_a_lachat">prix</option>
        <option value="millesime">millesime</option>
        <option value="pays_cellier">pays</option>
        </select>
        <input class="recherchetoutcelliers bouton" type="submit" value="Rechercher des bouteilles"/>
  </form>
  <input class="SupprimerResultat" type="button" value="X">
  <div class="resultatRechercheTousLesCelliers">
  </div>
  <?php
foreach ($data as $cle => $cellier) {
     ?>
<div class="cellier mdl-layout__tab-panel is-active" id="overview">

    <div class="profil" data-quantite="">
        <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                    <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone mdl-color--red-900 mdl-color-text--white">
                        <img src="./img/cellier.jpg" height="200" width="200">
                    </header>
                    <div style="text-decoration: none" class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--6-col-phone">
                        <div  class="mdl-card__supporting-text">
                            <h5><?php  echo $cellier["nom_cellier"];  ?></h5>
                            <ul style="text-decoration: none">
                            <?php
                            $teste=false;
                            foreach ($nombreDeBouteilles as $cle => $bouteille) {
                                if($cellier["id_cellier"] == $bouteille["cellierUsager"]){
                                    $teste=true;
                                ?>
                                    <li>Nombres de bouteilles: <?php  echo $bouteille["nombre_de_bouteilles"]; ?></li>
                                <?php
                                }
                            }
                        if($teste==false){
                            echo "<li>Nombres de bouteilles: 0</li>";
                            }
                                ?>
                            </ul>
                        </div>
                        <div class="mdl-card__actions">
                            <a class="bouton mdl-button" id="idcellier" data-id="<?php  echo $cellier["id_cellier"]; ?>" href='index.php?requete=afficheUnCellierDunUsager&id_cellier=
                <?php  echo $cellier["id_cellier"];  ?>'>Afficher cellier</a>
                            <a class="bouton mdl-button"  data-id="<?php  echo $cellier["id_cellier"]; ?>"  name="suprimerCelier" value="Suprimer Le selier">Supprimer le cellier</a>
                        </div>
                    
                    </div>
                 
                </section>
    </div>
</div>
<?php

}
}
    else{

    echo "<h3>vous n avez pas de cellier</h3>";
    }
?>
<div class="profil" data-quantite="">
    <div>
        <a href='index.php?requete=AjouterUnCellier' target="_blank" id="view-source" class="bouton mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Ajouter un cellier</a>
        
    </div>
</div>


 