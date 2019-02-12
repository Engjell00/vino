<?php
/**
 * Class Bouteille
 * Cette classe possède les fonctions de gestion des bouteilles dans le cellier et des bouteilles dans le catalogue complet.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Bouteille extends Modele {
	const TABLE = 'vino_bouteille';
    
	public function getListeBouteille()
	{
		
		$rows = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
			// var_dump($rows);
		}
		
		return $rows;
	}
	public function getListeDesCelliersParUsager($id_usager)
	{
		
		$rows = Array();
		$res = $this->_db->query("Select * from vino_cellier where id_usager = $id_usager" );
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
			// var_dump($rows);
		}
		
		return $rows;
	}

	/**
	 * Cette méthode permet de retourner la liste des bouteilles dans un cellier donné
	 * 
	 * @param Int id de l'usager
	 * @param Int id du cellier
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */

	
	public function getBouteilleParId($idBouteille)
	{
		$rows = Array();
		$requete ="SELECT * FROM contient	WHERE id_bouteille_cellier = $idBouteille";
		$res = $this->_db->query($requete);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
			// var_dump($rows);
			return $rows;			
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
		
		
		
		return $rows;
	}

	/**
	 * Cette méthode permet de retourner la liste des bouteilles dans un cellier donné
	 * 
	 * @param Int id de l'usager
	 * @param Int id du cellier
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */

	
	public function getListeBouteilleCellier($id_cellier, $id_usager)
	{
		$rows = Array();
		$requete ="SELECT * from contient WHERE id_cellier = $id_cellier";
		$res = $this->_db->query($requete);
		// var_dump($res->num_rows);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			// var_dump($res);
			if($res->num_rows)
			{

				while($row = $res->fetch_assoc())
				{
					$row["nom_bouteille_cellier"] = trim(utf8_encode($row["nom_bouteille_cellier"]));
					$rows[] = $row;
				}
				// var_dump($rows);
			}
			else 
			{
			return false;

			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
		
		
		
		return $rows;
	}
	
	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */
       
	public function autocomplete($nom, $nb_resultat=10)
	{
		
		$rows = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		//echo $nom;
		$requete ='SELECT id_bouteille, nom_bouteille,image_bouteille,code_saq,url_img_bouteille,id_type_bouteille FROM vino_bouteille where LOWER(nom_bouteille) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		//var_dump($requete);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom_bouteille'] = trim(utf8_encode($row['nom_bouteille']));
					$rows[] = $row;
					
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de données", 1);
			 
		}
		
		
		//var_dump($rows);
		return $rows;
	}
	/**
	 * Cette méthode permet de chercher une bouteille par son id unique de cellier quand l'utilisateur va vouloir modifier ses bouteilles
	 * 
	 * @param Int id de la bouteille du cellier
	 * @param Int id du cellier
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return Array informations completes sur la bouteille du cellier
	 */
	
	function getBouteilleCellierParID($id_bouteille_cellier, $id_cellier)
	{
		$requete = "SELECT * from contient WHERE id_bouteille_cellier = $id_bouteille_cellier AND id_cellier = $id_cellier";
		$res = $this->_db->query($requete);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
			// var_dump($rows);
			return $rows;			
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			//$this->_db->error;
		}
	
	}



	/**
	 * Celle methode sert  Elle sert à modifier la bouteille après avoir récupérer les données
	 * 
	 * @param Array data contenant les infos personnalisés de l'usager dans son cellier, ainsi que l'id_bouteille_cellier et id_cellier
	 * 
	 * @return Boolean Succès ou échec de l'ajout. 
	 * 
	 */
	// REQUÊTE TESTÉE EN PHPMYADMIN
	// NON TESTÉE SUR LE SITE Elle sert à modifier la bouteille après avoir récupérer les données,Il faudra changer les données puisque les tables sont différentes.
	// TODO: TESTER
	public function modifierBouteilleAuCellier($data)
	{
		$requete = "UPDATE contient SET nom_bouteille_cellier = '".$data->nom."' ,prix_a_lachat='".$data->prix."',format_bouteille_cellier= '".$data->format."',date_achat= '".$data->date_achat. "',expiration= '".$data->expiration. "',quantite= '".$data->quantite."',pays_cellier='".$data->pays."',millesime='".$data->millesime."' WHERE id_bouteille_cellier = '".$data->id_bouteille_cellier."' AND id_cellier = '".$data->id_cellier."' AND id_bouteille = '".$data->id_bouteille."'";
		$res = $this->_db->query($requete);
		return $res;
		
	}
    //Supprimer
    public function supprimerLaBouteilleAuCellier($data){
		$requete = "DELETE FROM contient where id_bouteille_cellier = '".$data->idBouteille."' AND id_cellier = '".$data->idCellier."'";
		$res = $this->_db->query($requete);
		return $res;
	}
	
	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 * 
	 */
	public function ajouterBouteilleCellier($data)
	{
		//TODO : Valider les données.
		//var_dump($data);	
		$requete = "INSERT INTO contient(id_bouteille,id_cellier,nom_bouteille_cellier,image_bouteille_cellier,pays_cellier,date_achat,notes,prix_a_lachat,quantite,millesime,id_type) VALUES (".
		"'".$data->id_bouteille."',".
        "'".$data->id_cellier."',".
        "'".$data->nom_bouteille_cellier."',".      
        "'".$data->image_bouteille."',".
        "'".$data->pays_bouteille."',".
		"'".$data->date_achat."',".
		"'".$data->notes."',".
		"'".$data->prix."',".
		"'".$data->quantite."',".
		"'".$data->millesime."',".
        "'".$data->id_type."')";
        $res = $this->_db->query($requete);
		return $res;       
	}
	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	// TODO: TESTER 
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		//TODO : Valider les données.
		$rows = Array();	
		$requete = "UPDATE contient SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id_bouteille_cellier = ". $id;
		//echo $requete;
        $res = $this->_db->query($requete);
        $requete2 ="select id_bouteille_cellier,quantite from contient";
        $resultat = $this->_db->query($requete2);
		if($resultat->num_rows)
		{
			while($row = $resultat->fetch_assoc())
			{
				$rows[] = $row;
				// var_dump($rows);
			}
		}
		return $rows;
	}
	public function rechercherBouteilleParValeur($data){
		$requete = "SELECT * FROM contient WHERE $data->typeDeRecherche  like '%".$data->valeurRechercher."%' AND id_cellier ='".$data->id_cellier."' ";
		var_dump($requete);
		$res = $this->_db->query($requete);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
			// var_dump($rows);
			return $rows;			
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
	}
}




?>