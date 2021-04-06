<?php
session_start();
function getBdd(){
    return new PDO('mysql:host=localhost;dbname=tp_quizz', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}

require_once "utilisateurs.php";
require_once "../modeles/categories.php";
