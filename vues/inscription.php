<!--<h1>Formulaire d'inscription</h1>
	<form method="POST" >
		Votre nom d'utilisateur : <input type="text" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="utilisateur"/><br>
		Votre mot de passe <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*" placeholder="mot de passe" name="motDePasse" ><br>
		Votre nom <input type="text" placeholder="nom" name="nom" ><br>
		Votre prénom <input type="text" placeholder="prenom" name="prenom" ><br>
		Votre courriel <input type="email" name="courriel" required><br>
		Courte Description <input type="text" placeholder="description" class="description" required><br>
		<input class='inscription bouton' type="submit" value="S'inscrire"/>
	</form>-->
  <div class="mdl-layout__tab-panel is-active" id="overview">

                <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
                    <div class="mdl-card mdl-cell mdl-cell--12-col">
                        <div class="mdl-card__supporting-text mdl-grid mdl-grid--no-spacing">
                            <h4 class="mdl-cell mdl-cell--12-col">Inscription</h4>
                           
                            <div class="section__text mdl-cell mdl-cell--10-col-desktop mdl-cell--6-col-tablet mdl-cell--3-col-phone">
                                <h5>Votre Profil</h5>
                                <form method="POST">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample3" name="nom">
                                        <label class="mdl-textfield__label" for="sample3">Nom...</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample3" name="prenom">
                                        <label class="mdl-textfield__label" for="sample3">Prenom...</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample3" name="utilisateur">
                                        <label class="mdl-textfield__label" for="sample3">Nom d'usager...</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample3" name="motDePasse">
                                        <label class="mdl-textfield__label" for="sample3">Mot de passe...</label>
                                    </div>
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" id="sample3" name="courriel">
                                        <label class="mdl-textfield__label" for="sample3">Courriel...</label>
                                    </div>
                                      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input description" type="text" id="sample3">
                                        <label class="mdl-textfield__label" for="sample3">Description...</label>
                                    </div>
                                   <input class='inscription' type="submit" value="S'inscrire"/>
                                </form>
                            </div>
                            </div>
                        </div>
               
                </section>
               
            </div>