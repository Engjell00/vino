<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			session_start();
			switch ($_GET['requete']) {
				case 'formulaireInscription':
					include("vues/entete.php");
					include("vues/inscription.php");
					include("vues/pied.php");
					break;
				case 'inscription':
					$this->inscriptionParUnUsager();
					break;
				case 'login':
					$this->connectionParUnUsager();
					break;			
				case 'listeBouteille':
					$this->listeBouteille();
					break;
				case 'autocompleteBouteille':
					$this->autocompleteBouteille();
					break;
				case 'ajouterNouvelleBouteilleCellier':
					$this->ajouterNouvelleBouteilleCellier();
					break;
				case 'ajouterBouteilleCellier':
					$this->ajouterBouteilleCellier();
					break;
				case 'boireBouteilleCellier':
					$this->boireBouteilleCellier();
					break;
				case 'pageModifierBouteilleCellier':
					$this->pageModifierBouteilleCellier();
					break;
				case 'modifierBouteilleCellier':
					$this->modifierBouteilleCellier();
					break;	
                case 'getbouteillebyid':
                	getbouteillbyid();
                	break;
                case 'SupprimerBouteilleAuCellier':
					$this->SupprimerBouteilleAuCellier();
					break;
				case "Logout":
					$_SESSION = array();
					if (ini_get("session.use_cookies")) {
						$params = session_get_cookie_params();
						setcookie(session_name(), '', time() - 42000,
							$params["path"], $params["domain"],
							$params["secure"], $params["httponly"]
						);
					}
					session_destroy();
					$data = listeBouteille();
					include("vues/entete.php");
					include("vues/cellier.php");
					include("vues/pied.php");
					break;	    
				default:
					$this->accueil();
					break;
			}
		}
		private function connectionParUnUsager(){
			$body = json_decode(file_get_contents('php://input'));
                if(!empty($body)){
                    $usager = new Usager();
                    $resultat = $usager->Authentification($body);
					if($resultat){
						$_SESSION["UserID"] = $resultat;
						include("vues/entete.php");
						include("vues/cellier.php");
						include("vues/pied.php");
					}
                }

		}
		private function inscriptionParUnUsager(){
			$body = json_decode(file_get_contents('php://input'));
                if(!empty($body)){
                    $usager = new Usager();
                    $resultat = $usager->creationUsager($body);
					if($resultat){
						echo json_encode($resultat);
						$this->accueil();
					}
				
                }
		}
        private function SupprimerBouteilleAuCellier(){
			$body = json_decode(file_get_contents('php://input'));
                if(!empty($body)){
                    $bte = new Bouteille();
                    $resultat = $bte->supprimerLaBouteilleAuCellier($body);
					echo json_encode($resultat);
                }
                else{
                    include("vues/entete.php");
                    include("vues/cellier.php");
                    include("vues/pied.php");
                }

        }
		//Récupérer les informations de la bouteille nécessaires
		//Elle est bien simple,p-t optimiser et changer,
		//Comme j'ai écris en haut on redirige vers la page de modification avec l'ID rêcu
		private function pageModifierBouteilleCellier(){
			$bte = new Bouteille();
			$data = $bte->getBouteilleParID($_GET["idBouteille"]);
			include("vues/entete.php");
			include("vues/modifierBouteille.php");
			include("vues/pied.php");
		}
		//Après avoir récuperer les info il faudra les envoyer pour les ajouter dans le Cellier
		//Bien sûr, elle n'est pas complète, il faudra aussi envoyer le nom d'utilisateur, 
		//j'imagine qui sera en 2ième parametre pour permettre de recevoir le body en son entier pareillement.
		private function modifierBouteilleCellier(){
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$bte = new Bouteille();
				$resultat = $bte->modifierBouteilleAuCellier($body);
				echo json_encode($resultat);
			}
			else{
				
				include("vues/entete.php");
				include("vues/modifierBouteille.php");
				include("vues/pied.php");
			}
		}
		// sert seulement a tester les nouvelles methodes de bouteille
		private function tests()
		{
			echo 'PAGE TEST';
			$bte = new Bouteille();
			// $data = $bte->getListeBouteilleCellier(1, 1); // TESTÉ
			// $data = $bte->getBouteilleParId(1); // TESTÉ
			// $data = $bte->getListeBouteille(); // TESTÉ
			// $data = $bte->getBouteilleCellierParID(1,1); // TESTÉ
			//$data = $bte->modifierBouteilleCellier($array) // NON TESTÉ
			//$data = $bte->ajouterBouteilleCellier($array) // NON TESTÉ
			// $data = $bte->modifierQuantiteBouteilleCellier(1, 10); // TESTÉ
			
			include("vues/entete.php"); 
			include("vues/cellier.php");
			include("vues/pied.php");
                  
		}		
		//Suite a la modification de getListeBouteilleCellier, la methode prends maintenant les id de l'usage et du cellieer
		//la DB a maintenant des usagés, nom dèusager et mot de passe correspondant a nos prenoms
		//Ceci est a modifier par la suite, lors de l'utilisation de la variable SESSION
 
		private function accueil()
		{
			include("vues/entete.php");
			include("vues/accueil.php");
			include("vues/pied.php");
                  
		}
   
		private function listeBouteille()
		{
			$bte = new Bouteille();
            $cellier = $bte->getListeBouteilleCellier();
            
            echo json_encode($cellier);
                  
		}
		
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			//var_dump(file_get_contents('php://input'));
			$body = json_decode(file_get_contents('php://input'));
            $listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}
		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$resultat = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
			
            
		}
		
		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			echo json_encode($resultat);
            
		}

		private function ajouterBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
			echo json_encode($resultat);
		}
		
}
?>















