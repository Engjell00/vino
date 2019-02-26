<?php
if(isset($_SESSION["UserID"])){
    if($data2==1){
?>
 <table border="1">
      <tr><th>nom</th><th>prenom</th><th>courriel</th><th>description</th><th>nombre de celliers</th><th>Prix Moyen des Bouteilles</th></tr>
<?php
 foreach ($resultat as $cle => $usager) {
     if($usager['id_usager']!= $_SESSION["UserID"])
     {
         echo "<tr><td>".$usager['nom']."</td><td>".$usager['prenom']."</td><td>".$usager['courriel']."</td><td>".$usager['description_usager']."</td><td>".$usager['nombre']."</td><td>";
         foreach ($data3 as $cle => $moyenne) {
            if($usager['vino_cellier_ID'] == $moyenne['id_cellier'])
            {
               echo  $moyenne["prixMoyenDesBouteilles"]."</td></tr>";
            }
         }
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