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
class Cellier extends Modele {
	const TABLE = 'vino_cellier';
 
 
     
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
    
    
    
    
    
    public function creeCellier($idUsager,$nomCellier)
    {
      	
            try{
				//$passwordEncrypte = password_hash($data->motDePasse, PASSWORD_DEFAULT);  
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
    public function suprimerCellier($id)
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