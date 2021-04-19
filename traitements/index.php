<?php
require_once "../modeles/modele.php";
$topCategories = new App;
$topCategories->initialiserTopCategorie();
$topQuizz = new App;
$topQuizz->initialiserTopQuizz();