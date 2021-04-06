<?php
function inscription(){
    extract($_POST);
    $mdp = password_hash($mdp, PASSWORD_BCRYPT);
    $requete = getBdd()->prepare("INSERT INTO utilisateurs(identifiant, mdp, autorisation, photoProfil) VALUES(?, ?, ?, ?)");
    $requete->execute([$identifiant, $mdp, 1, "../pages/images/profils/default.jpg"]);
}

?>