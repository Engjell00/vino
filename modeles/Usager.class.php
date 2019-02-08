<?php
/**
 * Class Usager
 * Cette classe gère la creation d'usager et la gestion de leurs profils
 * 
 * @author Alexanne Morneault
 * @version 1.0
 * @update 2019-01-31
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */


// TODO : TEST METHODS. SEE IF CELLIER CLASS NEEDED


class Usager extends Modele {
    const TABLE = 'vino_usager';
    

    /**
	 * Cette méthode permet a l'usager de voir les bouteilles dans un cellier donné
	 * 
	 * @param Int id de l'usager a rechercher
	 * 
	 * @return Array
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
    
    
    
    
     public function getProfile($idUsager)
	{
		
		$rows = Array();
		$requete ="SELECT vino_usager.id_usager,nom,prenom,courriel,count(contient.id_cellier) as nombre FROM vino_usager join vino_cellier on vino_usager.id_usager=vino_cellier.id_cellier join contient on vino_cellier.id_cellier=contient.id_cellier WHERE vino_usager.id_usager = $idUsager";
					 
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
        
     // TODO: INCOMPLETE METHOD
     
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
	 * Cette méthode ajoute un usager a la table vino_usager
	 * 
	 * @param Array $data Tableau des données du user
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
    
    

     public function creationUsager($data)
	{
		//TODO : Valider les données.
        //var_dump($data);
        if(isset($data->nom_usager) && isset($data->mot_de_passe_usager)&& isset($data->description_usager)){     	
            try{
                $requete = "INSERT INTO " . self::TABLE . "(nom_usager, mot_de_passe_usager, description_usager) VALUES (".
                "'".$data->nom_usager."',".
                "'".$data->mot_de_passe_usager."',".
                "'".$data->description_usager."')";
        
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
	
	
}




?>