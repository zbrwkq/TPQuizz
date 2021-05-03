<?php
require_once "../modeles/modele.php";
$nouveauAmi = new Utilisateur;
$infoAmi = $nouveauAmi->connexion($_POST["identifiant"]);
$demandeAmi = new Ami;
$demandeAmi->initialiserAmi($_SESSION["idUtilisateur"], $infoAmi["idUtilisateur"]);
$demandeAmi->ajoutAmi();

header("location:../pages/index.php#ajoutAmi")
?>