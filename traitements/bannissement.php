<?php
require_once "../modeles/modele.php";
$Administration = new Utilisateur($_POST["id"]);
$Administration->banUtilisateur($_POST["id"]);
header("location:../pages/administration.php?pages=membres");
?>