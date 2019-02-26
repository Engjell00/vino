<div class="mdl-layout__tab-panel is-active" id="overview">
    <section class="section--center mdl-grid ">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
<?php
    foreach ($data as $cle => $usager) {
    //Affichage de la bouteille qu'on a reçu lorsqu'on veut l'ajouter rien de très compliquer,
    //Manque simplement de recevoir l'utilisateur en paramètre par la suite, vu que sans $_SESSION, c'est un peu
    //Mal coder
    ?>
    
   <form  method ="POST">
   <input type="hidden" name="idUsager" value="<?php echo $_SESSION["UserID"]?>" />
       
       <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="nom" name="nom" value="<?php echo $usager['nom'] ?>">
                            <label class="mdl-textfield__label" for="nom">Nom...</label>
                        </div><br>
       <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="prenom" name="prenom" value="<?php echo $usager['prenom'] ?>">
                            <label class="mdl-textfield__label" for="prenom">Prenom...</label>
                        </div><br>
        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="courriel" name="courriel" value="<?php echo $usager['courriel'] ?>">
                            <label class="mdl-textfield__label" for="courriel">Courriel...</label>
                        </div><br>
       <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="description" name="description" value="<?php echo $usager['description_usager'] ?>">
                            <label class="mdl-textfield__label" for="description">Description...</label>
                        </div><br>
       <div class="mdl-card__actions">
                <a type="submit" value="Modifier" name="Submit" class="mdl-button submitModifierProfil">Sauvegarder</a>
              </div>
       </form>
    
    
        
            
           
           
          

  
<?php
}
                    

?>
	
                </div>
            </div>
        </div>
    </section>
</div>




