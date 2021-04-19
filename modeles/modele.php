<?php
class Modele
    {
        protected function getBdd(){
            return new PDO('mysql:host=localhost;dbname=tp_quizz', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
    }
