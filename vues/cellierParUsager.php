<div class="cellier">
      <?php
if($data){
foreach ($data as $cle => $cellier) {
     ?> 
    <div class="profil" data-quantite="">
     <div>
          <a class="bouton" id="idcellier" data-id="<?php  echo $cellier["id_cellier"]; ?>" href='index.php?requete=afficheUnCellierDunUsager&id_cellier=<?php  echo $cellier["id_cellier"];  ?>'><?php  echo $cellier["nom_cellier"];  ?></a> 
         <input type="button" data-id="<?php  echo $cellier["id_cellier"]; ?>" name="suprimerCelier" value="Suprimer Le selier">
        </div>   
    </div>
</div>
<?php

}
}
    else{

    echo "<h3>vous n avez pas de cellier</h3>";
    }
?>
     <div class="profil" data-quantite="">
     <div>
<a class='bouton' href='index.php?requete=AjouterUnCellier'> Ajoutez un cellier</a>
           </div>
</div>