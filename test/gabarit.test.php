<!DOCTYPE html >
<html lang="fr">

	<head>

		<title>Test unitaire</title>
		<meta charset="UTF-8" />
		<link href="../css/global.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
			<h1>Test - Modèles</h1>
		</div>
		<div id="contenu">

			<h2>Connection DB</h2>
			<?php

			$connect = MonSQL::getInstance();
			if ($connect != null) {
				echo "Connection mysqli fonctionnelle";
			} else {
				echo "Erreur de connection mysqli";
			}
			function connectionParUnUsager($array){
				echo "hahahaha";
					if(!empty($array)){
						$usager = new Usager();
						$resultat = $usager->Authentification($array);
						if($resultat){
							session_start();
							$_SESSION["UserID"] = $resultat;
							if(empty($_SESSION["UserID"])){
								return 'marche pas';
							}
							echo $_SESSION["UserID"];
						}
					}
	
			}
			$array = array('utilisateur' => 'naruto00','motDePasse' => 'allo00');
			echo "hahaha";
			die(connectionParUnUsager($array));



			?>
				
	
		<div id="footer">

		</div>
	</body>
</html>

