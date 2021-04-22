<?php
require_once "../modeles/modele.php";
$Quizz = new Quizz($_POST["yess"]);
$Quizz->accepterQuizz($_POST["yess"]);
// header("location:../pages/administration.php?pages=quizz");
?>