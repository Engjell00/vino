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
class Cellier extends Modele {
	const TABLE = 'vino_cellier';
    /**
	 * Cette méthode permet de retourner la liste des celliers par Usagers
	 * 
	 * @param Int id de l'usager
	 * @return array La liste des cellier d'un usager
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
	 * Cette méthode permet de créer un nouveau cellier d'un usager connecté
	 * 
	 * @param Int id de l'usager
	 * @param string Nom du Cellier
	 * @return INT le dernier cellier ajouté
	 */
    public function creeCellier($idUsager,$nomCellier)
    {
            try{ 
				$requete = "INSERT INTO " . self::TABLE . "( nom_cellier,id_usager) VALUES ("."'".$nomCellier."',"."'".$idUsager."')";
				if($res = $this->_db->query($requete)== true){
					$last_id =$this->_db->insert_id; 
					return $last_id;
				}
            }
            catch(Exception $e){
                trigger_error('Une erreur s\'est produite lors de la création du cellier');
            } 
	}
	 /**
	 * Cette méthode supprimer un cellier d'un usager connecté
	 * 
	 * @param Int id du cellier
	 * @return Boolean Retourne True si la query s'est bien éxécuté
	 */
    public function supprimerUnCellier($id)
    {
       try{
				$requete0="delete from contient where id_cellier=$id";
                $this->_db->query($requete0);
                $requete = "delete from vino_cellier where id_cellier=$id";
				$res = $this->_db->query($requete);
                return $res;
                
            }
            catch(Exception $e){
                trigger_error('Une erreur s\'est produite lors de la création du cellier');
            }  
        
    }

	
}




?>