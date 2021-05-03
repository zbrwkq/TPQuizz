<?php
require_once "../modeles/modele.php";
$Utilisateur = new Utilisateur($_GET["id"]);

if(!empty($_POST["password"])){
    $newMdp = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $Utilisateur->updatePassword($newMdp, $_GET["id"]);
    header("location:../pages/connexion.php?password=change");
}