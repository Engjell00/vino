<div class="cellier">
      <?php
foreach ($data as $cle => $usager) {
  
    

    
    
     ?> 
    <div class="profil" data-quantite="">
     <div>
        
          <p>Votre Nom :<span><?php  echo $usager["nom"];  ?></span></p>
         <p> Votre Prenom :<span><?php  echo $usager["prenom"];  ?></span></p>
        </p> Votre Courriel :<span><?php  echo $usager["courriel"];  ?></span></p>
        </p>vous avez :<span><?php  echo $usager["nombre"]." celliers";  ?></span></p>
        
        </div>   
   
    </div>
	
</div>
<?php

}
    
    
     ?>