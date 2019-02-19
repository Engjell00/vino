//Regle la valeur maximum pour la date d'achat du formulaire ajouter bouteille à la date courante



window.addEventListener("load", function () {

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date_achat").setAttribute("max", today);
    var uploadBTN = document.querySelector(".uploadBtn");
    var uploadFILE = document.querySelector(".uploadFile");
    uploadBTN.onchange = function () {
        uploadFILE.value = this.files[0].name;
    };


    });
    

    