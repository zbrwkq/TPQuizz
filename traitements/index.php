<?php
require_once "../modeles/app.php";
$topCategories = new Top;
$topCategories->initialiserTopCategorie();
$topQuizz = new Top;
$topQuizz->initialiserTopQuizz();
// echo "<pre>";
// print_r($topQuizz);
// echo "</pre>";