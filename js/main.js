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
  /**
   * Recherche d'une bouteille dans le cellier
   */
    var rechercherBouteillePar =  document.querySelector(".rechercher");
    if(rechercherBouteillePar){
          rechercherBouteillePar.addEventListener("click", function(evt){
            evt.preventDefault();
            let rechercher = {
              valeurRechercher : document.querySelector("[name='valeurRechercher']"),
              typeDeRecherche : document.querySelector("[name='typeDeRecherche']"),
              id_cellier : document.querySelector("[name='valeurIdCellier']"),
            }
            let param = {
              "valeurRechercher":rechercher.valeurRechercher.value,
              "typeDeRecherche":rechercher.typeDeRecherche.value,
              "id_cellier":rechercher.id_cellier.value,
            }
            if(rechercher.valeurRechercher.value != ""){
                console.log(param);
                let requete = new Request(BaseURL+"index.php?requete=rechercherBouteilleParType", {method: 'POST', body: JSON.stringify(param)});
                fetch(requete)
                  .then(response => {
                      if (response.status === 200) {
                        return response.json()
                      } else {
                        throw new Error('Erreur');
                      }
                    })
                    .then(response => {
                      console.log(response)
                      var bouteilleCellier =  document.querySelectorAll(".DisplayCellier");
                      console.log(bouteilleCellier);
                      var resultatRecherche =  document.querySelector(".resultatRecherche");
                      var SupprimerResultat =  document.querySelector(".SupprimerResultat");
                      if(response){
                        resultatRecherche.innerHTML = ""
                        resultatRecherche.style.display="inline";
                        componentHandler.downgradeElements(resultatRecherche);
                        bouteilleCellier.forEach(function(element){
                          element.style.display="none";
                        })
                        var madiv = "";
                        response.forEach(function(element){
                          madiv += '<div class="bouteille mdl-layout__tab-panel is-active" id="overview">';
                          madiv += '<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">';
                          madiv += '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--2-col-phone mdl-color--red-900 mdl-color-text--white">';
                          madiv += "<img src="+element.image_bouteille_cellier+" height='200' width='200'>";
                          madiv += "</header>";
                          madiv += "<div class='mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--6-col-phone'>";
                          madiv += "<div class='description mdl-card__supporting-text'>";
                          madiv += "<a href='?requete=afficherDetailsBouteille&id_bouteille_cellier="+element.id_bouteille_cellier+"'> <h5 class='nom'>"+element.nom_bouteille_cellier+"</h5></a>";
                          madiv += "<ul data-id="+element.id_bouteille_cellier+">";
                          madiv += "<li class='pays format'>"+element.pays_cellier+", "+element.format_bouteille_cellier+" ml</li>";
                          madiv += "<li>$"+element.prix_a_lachat+"</li>";
                          madiv += "<li class='quantite' data-id="+element.id_bouteille_cellier+" >Quantité :"+element.quantite+"</li></ul></div></div></section></div>";
                        })
                        resultatRecherche.innerHTML = madiv;
                        componentHandler.upgradeElement(resultatRecherche);
                      }
                      if(SupprimerResultat){
                        SupprimerResultat.addEventListener("click", function(evt){
                          bouteilleCellier.forEach(function(element){
                            element.style.display="block";
                            resultatRecherche.innerHTML = "";
                          })
                          resultatRecherche.forEach(function(element){
                            element.style.display = "none";
                            element.innerHTML = "";
                          })
                        });
                      }
                    }).catch(error => {
                      console.error(error);
                    });
            }
          });     
    }
    /*
    *Modifier profile par un usager
    */
    var modifierProfileParUnUsager = document.querySelector(".submitModifierProfile");
    if(modifierProfileParUnUsager){
      modifierProfileParUnUsager.addEventListener("click", function(evt){
        evt.preventDefault();
        let modifier = {
          idUsager : document.querySelector("[name='idUsager']"),
          nom : document.querySelector("[name='nom']"),
          prenom : document.querySelector("[name='prenom']"),
          courriel : document.querySelector("[name='courriel']"),
          description : document.getElementById("description"),
        }
        let param = {
          "idUsager" : modifier.idUsager.value,
          "nom":modifier.nom.value,
          "prenom":modifier.prenom.value,
          "courriel":modifier.courriel.value,
          "description":modifier.description.value,
        }
        console.log(param);
        let requete = new Request(BaseURL+"index.php?requete=modifierProfilUsager", {method: 'POST', body: JSON.stringify(param)});
        fetch(requete)
          .then(response => {
              if (response.status === 200) {
                return response.json()
              } else {
                throw new Error('Erreur');
              }
            })
            .then(response => {
              if(response){
                window.location.href = BaseURL+response.url;
                console.log(response) 
              }
            }).catch(error => {
              console.error(error);
            });

      });
    }
      //Envoye d'une requête lorsque l'usager veut se connecter
      var connexionParUnUsager = document.querySelector(".connexion");
      if(connexionParUnUsager){
        connexionParUnUsager.addEventListener("click", function(evt){
          evt.preventDefault();
          let connexion = {
            utilisateur : document.querySelector("[name='utilisateur']"),
            motDePasse : document.querySelector("[name='motDePasse']"),
          }
          let param = {
            "utilisateur":connexion.utilisateur.value,
            "motDePasse":connexion.motDePasse.value,
          }
          console.log(param);
          let requete = new Request(BaseURL+"index.php?requete=login", {method: 'POST', body: JSON.stringify(param)});
          fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.text()
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                if(response){
                  window.location.href = BaseURL+'index.php?requete=cellierParUsager';
                  console.log(response) 
                }
              }).catch(error => {
                console.error(error);
              });
        });
      }
    //Envoye d'une requête lorsque un nouveau usager veut s'inscrire à notre application
    var inscriptionParUnUsager = document.querySelector(".inscription");
    if(inscriptionParUnUsager){
        inscriptionParUnUsager.addEventListener("click", function(evt){
          evt.preventDefault();
          let inscription = {
            utilisateur_ins : document.querySelector("[name='utilisateur']"),
            motDePasse_ins : document.querySelector("[name='motDePasse']"),
            nom_ins : document.querySelector("[name='nom']"),
            prenom_ins : document.querySelector("[name='prenom']"),
            courriel_ins : document.querySelector("[name='courriel']"),
            description_ins : document.querySelector(".description"),
          }
          function checkForm(form)
          {
            var messageErreur = document.querySelector(".erreur")
            if(inscription.utilisateur_ins.value != "" && inscription.motDePasse_ins.value != "" && inscription.nom_ins.value != "" 
              && inscription.prenom_ins.value != "" && inscription.courriel_ins !="" && inscription.description_ins != ""){
                  if(inscription.motDePasse_ins.value.length < 6) {
                      messageErreur.innerHTML ="Le mot de passe doit contenir au moins 6 caractères";
                      inscription.motDePasse_ins.focus();
                      return false;
                  }else{
                    messageErreur.innerHTML= "";
                  }
                  if (/\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+/.test(inscription.courriel_ins.value))
                  {
                      messageErreur.innerHTML= "";
                  }else{
                      messageErreur.innerHTML +="Votre courriel est invalide";
                      return false;
                  }
                  if (/^[a-zA-Z0-9]{5,12}$/.test(inscription.utilisateur_ins.value))
                  {
                      messageErreur.innerHTML= "";
                  }else{
                      messageErreur.innerHTML +="veuilez rentrer un nom utilisateur entre 5 et 12 caractères";
                      return false;
                  }
                  return true;
            }else{
              messageErreur.innerHTML +="Veuillez rentrer tous les champs nécéssaires";
            }
          }
          var regexMDP = checkForm(inscription);
          if(regexMDP){
            let param = {
              "utilisateur":inscription.utilisateur_ins.value,
              "motDePasse":inscription.motDePasse_ins.value,
              "nom":inscription.nom_ins.value,
              "prenom":inscription.prenom_ins.value,
              "courriel":inscription.courriel_ins.value,
              "description":inscription.description_ins.value,
            }
            console.log(param);
            let requete = new Request(BaseURL+"index.php?requete=inscription", {method: 'POST', body: JSON.stringify(param)});
            fetch(requete)
            .then(response => {
                if (response.status === 200) {
                  return response.json();
                  //window.location.href = BaseURL+'index.php?requete=accueil'; 
                } else {
                  throw new Error('Erreur');
                }
              })
              .then(response => {
                console.log(response);
                if(response){
                  window.location.href = BaseURL+response.url; 
                } 
              }).catch(error => {
                console.error(error);
              });

          }
        });
    }
    /**
     * Supprimer bouteille
     */
	 document.querySelectorAll(".supprimerBouteille").forEach(function(element){
          element.addEventListener("click", function(evt){
              let bouteille={
                idBouteille : evt.target.getAttribute('data-id-bouteille'),
                idCellier : evt.target.getAttribute('data-id-cellier')
              }
              let requete = new Request(BaseURL+"index.php?requete=SupprimerBouteilleAuCellier", {method: 'POST', body: JSON.stringify(bouteille)});
              fetch(requete)
              .then(response => {
                  if (response.status === 200) {
                    return response.json();
                  } else {
                    throw new Error('Erreur');
                  }
                })
                .then(response => {
                 if(response){
                     window.location.href = BaseURL+response.url; 
                  } 
                }).catch(error => {
                  console.error(error);
                });
          })
        })
     /**
      * Modifier la bouteille dans le cellier d'un utilisateur
      */   
    var submitLaBouteilleModifier = document.querySelector(".submitModifierBouteille");    
    if(submitLaBouteilleModifier){
        submitLaBouteilleModifier.addEventListener("click", function(evt){
          evt.preventDefault();
            let bouteille = {
              idBouteille : document.querySelector("[name='idBouteille']"),
              idBouteilleCellier : document.querySelector("[name='idBouteilleCellier']"),
              idCellier : document.querySelector("[name='idCellier']"),
              nom : document.querySelector("[name='nom']"),
              format : document.querySelector("[name='format']"),
              pays : document.querySelector("[name='pays']"),
              prix : document.querySelector("[name='prix']"),
              date_achat : document.querySelector("[name='date_achat']"),
              expiration : document.querySelector("[name='expiration']"),
              quantite : document.querySelector("[name='quantite']"),
              millesime : document.querySelector("[name='millesime']")
            };
            var param = {
              "id_bouteille":parseInt(bouteille.idBouteille.value),
              "id_bouteille_cellier":parseInt(bouteille.idBouteilleCellier.value),
              "id_cellier":parseInt(bouteille.idCellier.value),
              "nom":bouteille.nom.value,
              "format":bouteille.format.value,
              "pays":bouteille.pays.value,
              "prix":bouteille.prix.value,
              "date_achat":bouteille.date_achat.value,
              "expiration":bouteille.expiration.value,
              "quantite":parseInt(bouteille.quantite.value),
              "millesime":bouteille.millesime.value,
            };

          let requete = new Request(BaseURL+"index.php?requete=modifierBouteilleCellier", {method: 'POST', body: JSON.stringify(param)});
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
                   window.location.href = BaseURL+response.url;  
              }).catch(error => {
                console.error(error);
              });
        });
    }
    /***
     *Boire la bouteille
     */
    document.querySelectorAll(".btnBoire").forEach(function(element){
          element.addEventListener("click", function(evt){
              let id = evt.target.parentElement.dataset.id;
              console.log(id);
              let requete = new Request(BaseURL+"index.php?requete=boireBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});
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
          })
        })
    /**
     * Ajouter quantité d'une bouteille */       
    document.querySelectorAll(".btnAjouter").forEach(function(element){
        element.addEventListener("click", function(evt){
            let id = evt.target.parentElement.dataset.id;
            console.log(id);
            let requete = new Request(BaseURL+"index.php?requete=ajouterBouteilleCellier", {method: 'POST', body: '{"id": '+id+'}'});
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
        })
    });
    let inputRecherchee = document.querySelector("[name='nom_bouteille']");
    let liste = document.querySelector('.listeAutoComplete');
    console.log(inputRecherchee);
    if(inputRecherchee){
        document.querySelector(".nom_bouteille").style.display = "none";
        document.querySelector(".nomBouteille").style.display = "none";
        inputRecherchee.addEventListener("blur",function(){
          document.querySelector(".nom_bouteille").style.display = "block";
          document.querySelector(".nomBouteille").style.display = "block";
          document.querySelector(".nom_bouteille").innerHTML=document.querySelector(".input").value;     
        });   
    }
    let inputNomBouteille = document.querySelector("[name='nom_bouteille']");
    if(inputNomBouteille){
      inputNomBouteille.addEventListener("keyup", function(evt){  
        document.querySelector(".commNonListees").innerHTML="";
        console.log(inputNomBouteille);
        let nom = inputNomBouteille.value;
        liste.innerHTML = "";
        if(nom){
          let requete = new Request(BaseURL+"index.php?requete=autocompleteBouteille", {method: 'POST', body: '{"nom": "'+nom+'"}'});
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
                  if(response==""){
                      document.querySelector(".commNonListees").innerHTML="attention la bouteille est non listee";
                  }
                  else{
                      response.forEach(function(element){
                          document.querySelector(".commNonListees").innerHTML="";
                      
                        liste.innerHTML += "<li data-id='"+element.id_bouteille +"' classe='mesLi' image='"+element.image_bouteille+"' typeV='"+element.id_type_bouteille+"'>"+element.nom_bouteille+"</li>";
                      })
                  }
                }).catch(error => {
                  console.error(error);
                });
        }
      });
    }
      let bouteille = {
        id_cellier:document.querySelector("[name='valeurIdCellier']"),
        nom : document.querySelector(".nom_bouteille"),
        pays : document.querySelector("[name='pays']"),
        millesime : document.querySelector("[name='millesime']"),
        quantite : document.querySelector("[name='quantite']"),
        date_achat : document.querySelector("[name='date_achat']"),
        prix : document.querySelector("[name='prix']"),
        garde_jusqua : document.querySelector("[name='garde_jusqua']"),
        notes : document.querySelector("[name='notes']"),
      };
    if(liste){
      liste.addEventListener("click", function(evt){
          console.dir(evt.target)
          document.querySelector(".nom_bouteille").style.display = "block";
          document.querySelector(".nomBouteille").style.display = "block";
          if(evt.target.tagName == "LI"){
            bouteille.image=evt.target.getAttribute('image');
            bouteille.nom.dataset.id = evt.target.dataset.id;
            bouteille.nom.innerHTML =evt.target.innerHTML;
            liste.innerHTML = "";
            inputNomBouteille.value = "";
            console.log(bouteille.image);
          }
      });
    }
      let btnAjouter = document.querySelector("[name='ajouterBouteilleCellier']");
      if(btnAjouter){
        btnAjouter.addEventListener("click", function(evt){
            evt.preventDefault;
          /*if(!bouteille.image){
            bouteille.image="";
          }  */
          var param = {
            "id_bouteille":bouteille.nom.dataset.id,
            "id_cellier":bouteille.id_cellier.value,
            "nom_bouteille_cellier":bouteille.nom.innerHTML,
            "image_bouteille" :bouteille.image,
            "pays_bouteille":bouteille.pays.value, 
            "date_achat":bouteille.date_achat.value,
            "garde_jusqua":bouteille.garde_jusqua.value,
            "notes":bouteille.date_achat.value,
            "prix":parseFloat(bouteille.prix.value),
            "quantite":bouteille.quantite.value,
            "millesime":bouteille.millesime.value,
            "id_type":1,
          };
          console.log(param);
          let requete = new Request(BaseURL+"index.php?requete=ajouterNouvelleBouteilleCellier", {method: 'POST', body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    } else {
                      throw new Error('Erreur');
                    }
                  })
                  .then(response => {
                    window.location.href = BaseURL+response.url; 
                  }).catch(error => {
                    console.error(error);
                  });
        });
      } 
    function modifierQuantiteBouteilles(objet){
        console.log(objet);
        let quantite=document.querySelectorAll(".quantite").forEach(function(element){
            objet.forEach(function(monElement){
                if(element.dataset.id==monElement.id_bouteille_cellier){
                  element.innerHTML="Quantité : "+monElement.quantite;     
                }    
            })   
        }); 
    }
    let AjouterCellier =document.querySelector("[name='ajoutercellier']");
    if(AjouterCellier){
      AjouterCellier.addEventListener("click",function(){
          console.log(AjouterCellier);
          let nom=document.querySelector("[name='cellier']").value;
          let requete = new Request(BaseURL+"index.php?requete=ConfirmerAjoutCellier", {method: 'POST', body: '{"nom": "'+nom+'"}'});
              fetch(requete)
                  .then(response => {
                      if (response.status === 200) {
                        return response.json();
                      } else {
                        throw new Error('Erreur');
                      }
                    })
                    .then(response => { 
                    window.location.href = BaseURL+response.url; 
                    }).catch(error => {
                      console.error(error);
                    });
      })
    }  
    let BtnSuprimerCellier =document.querySelectorAll("[name='suprimerCelier']");
    BtnSuprimerCellier.forEach(function(element){
      element.addEventListener("click",function(evt){
          let id=evt.target.dataset.id;
          console.log(id);
          let requete = new Request(BaseURL+"index.php?requete=suprimerCellier", {method: 'POST', body: '{"id": "'+id+'"}'});
              fetch(requete)
                .then(response => {
                      if (response.status === 200) {
                        return response.json();
                      } else {
                        throw new Error('Erreur');
                      }
                    })
                .then(response => { 
                  }).catch(error => {
                      console.error(error);
                  });
      })
    })
   let BtnComm = document.querySelectorAll("[name='commentaire']"); 
   BtnComm.forEach(function(element){
    element.addEventListener("click",function(evt){
        if(evt.target.nextElementSibling.style.display == "block"){
            evt.target.nextElementSibling.style.display = "none";
        }else{
          evt.target.nextElementSibling.style.display = "block";
        }
    })
  })
  let ContenuComm=document.querySelectorAll(".textecommentaire");
  let tennvoyerom =document.querySelectorAll(".envoyerComm"); 
    tennvoyerom.forEach(function(element){
     console.log(element);
     element.addEventListener("click",function(){
        let id_cellier=document.querySelector("[name='valeurIdCellier']").dataset.id;  
        let id_bouteille_cellier = element.dataset.id;
        let commentaire = element.previousElementSibling.value;
        var param = {
            "id_cellier" :id_cellier,
            "id_bouteille_cellier":id_bouteille_cellier,
            "commentaire":commentaire,  
          };
        console.log(param);
        let requete = new Request(BaseURL+"index.php?requete=AjouterUnCommentaire", {method: 'POST',  body: JSON.stringify(param)});
            fetch(requete)
                .then(response => {
                    if (response.status === 200) {
                      return response.json();
                    } else {
                      throw new Error('Erreur');
                    }
                  })
                  .then(response => { 
                      window.location.href = BaseURL+response.url; 
                  }).catch(error => {
                    console.error(error);
                  });    
      })
    })  
});

