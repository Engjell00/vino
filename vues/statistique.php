<?php
if(isset($_SESSION["UserID"])){
    if($data2==1){
?>
 <table border="1">
      <tr><th>nom</th><th>prenom</th><th>courriel</th><th>description</th><th>nombre de celliers</th></tr>
<?php

 foreach ($resultat as $cle => $usager) {
     if($usager['id_usager']!= $_SESSION["UserID"])
     {
       
      echo "<tr><td>".$usager['nom']."</td><td>".$usager['prenom']."</td><td>".$usager['courriel']."</td><td>".$usager['description_usager']."</td><td>".$usager['nombre']."</td></tr>";
          




     }
    
   }
}
    else{
        echo "vous n estes pas autoriser d'acceder a cette page ";
}
    
}
else{
    echo "vous n estes pas autoriser d'acceder a cette page ";
}
?>	
</table>