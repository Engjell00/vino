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
				case 'accueil':
					$this->accueil();
					break;
				case 'accueilConnecter':
					require_once("vues/entete.php");
					require_once("vues/accueilConnecter.php");
					require_once("vues/pied.php");
					break;	
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
                case "profile" :
					$this->getMonProfil();
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
					$this->accueil();
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
					if(!empty($_SESSION["UserID"])){
						echo $_SESSION["UserID"];
					}
				}
			}
		}
		private function inscriptionParUnUsager(){
			$body = json_decode(file_get_contents('php://input'));
                if(!empty($body)){
                    $usager = new Usager();
                    $resultat = $usager->creationUsager($body);
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
		private function pageModifierBouteilleCellier(){
			$bte = new Bouteille();
			$data = $bte->getBouteilleParID($_GET["idBouteille"]);
			include("vues/entete.php");
			include("vues/modifierBouteille.php");
			include("vues/pied.php");
		}
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
		private function accueil()
		{
			include("vues/entete.php");
			include("vues/accueil.php");
			include("vues/pied.php");
                  
		}
    	private function getMonProfil()
		{
			$usager = new Usager();
			$data = $usager->getProfile($_SESSION["UserID"]);
			include("vues/entete.php");
			include("vues/profile.php");
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















