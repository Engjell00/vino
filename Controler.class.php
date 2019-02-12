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
					$this->accueilConnecter();
					break;	
				case 'formulaireInscription':
					$this->formulaireInscription();
					break;
				case 'inscription':
					$this->inscriptionParUnUsager();
					break;
				case 'login':
					$this->connectionParUnUsager();
					break;
				case 'cellierParUsager':
					$this->listeDesCelliersParUsager();
					break;
				case 'afficheUnCellierDunUsager':
					$this->afficheUnCellierDunUsager();	
					break;						
				case 'listeBouteille':
					$this->listeBouteille();
					break;
                case 'AjouterUnCellier':
                    $this->pageAjoutCellier();
               		break;
                case 'ConfirmerAjoutCellier' :
                  $this->creeCellier();
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
				case 'rechercherBouteilleParType':
					$this->rechercherBouteilleParType();
					break;	
				case 'modifierBouteilleCellier':
					$this->modifierBouteilleCellier();
					break;
				case 'pageModifierProfile':
					$this->pageModifierProfile();
					break;
				case 'modifierProfilUsager':
					$this->modifierProfilUsager();
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
		/**
		 * Connection d'un usager à l'accueil
		 */
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
		private function creeCellier()
		{
				$cle = new Cellier();
				//var_dump(file_get_contents('php://input'));
				$body = json_decode(file_get_contents('php://input'));
				$creationCellier = $cle->creeCellier($_SESSION["UserID"],$body->nom);
				echo json_encode(["status" => true, "url"=>"index.php?requete=cellierParUsager&id_usager='".$_SESSION["UserID"]."'"]);
			
		}
		private function pageAjoutCellier(){
			include("vues/entete.php");
			include("vues/ajouterCellier.php");
			include("vues/pied.php");
		}
		/**
		 * Inscription d'un nouveau usager sur le site
		 */
		private function inscriptionParUnUsager(){
			$body = json_decode(file_get_contents('php://input'));
                if(!empty($body)){
                    $usager = new Usager();
                    $resultat = $usager->creationUsager($body);
                }
		}
		/**
		 * Suppresion d'une bouteille dans le cellier 
		 * */
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
		/**
		 * rechercher des bouteilles par le type envoyer le nom,la quantitée, le pays etc..
		 */
		private function rechercherBouteilleParType(){
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$bte = new Bouteille();
				$resultat = $bte->rechercherBouteilleParValeur($body);
				echo json_encode($resultat);   
			}
		}
		/**
		 * Affichage des celliers selon l'usager
		 */
		private function listeDesCelliersParUsager(){
			$usager = new bouteille();
			$data = $usager->getListeDesCelliersParUsager($_SESSION["UserID"]);
			include("vues/entete.php");
			include("vues/cellierParUsager.php");
			include("vues/pied.php");

		}
		/**
		 * Affichage d'un cellier lorsque l'utilisateur connecter veut y accéder 
		 */
		private function afficheUnCellierDunUsager(){
			$usager = new bouteille();
			$data = $usager->getListeBouteilleCellier($_GET["id_cellier"],$_SESSION["UserID"]);
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
		}
		/**
		 * Page modifier profile d'un utilisateur
		 */
		private function pageModifierProfile(){
			if($_SESSION["UserID"]==$_GET["idProfile"]){
				$usager = new usager();
				$data = $usager->getProfile($_GET["idProfile"]);
				include("vues/entete.php");
				include("vues/modifierProfile.php");
				include("vues/pied.php");
			}
		}
		/*
		* Envoye des données pour la modification du profile
		*/ 
		private function modifierProfilUsager(){
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$usager = new Usager();
				$resultat = $usager->modifierUsagerProfile($body);
				//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
				if($resultat){
					echo json_encode(["status" => true, "url"=>"index.php?requete=profile"]);
				}
			}
			else{
				
				include("vues/entete.php");
				include("vues/modifierProfile.php");
				include("vues/pied.php");
			}
		}
		/**
		 * Page pour modifier une bouteille dans le cellier
		 */
		private function pageModifierBouteilleCellier(){
			$bte = new Bouteille();
			$data = $bte->getBouteilleParID($_GET["idBouteille"]);
			include("vues/entete.php");
			include("vues/modifierBouteille.php");
			include("vues/pied.php");
		}
		/**
		 * Envoye des données lorsqu'on voudra modifier.
		 */
		private function modifierBouteilleCellier(){
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$bte = new Bouteille();
				$resultat = $bte->modifierBouteilleAuCellier($body);
				//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
				echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier='".$body->id_cellier."'"]);
               
			}
			else{
				
				include("vues/entete.php");
				include("vues/modifierBouteille.php");
				include("vues/pied.php");
			}
		}
		/**
		 * Ajout d'une nouvelle bouteille dans le cellier
		 */
		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				//var_dump($data);
				$resultat = $bte->ajouterBouteilleCellier($body);
				//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
				echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier='".$body->id_cellier."'"]);
			}
			else{
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");   
			}
		}
		/**
		 * Page d'accueil quand un utilisateur n'est pas connecté
		*/		
		private function accueil()
		{
			include("vues/entete.php");
			include("vues/accueil.php");
			include("vues/pied.php");
                  
		}
		/**
		 * Page d'accueil d'un utilisateur lorsqu'il est connecté
		 */
		private function accueilConnecter()
		{
			include("vues/entete.php");
			include("vues/accueilConnecter.php");
			include("vues/pied.php");
                  
		}
		/**
		 * formulaire d'inscription
		 */
		private function formulaireInscription (){
			include("vues/entete.php");
			include("vues/inscription.php");
			include("vues/pied.php");
		}
		/**
		 * Chercher le profil d'un user lorsqu'il se connecte
		 */
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















