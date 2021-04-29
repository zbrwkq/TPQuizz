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
        public function ajoutQuizz($titre,$idCategorie,$idUtilisateur){
            $requete = $this->getBdd()->prepare("INSERT INTO quizz(titre,idUtilisateur,idCategorie) VALUES(?,?,?)");
            $requete->execute([$titre,$idUtilisateur,$idCategorie]);
            $requete = $this->getBdd()->prepare("SELECT idQuizz FROM quizz ORDER BY idQuizz DESC LIMIT 1");
            $requete->execute();
            $idQuizz = $requete->fetch(PDO::FETCH_ASSOC);
            return $idQuizz["idQuizz"];
        }

        public function getIdQuizz(){
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

        public function setTitre($titre){
            $this->titre = $titre;
        }

        public function setCategorie($categorie){
            $this->categorie = $categorie;
        }

        public function addQuestion($question){
            $this->questions[] = $question;
        }

        public function removeQuestion(){}
    }