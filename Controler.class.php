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
			
			switch ($_GET['requete']) {
				case 'intro':
					$this->intro();
					break;
				case 'accueil':
					$this->accueil();
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
				case 'supprimerUnCellier':
					$this->supprimerUnCellier();
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
                case "profil":
					$this->getMonProfil();
					break;
                case 'statistiques':
                	$this->chercherStatistiques();
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
				case 'rechercheBouteilleTousLesCelliers':
					$this->rechercheBouteilleTousLesCelliers();
					break;		
				case 'modifierBouteilleCellier':
					$this->modifierBouteilleCellier();
					break;
				case 'pageModifierProfil':
					$this->pageModifierProfil();
					break;
				case 'modifierProfilUsager':
					$this->modifierProfilUsager();
					break;	
				case 'ajouterUnCommentaire':
					$this->ajouterUnCommentaire();
					break;
				case 'pageAjoutPhotoBouteille':
					$this->pageAjoutPhotoBouteille();
					break;
				case 'ajouterPhotoBouteilleNonListee':
					$this->ajouterPhotoBouteilleNonListee();
					break;			
				case 'SupprimerBouteilleAuCellier':
					$this->SupprimerBouteilleAuCellier();
					break;
				case 'afficherDetailsBouteille':
					$this->afficherDetailsBouteille();
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
					$this->intro();
					break;	    
				default:
					$this->intro();
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
	/**
	 * Inscription d'un nouveau usager sur le site
	 */
	private function inscriptionParUnUsager(){
		$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$usager = new Usager();
				$resultat = $usager->creationUsager($body);
                echo json_encode(["status" => true, "url"=>"index.php?requete=accueil"]);
			}
	}
	/**
	 * Créer cellier par utilisateur
	 *  */	
	private function creeCellier()
	{
			$cle = new Cellier();
			$body = json_decode(file_get_contents('php://input'));
			$creationCellier = $cle->creeCellier($_SESSION["UserID"],$body->nom);
			$creationCellier=str_replace("''","",$creationCellier);
			echo json_encode(["status" => true, "url"=>"index.php?requete=ajouterNouvelleBouteilleCellier&id_cellier=".$creationCellier]);
		
	}
	/**
	 * Page dédié d'une bouteille en particulier et afficher les détails 
	 */
    private function afficherDetailsBouteille()
    {
        $bte = new Bouteille();
        $id_bouteille_cellier = $_GET['id_bouteille_cellier'];
        $data= $bte->getBouteilleParId($id_bouteille_cellier);
        include("vues/entete.php");
		include("vues/DetailBouteille.php");
		include("vues/pied.php");
	}
	/**
	 * Pour la page admin, 
	 * chercher les statistiques présentes de tous les utilisateurs du site 
	 */
	private function chercherStatistiques()
    {
			$usg = new Usager();
			$resultat = $usg->mesStatistiques();
			$data2 = $usg->verifierAutorisation();  
			$data3 = $usg->prixEnMoyenneParUsager();
			include("vues/entete.php");
			include("vues/statistique.php");
			include("vues/pied.php");
    }
	/**
	 * Ajout d'un commentaire sur une bouteille
	 */
    private function ajouterUnCommentaire()
    {
        $bte = new Bouteille();
        $body = json_decode(file_get_contents('php://input'));
        $suprimerComm = $bte->ajouterUnCommentaire($body);
         echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier=".$body->id_cellier]);
    }
    /**
	 * Supprimer des celliers
	 */
    private function supprimerUnCellier()
    {
       	$cle = new Cellier();
        //var_dump(file_get_contents('php://input'));
        $body = json_decode(file_get_contents('php://input'));
        $supressionCellier = $cle->supprimerUnCellier($body->id);
        echo json_encode(["status" => true, "url"=>"index.php?requete=cellierParUsager"]);
	}
	/**
	 * Page d'ajout d'un nouveau cellier
	 */
	private function pageAjoutCellier(){
		include("vues/entete.php");
		include("vues/ajouterCellier.php");
		include("vues/pied.php");
	}
	/**
	 * Formulaire d'ajout d'une bouteille non listé
	 */
	private function pageAjoutPhotoBouteille(){
		include("vues/entete.php");
		include("vues/uploadPhoto.php");
		include("vues/pied.php");
	}
	/**
	 * Ajouter une photo d'une bouteille non listée
	 */
	private function ajouterPhotoBouteilleNonListee(){
		if(empty($_FILES['fichierPhoto']['tmp_name']) || !is_uploaded_file($_FILES['fichierPhoto']['tmp_name']))
		{
			echo json_encode(["status" => true, "message"=>"Veuillez rentrer une image"]);
		}else{
				$bte = new Bouteille();
				$repertoire = "img/imagesBouteilleUsager/";
				$nomFichier = $repertoire . basename($_FILES["fichierPhoto"]["name"]);
				$uploadOk = true;
				$imageType = strtolower(pathinfo($nomFichier,PATHINFO_EXTENSION));
				$check = getimagesize($_FILES["fichierPhoto"]["tmp_name"]);
				if($check !== false) {
					$uploadOk = true;
				} else {
					echo "Le fichier n'est pas une image.";
					$uploadOk = false;
				}
				if ($_FILES["fichierPhoto"]["size"] > 5000000) {
					echo "Le fichier est trop gros.";
					$uploadOk = false;
				}
				if ($uploadOk == false) {
					echo "Upload impossible.";
				}
				if ($uploadOk == false) {
					echo "Upload impossible.";
				} else {
						move_uploaded_file($_FILES["fichierPhoto"]["tmp_name"], $nomFichier); 
					}
				$resultat = $bte->ajouterPhotoALaBouteilleNonListee($nomFichier,$_POST["idBouteilleCellier"]);
				if($resultat){
					echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier=".$_POST["idCellier"]]); 
				}
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
				echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier=".$body->idCellier]);       
			}
			else{
                $usg = new Usager();
                $data2 = $usg->verifierAutorisation();
				include("vues/entete.php");
				include("vues/cellier.php");
				include("vues/pied.php");
			}
	}
	/**
	 * rechercher des bouteilles par le type envoyer le nom,la quantitée, le pays etc..
	 */
	private function rechercherBouteilleParType(){
		$bte = new Bouteille();
		$body = json_decode(file_get_contents('php://input'));
		if(!empty($body)){
			$resultat = $bte->rechercherBouteilleParValeur($body);
			if($resultat){
				echo $resultat;
			}		
		}
	}
	/**
	 * Rechercher des bouteilles dans tous les celliers
	 */
	private function rechercheBouteilleTousLesCelliers()
	{
			$body = json_decode(file_get_contents('php://input'));
			if(!empty($body)){
				$bte = new Bouteille();        
				$RechercheBouteille = $bte->rechercheBouteilleTousLesCelliers($body);		
				echo $RechercheBouteille; 
			}
	}
	/**
	 * Affichage des celliers selon l'usager
	 */
	private function listeDesCelliersParUsager(){
        if(isset($_SESSION["UserID"])){
			$bouteille = new Bouteille();
			$data = $bouteille->getListeDesCelliersParUsager($_SESSION["UserID"]);
			$nombreDeBouteilles = $bouteille->getNombreDeBouteilleParCellierUsager($_SESSION["UserID"]);
			$usg = new Usager();
			$data2 =$usg->verifierAutorisation();
			include("vues/entete.php");
			include("vues/cellierParUsager.php");
			include("vues/pied.php");
        }
        else{
			$erreur = true;
			include("vues/entete.php");
			include("vues/accueil.php");
			include("vues/pied.php");
        }
	}
	/**
	 * Affichage d'un cellier lorsque l'utilisateur connecter veut y accéder 
	 */
	private function afficheUnCellierDunUsager(){
		$bouteille = new Bouteille();
		$data = $bouteille->getListeBouteilleCellier($_GET["id_cellier"],$_SESSION["UserID"]);
        $usg = new Usager();
        $data2 = $usg->verifierAutorisation();
		include("vues/entete.php");
		include("vues/cellier.php");
		include("vues/pied.php");
	}
	/**
	 * Page modifier profil d'un utilisateur
	 */
	private function pageModifierProfil(){
		if($_SESSION["UserID"] == $_GET["idProfil"]){
			$usager = new Usager();
			$data = $usager->getProfil($_GET["idProfil"]);
            $usg = new Usager();
            $data2 = $usg->verifierAutorisation();
			include("vues/entete.php");
			include("vues/modifierProfil.php");
			include("vues/pied.php");
		}
	}
	/*
	* Envoye des données pour la modification du profil
	*/ 
	private function modifierProfilUsager(){
		$body = json_decode(file_get_contents('php://input'));
		if(!empty($body)){
			$usager = new Usager();
			$resultat = $usager->modifierUsagerProfil($body);
			//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
			if($resultat){
				echo json_encode(["status" => true, "url"=>"index.php?requete=profil"]);
			}
		}
		else{
				$usg = new Usager();
				$data2 = $usg->verifierAutorisation();
				include("vues/entete.php");
				include("vues/modifierProfil.php");
				include("vues/pied.php");
		}
	}
	/**
	 * Page pour modifier une bouteille dans le cellier
	 */
	private function pageModifierBouteilleCellier(){
		$bte = new Bouteille();
		$data = $bte->getBouteilleParID($_GET["idBouteille"]);
        $usg = new Usager();
        $data2 = $usg->verifierAutorisation();
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
		    //var_dump($body);
			$bte = new Bouteille();
			$resultat = $bte->modifierBouteilleAuCellier($body);
			//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
			echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier=".$body->id_cellier]);
		}
		else{
			$usg = new Usager();
            $data2 = $usg->verifierAutorisation();
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
		if(!empty($body)){
			$bte = new Bouteille();
			$resultat = $bte->ajouterBouteilleCellier($body);
			//Envoyé le url en json pour traiter la redirection dans le javascript par la suite.
			if($resultat){
				echo json_encode(["status" => true, "url"=>"index.php?requete=afficheUnCellierDunUsager&id_cellier=".$body->id_cellier]);
			}
		}
		else{
            $usg = new Usager();
            $data2 = $usg->verifierAutorisation();
			include("vues/entete.php");
			include("vues/ajouter.php");
			include("vues/pied.php");   
		}
	}
	/**
	 * Page introduction au produit
	 */
	private function intro()
    {
		include("vues/intro.html");
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
	 * formulaire d'inscription
	 */
	private function formulaireInscription (){
        $usg = new Usager();
        $data2 = $usg->verifierAutorisation();
		include("vues/entete.php");
		include("vues/inscription.php");
		include("vues/pied.php");
	}
	/**
	 * Chercher le profil d'un user lorsqu'il se connecte
	 */
	private function getMonProfil()
	{   
        $usg = new Usager();
        $data2 = $usg->verifierAutorisation();
		$usager = new Usager();
		$data = $usager->getProfil($_SESSION["UserID"]);
		include("vues/entete.php");
		include("vues/profil.php");
		include("vues/pied.php");
        }
        else
        {
        include("vues/entete.php");
		include("vues/accueil.php");
		include("vues/pied.php");    
        }
				
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












