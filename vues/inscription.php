<h1>Formulaire d'inscription</h1>
	<form method="POST" >
		Votre nom d'utilisateur : <input type="text" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" name="utilisateur"/><br>
		Votre mot de passe <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*" placeholder="mot de passe" name="motDePasse" ><br>
		Votre nom <input type="text" placeholder="nom" name="nom" ><br>
		Votre prénom <input type="text" placeholder="prenom" name="prenom" ><br>
		Votre courriel <input type="email" name="courriel" required><br>
		Courte Description <input type="text" placeholder="description" class="description" required><br>
		<input class='inscription bouton' type="submit" value="S'inscrire"/>
	</form>