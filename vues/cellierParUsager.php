<div class="cellier">
      <?php
foreach ($data as $cle => $cellier) {
     ?> 
    <div class="profil" data-quantite="">
     <div>
          <a class="bouton" href='index.php?requete=afficheCellier&id_cellier=<?php  echo $cellier["id_cellier"];  ?>'><?php  echo $cellier["nom_cellier"];  ?></a>  
        </div>   
    </div>
</div>
<?php

}
    
   