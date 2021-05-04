<?php
require_once "../modeles/modele.php";

$Administration = new Administration();
$Utilisateur = new Utilisateur();
extract($_POST);
if(!empty($identifiant) && !empty($grade)){
    $Administration->updateProfil($identifiant, $grade, $_SESSION["idUtilisateur"]);
}
header("location:../pages/administration.php?pages=membres")
?>