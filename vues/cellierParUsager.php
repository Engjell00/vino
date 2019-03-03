<?php
if($data){
    ?>
    <div  class="bouteille mdl-layout__tab-panel is-active" id="overview">
        <div class="mdl-card mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone mdl-shadow--2dp">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h2 class="mdl-card__title-text">Rechercher dans vos celliers</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" id="recherche" name="valeurRechercher">
                    <label class="mdl-textfield__label" for="recherche">Rechercher...</label>
                    <select class="mdl-textfield__input" id="octane" name="typeDeRecherchetoutcelliers">
                        <option value="nom_bouteille_cellier">nom</option>
                        <option value="prix_a_lachat">prix</option>
                        <option value="millesime">millesime</option>
                        <option value="pays_cellier">pays</option>
                    </select>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="recherchetoutcelliers mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type='button'>Rechercher</a>
                <a class="SupprimerResultat mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect " type='button'>Supprimer les résultats </a>
            </div>
        </div>
    </section>
</div>
<div class="resultatRechercheTousLesCelliers">
</div>
<?php
foreach ($data as $cle => $cellier) {
     ?>
<div class="cellier mdl-layout__tab-panel is-active" id="overview">
    <div class="profil" data-quantite="">
        
            <div class="mdl-card mdl-cell mdl-cell--5-col-desktop mdl-cell--5-col-tablet mdl-cell--4-col-phone mdl-shadow--2dp">
                <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                    <h4 class="mdl-cell mdl-cell--12-col">
                        <?php  echo $cellier["nom_cellier"];  ?>
                    </h4>
                    <div class="section__circle-container mdl-cell mdl-cell--2-col mdl-cell--1-col-phone">
                        <div class="mdl-card__media"><img src="./img/cellier.jpg" height="100" width="100"></div>
                    </div>
                    <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">


                    
                         
                                
                                <ul>
                                    <?php
                            $teste=false;
                            foreach ($nombreDeBouteilles as $cle => $bouteille) {
                                if($cellier["id_cellier"] == $bouteille["cellierUsager"]){
                                    $teste=true;
                                ?>
                                    <li>Nombres de bouteilles:
                                        <?php  echo $bouteille["nombre_de_bouteilles"]; ?>
                                    </li>
                                    <?php
                                }
                            }
                        if($teste==false){
                            echo "<li>Nombres de bouteilles: 0</li>";
                            }
                                ?>
                                </ul>
                            </div>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="bouton mdl-button" id="idcellier" data-id="<?php  echo $cellier["id_cellier"]; ?>" href='index.php?requete=afficheUnCellierDunUsager&id_cellier=
                                    <?php  echo $cellier["id_cellier"];  ?>'><i class="material-icons">
                                        open_in_new
                                    </i></a>
                                <a class="boutonPoubelle mdl-button" data-id="<?php  echo $cellier["id_cellier"]; ?>" name="supprimerUnCellier" value="supprimer Un Cellier"><i class="material-icons">
                                        delete
                                    </i></a>
                            </div>
                        </div>


                    </div>



                </div>

            </div>
 
            <?php

}
}
    else{

    echo "<h3 class='message mdl-cell mdl-cell--12-col'>Vous n'avez aucun cellier à votre profil</h3>";
    }
?>
            <div class="profil" data-quantite="">
                <div>
                    <a href='index.php?requete=AjouterUnCellier'  id="view-source" class="bouton mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast"><i class="material-icons">add</i></a>

                </div>
            </div>
<div class="marginCellier"></div>
