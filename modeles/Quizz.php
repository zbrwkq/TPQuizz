<?php
class Quizz extends Modele
    {
        private $idQuizz;
        private $titre;
        private $categorie;
        private $questions = [];

        public function __construct($idQuizz = null){
            if($idQuizz !== null){

                $requete = $this->getBdd()->prepare("SELECT titre, idCategorie FROM quizz WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $quizz = $requete->fetch(PDO::FETCH_ASSOC);

                $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuizz = ?");
                $requete->execute([$idQuizz]);
                $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

                $this->idQuizz = $idQuizz;
                $this->titre  = $quizz["titre"];
                $this->categorie = new Categorie($quizz["idCategorie"]);

                foreach( $questions as $question ){

                    $objetQuestion = new Question;
                    $objetQuestion->initialiserQuestion($question["idQuestion"],$question["question"]);
                    $this->questions[] = $objetQuestion;
                }
            }
        }
        public function getId(){
            return $this->idQuizz;
        }
        public function getTitre(){
            return $this->titre;
        }
        public function getCategorie(){
            return $this->categorie;
        }
        public function getQuestions(){
            return $this->questions;
        }

        public function setId(){}

        public function setTitre(){}

        public function setCategorie(){}

        public function addQuestion(){}

        public function removeQuestion(){}

        public function refuserQuizz($idQuizz){
            $requete = $this->getBdd()->prepare("DELETE FROM quizz WHERE idQuizz = ?");
            $requete->execute([$idQuizz]);
        }
        public function accepterQuizz($idQuizz){
            $requete = $this->getBdd()->prepare("UPDATE quizz SET valide = 1 WHERE idQuizz = ?");
            $requete->execute([$idQuizz]);
        }
    }