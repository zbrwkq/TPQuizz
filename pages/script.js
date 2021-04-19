function popupBannissement(idUtilisateur){
    document.getElementById("bannissement").style.display = "flex";
    document.getElementById("oui").value = idUtilisateur;
}

function noBan(){
    document.getElementById("bannissement").style.display = "none";
}


function popupDebannissement(idUtilisateur){
    document.getElementById("debannissement").style.display = "flex";
    document.getElementById("yes").value = idUtilisateur;
}

function noDeban(){
    document.getElementById("debannissement").style.display = "none";
}