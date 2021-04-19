<?php
require_once "../modeles/modele.php";
$listeQuizz = new App;
$listeQuizz->initialiserListeQuizz($_GET["id"]);
// echo "<pre>";
// print_r($listeQuizz);
// echo "</pre>";
?>