
</main>
 <footer class="mdl-mini-footer">
<div class="mdl-mini-footer__left-section">
 <div class="mdl-logo">Vino</div>
 <ul class="mdl-mini-footer__link-list">
     <?php
         if(isset($_SESSION["UserID"]))
         { 
     ?>
       <li><a href="index.php?requete=profil">Mon Profil</a></li>
       <li><a href="index.php?requete=cellierParUsager">Mes cellier</a></li>
       <li><a href="index.php?requete=Logout" >Se déconnecter</a></li>
     <?php
     } if(!isset($_SESSION["UserID"]))
           { 
         ?>
     <li><a hhref="index.php?requete=inscription">Inscription</a></li>
     <li><a href="index.php?requete=accueil">Connexion</a></li>
     <?php
           } 
     ?>
 </ul>
</div>
</footer>

</body>

</html>