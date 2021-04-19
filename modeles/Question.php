<?php
class Question extends Modele
    {
        private $idQuestion;
        private $question;
        private $reponses = [];

        public function __construct($idQuestion = null)
        {
            if($idQuestion !=null){
                $requete = $this->getBdd()->prepare("SELECT * from questions WHERE idQuestion = ?");
                $requete->execute([$idQuestion]);
                $question = $requete->fetch(PDO::FETCH_ASSOC);
                $this->idQuestion = $idQuestion;
                $this->question = $question["question"];

                $requete = $this->getBdd()->prepare("SELECT * from reponses WHERE idQuestion = ?");
                $requete->execute([$idQuestion]);
                $reponses = $requete->fetchAll(PDO::FETCH_ASSOC);

                foreach($reponses as $reponse){
                    $objetReponse = new Reponse($reponse["idReponse"]);
                    $this->reponses[] = $objetReponse;
                }

            }
        }

        public function initialiserQuestion($idQuestion, $question){
            $this->idQuestion = $idQuestion;
            $this->question = $question;

            $requete = $this->getBdd()->prepare("SELECT * from reponses WHERE idQuestion = ?");
                $requete->execute([$idQuestion]);
                $reponses = $requete->fetchAll(PDO::FETCH_ASSOC);

                foreach($reponses as $reponse){
                    $objetReponse = new Reponse;
                    $objetReponse->initialiserReponse($reponse["idReponse"],$reponse["reponse"],$reponse["vraie"]);
                    $this->reponses[] = $objetReponse;
                }
        }
        public function getId(){
            return $this->idQuestion;
        }
        public function getQuestion(){
            return $this->question;
        }
        public function getReponses(){
            return $this->reponses;
        }
        public function setId($idQuestion){
            $this->idQuestion = $idQuestion;
        }
        public function setQuestion($question){
            $this->question = $question;
        }
        // public function addReponse(){

        // }
        // public removeReponse(){

        // }
    }
    ?>