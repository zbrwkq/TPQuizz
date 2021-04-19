<?php
require_once "../modeles/modele.php";
$Administration = new Utilisateur($_POST["idyes"]);
$Administration->debanUtilisateur($_POST["idyes"]);
header("location:../pages/administration.php?pages=membres");
?>