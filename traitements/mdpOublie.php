<?php
require_once "../modeles/modele.php";

$Utilisateur = new Utilisateur();
print_r($Utilisateur->identifiants());
$rowCount = $Utilisateur->identifiants();
if($_POST["identifiant"]){
    header("location:../pages/mdpOublie.php?valide=oui");
}else{
    echo "L'identifiant saisi n'existe pas";
}
?>