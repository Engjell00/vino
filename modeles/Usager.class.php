<?php
/**
 * Class Usager
 * Cette classe gère la creation d'usager et la gestion de leurs profils
 * @version 1.0
 * @update 2019-01-31
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Usager extends Modele {
	const TABLE = 'vino_usager';
    /**
	 * Cette méthode permet a l'usager de voir les bouteilles dans un cellier donné
	 * 
	 * @param Int id de l'usager a rechercher
	 * 
	 * @return Array Les bouteilles
	 */
	public function getListeBouteillesCellier($idUsager, $idCellier)
	{
		$rows = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
		}
		return $rows;
	}
	/**
	 * Cette méthode permet d'afficher les informations de l'usager connecté sur la vue Profil.php
	 * 
	 * @param Int id de l'usager
	 * @return Array Les informations nécessaire pour l'affichage du profil connecté
	 */
     public function getProfil($idUsager)
	{
		
		$rows = Array();
		$requete ="SELECT id_usager,nom,description_usager,prenom,courriel FROM vino_usager  WHERE vino_usager.id_usager = $idUsager";
					 
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			return $res;
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 $this->_db->error;
		}
	}
	/**
	 * Cette méthode permet a l'usager de voir les celliers lui appartenant
	 * 
	 * @param Int id de l'usager a rechercher
	 * 
	 * @return Array
	 */
	public function getListeCellier($idUsager)
	{
		$rows = Array();
		$requete ="SELECT * FROM vino_cellier WHERE id_usager = $idUsager";
					 
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 $this->_db->error;
		}
		return $rows;
	}
    /**
	 * Cette méthode permet de vérifier si l'usager est un admin ou un simple utilisateur du site web
	 * 
	 * @param Int $_SESSION["UserID"]
	 * @return Int Une valeur de 1 sera attribué aux admin et 0 au reste des utilisateurs
	 */
    public function verifierAutorisation()
    {
        if(isset($_SESSION["UserID"])){
			$requete ="SELECT autorisation FROM vino_usager WHERE id_usager=".$_SESSION["UserID"];
			$res = $this->_db->query($requete);
			if($res){
					$resultat=mysqli_fetch_assoc($res);
					return $resultat['autorisation'];
			}
        }
    }
     /**
	 * Cette méthode permet d'afficher sur la page admin, les statistique des utilisateurs inscrit.
	 * 	1- Le nom & prenom
	 * 	2- Le courriel
	 *  3- Description
	 *  4- le Nombre de cellier de chacun 	
	 * 
	 * @return Array Les informations contribuants au statistique sur la page admin
	 */
    public function mesStatistiques()
    {
		$requete = "select vino_cellier.id_cellier as vino_cellier_ID,vino_usager.id_usager,vino_usager.nom,vino_usager.prenom,courriel,description_usager,count(vino_cellier.id_cellier) as nombre 
					from vino_usager join vino_cellier on vino_usager.id_usager = vino_cellier.id_usager group by vino_cellier.id_usager ";
         if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 $this->_db->error;
		}
		return $rows;
        
	}
	 /**
	 * Cette méthode permet d'afficher le prix moyen des bouteilles etle nombre de bouteille  appartenant à chacun des utilisateurs
	 * 
	 * @return Array Le prix moyen des bouteilles de chacun des usager dans leur celliers et le nombre de bouteille par usager
	 */
	public function prixEnMoyenneParUsager()
	{
		
		$rows = Array();
		$requete = "Select contient.id_cellier as contientIDCellier,ROUND(SUM(prix_a_lachat)/count(quantite), 2) as prixMoyenDesBouteilles,SUM(quantite) as quantiteParUsager 
		from contient
		join vino_cellier on contient.id_cellier = vino_cellier.id_cellier
		group by vino_cellier.id_usager";			
					 
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$rows[] = $row;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 $this->_db->error;
		}
		return $rows;
	}
    
	/**
	 * Cette méthode ajoute un usager a la table vino_usager
	 * 
	 * @param Array $data Tableau des données du user
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
     public function creationUsager($data)
	{
        if(isset($data->utilisateur) && isset($data->motDePasse)){   	
            try{
				$passwordEncrypte = password_hash($data->motDePasse, PASSWORD_DEFAULT);  
                $requete = "INSERT INTO " . self::TABLE . "(nom_usager, mot_de_passe_usager,nom,prenom,courriel,description_usager) VALUES ("."'".$data->utilisateur."',"."'".$passwordEncrypte."',"."'".$data->nom."',"."'".$data->prenom."',"."'".$data->courriel."',"."'".$data->description."')";
				$res = $this->_db->query($requete);
                return $res;
            }
            catch(Exception $e){
                trigger_error('Une erreur s\'est produite lors de la création du compte');
            }
        }
        else {
            trigger_error('Tout les champs sont requis.');
        }
		
	}
	/**
	 * Cette méthode permet de vérifier la connection d'un usager lors de son arrivé
	 * 
	 * @param Object $data le mot de passe et le nom d'utilisateur
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	function Authentification($data)
	{
		$requete = "SELECT id_usager,mot_de_passe_usager  from vino_usager WHERE nom_usager = '".$data->utilisateur ."'";
		$res = $this->_db->query($requete);
		while($row = $res->fetch_assoc())
		{
			if(password_verify($data->motDePasse,$row["mot_de_passe_usager"]))
			{
				$id = $row["id_usager"];
				return $id;
			}    
			else
			{
				return false;
			}
		}
	}
	/**
	 * Cette méthode permet de modifier les informartions de l'usager dans son profil s'il désire
	 * 
	 * @param Object $data informartions personnels
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	function modifierUsagerProfil($data){
		$requete="UPDATE vino_usager set nom = '".$data->nom."' , prenom = '".$data->prenom."' , courriel= '".$data->courriel."' , description_usager = '".$data->description."' where id_usager= '".$data->idUsager."'";
		$res = $this->_db->query($requete);
        return $res;
	}
}
?>
