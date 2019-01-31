/**
 * @file Script contenant les fonctions de base
 * @author Jonathan Martel (jmartel@cmaisonneuve.qc.ca)
 * @version 0.1
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 *
 */

 //const BaseURL = "http://127.0.0.1/vino/";
const BaseURL = document.baseURI;
console.log(BaseURL);
window.addEventListener('load', function() {
    console.log("load");
    document.querySelectorAll(".btnBoire").forEach(function(element){
        console.log(element);
        element.addEventListener("click", function(evt){
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request(BaseURL+"requete=boireBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});
           console.log(requete);
            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.json();
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.log(response);
                modifierQuantiteBouteilles(response);
              }).catch(error => {
                console.error(error);
              });

            
           
           // let quantite=document.querySelectorAll(".quantite").forEach(function(element){
                
             //   if(element.dataset.id ==id){
        //console.log(element.dataset.id);
                   // let idquantite=element.innerHTML;
                    
                   // console.log(idquantite);
                  // idquantite -=1;
                   // if(idquantite<0){
                      //  idquantite=0;
                   // }
                  // element.innerHTML=idquantite;
               // }
        
 //});

           
            let quantite=document.querySelectorAll(".quantite").forEach(function(element){
                
                if(element.dataset.id ==id){
        console.log(element.dataset.id);
                    let idquantite=element.innerHTML;
                    
                    console.log(idquantite);
                   idquantite -=1;
                    if(idquantite<0){
                        idquantite=0;
                    }
                   element.innerHTML=idquantite;
                }
        
 });

        })
        
        
    });

    document.querySelectorAll(".btnAjouter").forEach(function(element){
        console.log(element);
        element.addEventListener("click", function(evt){
            let id = evt.target.parentElement.dataset.id;
            let requete = new Request(BaseURL+"requete=ajouterBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});

            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                    
                  return response.json();
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                modifierQuantiteBouteilles(response);
                console.debug(response);
              }).catch(error => {
                console.error(error);
              });
            
            

                  // let quantite=document.querySelectorAll(".quantite").forEach(function(element){
                
                //if(element.dataset.id ==id){
        
                    //let idquantite=element.innerHTML;
                    
                   // console.log(idquantite);
                   //idquantite++;
                    //////element.innerHTML=idquantite;
                 
               //// }
        
// });

                   let quantite=document.querySelectorAll(".quantite").forEach(function(element){
                
                if(element.dataset.id ==id){
        
                    let idquantite=element.innerHTML;
                    
                    console.log(idquantite);
                   idquantite++;
                    element.innerHTML=idquantite;
                 
                }
        
 });

            
            
            
        })

    });
   
    let inputNomBouteille = document.querySelector("[name='nom_bouteille']");
    console.log(inputNomBouteille);
    let liste = document.querySelector('.listeAutoComplete');

    if(inputNomBouteille){
      inputNomBouteille.addEventListener("keyup", function(evt){
        console.log(evt);
        let nom = inputNomBouteille.value;
        liste.innerHTML = "";
        if(nom){
          let requete = new Request(BaseURL+"requete=autocompleteBouteille", {method: 'POST', body: '{"nom": "'+nom+'"}'});
          fetch(requete)
              .then(response => {
                  if (response.status === 200) {
                    return response.json();
                  } else {
                    throw new Error('Erreur');
                  }
                })
                .then(response => {
                  console.log(response);
                  
                 
                  response.forEach(function(element){
                    liste.innerHTML += "<li data-id='"+element.id +"'>"+element.nom+"</li>";
                  })
                }).catch(error => {
                  console.error(error);
                });
        }
        
        
      });

      let bouteille = {
        nom : document.querySelector(".nom_bouteille"),
        millesime : document.querySelector("[name='millesime']"),
        quantite : document.querySelector("[name='quantite']"),
        date_achat : document.querySelector("[name='date_achat']"),
        prix : document.querySelector("[name='prix']"),
        garde_jusqua : document.querySelector("[name='garde_jusqua']"),
        notes : document.querySelector("[name='notes']"),
      };


      liste.addEventListener("click", function(evt){
        console.dir(evt.target)
        if(evt.target.tagName == "LI"){
          bouteille.nom.dataset.id = evt.target.dataset.id;
          bouteille.nom.innerHTML = evt.target.innerHTML;
          
          liste.innerHTML = "";
          inputNomBouteille.value = "";

        }
      });

      let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
      if(btnAjouter){
        btnAjouter.addEventListener("click", function(evt){
          var param = {
            "id_bouteille":bouteille.nom.dataset.id,
            "date_achat":bouteille.date_achat.value,
            "garde_jusqua":bouteille.garde_jusqua.value,
            "notes":bouteille.date_achat.value,
            "prix":bouteille.prix.value,
            "quantite":bouteille.quantite.value,
            "millesime":bouteille.millesime.value,
          };
          let requete = new Request(BaseURL+"requete=ajouterNouvelleBouteilleCellier", {method: 'POST', body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    } else {
                      throw new Error('Erreur');
                    }
                  })
                  .then(response => {
                    console.log(response);
                  
                  }).catch(error => {
                    console.error(error);
                  });
        
        });
      } 
  }
    function modifierQuantiteBouteilles(objet){
     console.log(objet);
        
        let quantite=document.querySelectorAll(".quantite").forEach(function(element){
            objet.forEach(function(monElement){
                
                if(element.dataset.id==monElement.id){
                element.innerHTML=monElement.quantite;
                }
                
            })
            
            
        });
        
        
    }
    

});

