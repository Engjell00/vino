
 <div class="ajouter mdl-layout__tab-panel is-active" id="overview">
     <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
         <div class="mdl-card mdl-cell mdl-cell--12-col">
             <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                  <h4 class="mdl-cell mdl-cell--12-col">Ajouter une bouteille</h4>
                 <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">



    <div class="nouvelleBouteille" vertical layout>
       <p> Recherche :</p> <input class="input" type="text" name="nom_bouteille">
        <ul class="listeAutoComplete">

        </ul>
            <div >
                <p class="nomBouteille">Nom :</p> <span  data-id="" class="nom_bouteille"></span>
                
                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="quantite" id="quantite" value="1">
                                        <label class="mdl-textfield__label" for="quantite">Quantité...</label>
                                    </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="date_achat" id="date_achat">
                                        <label class="mdl-textfield__label" for="date_achat">Date d'achat...</label>
                                    </div><br>
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="garde_jusqua" id="garde_jusqua">
                                        <label class="mdl-textfield__label" for="garde_jusqua">Date d'expiration...</label>
                                    </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="number" name="prix" id="prix">
                                        <label class="mdl-textfield__label" for="prix">Prix...</label>
                                    </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="pays" id="pays">
                                        <label class="mdl-textfield__label" for="pays">Pays...</label>
                                    </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="millesime" id="millesime">
                                        <label class="mdl-textfield__label" for="millesime">Millesime...</label>
                                    </div><br>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="input mdl-textfield__input" type="text" name="Notes" id="Notes">
                                        <label class="mdl-textfield__label" for="Notes">Notes...</label>
                                    </div><br>
                
                
                <input type="hidden" value="<?php echo $_GET["id_cellier"]; ?>" name="valeurIdCellier">  
            </div>
        
                     </div>
                     </div>
        </div>
    </div>
                 
                 <a name="ajouterBouteilleCellier" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Ajouter la bouteille</a>

