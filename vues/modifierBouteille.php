<div class="bouteille mdl-layout__tab-panel is-active" id="overview">
    <section class="section--center mdl-grid ">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                    <?php
foreach ($data as $cle => $bouteille) {
    //Affichage de la bouteille qu'on a reçu lorsqu'on veut l'ajouter rien de très compliquer,
    //Manque simplement de recevoir l'utilisateur en paramètre par la suite, vu que sans $_SESSION, c'est un peu
    //Mal coder
    ?>
                    <form method="POST">
                        <input type="hidden" name="idBouteille" value="<?php echo $bouteille['id_bouteille'];?>" />
                        <input type="hidden" name="idBouteilleCellier" value="<?php echo $bouteille['id_bouteille_cellier'];?>" />
                        <input type="hidden" name="idCellier" value="<?php echo $bouteille['id_cellier'];?>" />


                        <div class="img">
                    <?php
                            if($bouteille['image_bouteille_cellier'] != "" && $bouteille['image_bouteille_cellier'] != "imageNONdeposer" ){
                                /**Condition qui regarde si le lien de l'image reçu provient de la SAQ 
                                    * ou seulement de l'usager d'une bouteille non listée*/
                                if (strpos($bouteille['image_bouteille_cellier'], '//s7d9') === 0) {
                    ?>
                                    <img src="<?php echo $bouteille['image_bouteille_cellier'] ?>" height="200" width="200">
                    <?php
                                }else{
                    ?>
                                    <img src="<?php echo $bouteille['image_bouteille_cellier'] ?>" height="200" width="200">
                                    <?php 
                                }
                            }else{
                    ?>
                                <a href='index.php?requete=pageAjoutPhotoBouteille&id_bouteille_cellier=<?php echo $bouteille['id_bouteille_cellier'];?>&id_Cellier=<?php echo $bouteille['id_cellier'];?>' class="mdl-button">Ajouter une photo</a>      
                    <?php
                            }
                     ?>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="nom" name="nom" value="<?php echo $bouteille['nom_bouteille_cellier'] ?>">
                            <label class="mdl-textfield__label" for="nom">Nom...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="format" name="format" value="<?php echo $bouteille['format_bouteille_cellier'] ?>">
                            <label class="mdl-textfield__label" for="format">Format...</label>
                        </div><br>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="quantite" name="quantite" value="<?php echo $bouteille['quantite'] ?>">
                            <label class="mdl-textfield__label" for="quantite">Quantite...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="pays" name="pays" value="<?php echo $bouteille['pays_cellier'] ?>">
                            <label class="mdl-textfield__label" for="pays">Pays...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="prix" name="prix" value="<?php echo $bouteille['prix_a_lachat'] ?>">
                            <label class="mdl-textfield__label" for="prix">Prix...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="date_achat" name="date_achat" value="<?php echo $bouteille['date_achat'] ?>">
                            <label class="mdl-textfield__label" for="date_achat">Date Achat...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="expiration" name="expiration" value="<?php echo $bouteille['expiration'] ?>">
                            <label class="mdl-textfield__label" for="expiration">Date d'expiration...</label>
                        </div><br>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="input mdl-textfield__input" type="text" id="millesime" name="millesime" value="<?php echo $bouteille['millesime'] ?>">
                            <label class="mdl-textfield__label" for="millesime">Millesime...</label>
                        </div><br>
                        <div class="mdl-card__actions">
                            <a type="submit" value="Modifier" name="Submit" class="mdl-button submitModifierBouteille">Modifier la bouteille</a>
                        </div>
                    </form>
                    <!--<input type="submit" value="Modifier" name="Submit" class="submitModifierBouteille" />-->
                    <?php
}
?>
                </div>
            </div>
        </div>
    
    </section>
</div>
