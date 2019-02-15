<?php
foreach ($data as $cle => $usager) {
     ?>
<div class="profil mdl-layout__tab-panel is-active" id="overview" data-quantite="">
    <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
        <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                <h4 class="mdl-cell mdl-cell--12-col">Mon profil</h4>
                <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                    <h5>Votre Nom :<span>
                            <?php  echo $usager["nom"];  ?></span></h5>
                    <h5>Votre Prenom :<span>
                            <?php  echo $usager["prenom"];  ?></span></h5>
                    <h5>Votre Courriel :<span>
                            <?php  echo $usager["courriel"];  ?></span></h5>
                    <h5>Votre description :<span>
                            <?php  echo $usager["description_usager"];  ?></span></h5>

                    <div class="mdl-card__actions">
                        <a href='?requete=pageModifierProfile&idProfile=<?php echo $_SESSION["UserID"]?>' class="bouton mdl-button">Modifier mon profil</a>
                    </div>



                </div>

            </div>

        </div>
    </section>
</div>
<?php
}    
     ?>
