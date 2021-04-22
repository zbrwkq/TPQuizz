<?php
require_once "../modeles/modele.php";
$Quizz = new Quizz($_POST["none"]);
$Quizz->refuserQuizz($_POST["none"]);
header("location:../pages/administration.php?pages=quizz");
?>