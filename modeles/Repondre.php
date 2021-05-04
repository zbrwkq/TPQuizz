<?php
class Repondre extends Modele{

    private $idUtilisateur;
    private $idQuestion;
    private $idReponse;
    
    public function __construct($idUtilisateur = null,$idQuestion = null)
    {
        if($idUtilisateur !== null && $idQuestion !== null){
            $requete = $this->getBdd()->prepare("SELECT * FROM repondre WHERE idUtilisateur = ? AND idQuestion = ?");
            $requete->execute([$idUtilisateur,$idQuestion]);
            $repondre = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idUtilisateur = $repondre["idUtilisateur"];
            $this->idQuestion = $repondre["idQuestion"];
            $this->idReponse = $repondre["idReponse"];
        }
    }
    public function initialiserRepondre($idUtilisateur,$idQuestion,$idReponse){
        $this->idUtilisateur = $idUtilisateur;
        $this->idQuestion = $idQuestion;
        $this->idReponse = $idReponse;
    }
    public function ajoutRepondre(){
        $requete = $this->getBdd()->prepare("INSERT INTO repondre(idUtilisateur, idQuestion ,idReponse) VALUES(?,?,?)");
        $requete->execute([$this->idUtilisateur, $this->idQuestion, $this->idReponse]);
    }

    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function getIdQuestion(){
        return $this->idQuestion;
    }
    public function getIdReponse(){
        return $this->idReponse;
    }

}

?>