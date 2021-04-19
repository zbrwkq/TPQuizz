<?php
class Modele{
    protected function getBdd(){
        return new PDO('mysql:host=localhost;dbname=tp_quizz', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}

require_once "../modeles/Quizz.php";
require_once "../modeles/Categorie.php";
require_once "../modeles/Question.php";
require_once "../modeles/Reponse.php";
require_once "../modeles/Utilisateurs.php";
require_once "../modeles/QuestionSecrete.php";
?>