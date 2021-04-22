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


//Fonction qui permet d'afficher les inputs de modification
function showInput(idInput, idParagraphe, idAction, idOK){
    input = document.getElementById(idInput);
    text = document.getElementById(idParagraphe);
    action = document.getElementById(idAction);
    ok = document.getElementById(idOK);
    if(input.getAttribute("type") == "hidden"){
        input.setAttribute("type","text");
        text.style.display = "none";
        action.style.display = "none";
        ok.style.display = "block";
    }
}
//Fonction qui permet d'afficher le select de modification
function showSelect(idSelect, idParagraphe){
    select = document.getElementById(idSelect);
    text = document.getElementById(idParagraphe);
    console.log(text.textContent);
    if(select.style.display == "none"){
        select.style.display = "inline-block";
        text.style.display = "none";
    }else{
        select.style.display = "none";
        text.style.display = "inline-block";
    }
}