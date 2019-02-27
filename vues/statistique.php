<?php
if(isset($_SESSION["UserID"])){
    if($data2==1){
?>
 
     <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
         <thead>
             <tr><th class="mdl-data-table__cell--non-numeric">Nom</th><th class="mdl-data-table__cell--non-numeric">prenom</th><th class="mdl-data-table__cell--non-numeric">courriel</th><th class="mdl-data-table__cell--non-numeric">description</th><th class="mdl-data-table__cell--non-numeric">nombre de celliers</th><th class="mdl-data-table__cell--non-numeric">Prix Moyen des Bouteilles</th></tr></thead><tbody>
<?php
 foreach ($resultat as $cle => $usager) {
     if($usager['id_usager']!= $_SESSION["UserID"])
     {
         echo "<tbody><tr><td class='mdl-data-table__cell--non-numeric'>".$usager['nom']."</td><td class='mdl-data-table__cell--non-numeric'>".$usager['prenom']."</td><td class='mdl-data-table__cell--non-numeric'>".$usager['courriel']."</td><td class='mdl-data-table__cell--non-numeric'>".$usager['description_usager']."</td><td class='mdl-data-table__cell--non-numeric'>".$usager['nombre']."</td><td class='mdl-data-table__cell--non-numeric'>";
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
        echo "Vous n'êtes pas autorisé à acceder à cette page";
    }  
}
else{
    echo "Vous n'êtes pas autorisé à acceder à cette page";
}
?>	
             </tbody>
</table>

