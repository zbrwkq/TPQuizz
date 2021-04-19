<?php
class Quizz extends Modele
    {
        private $idQuizz;
        private $titre;
        private $categorie;
        private $idUtilisateur;
        private $questions = [];

        public function __construct($idQuizz = null)
        {

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
                $this->idUtilisateur  = $quizz["idUtilisateur"];

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
        public function setId($idQuizz){
            $this->idQuizz = $idQuizz;
        }
        public function setTitre($titre){
            $this->titre = $titre;
        }
        public function setCategorie($idCategorie){
            $this->categorie = new Categorie($idCategorie);
        }
        public function addQuestion(){

        }
    }