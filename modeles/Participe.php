<?php
class Participe extends Modele{

    private $idUtilisateur;
    private $idQuizz;
    private $score;
    
    public function __construct($idUtilisateur = null, $idQuizz = null)
    {
        if($idUtilisateur !== null && $idQuizz !== null){
            $requete = $this->getBdd()->prepare("SELECT * FROM participe WHERE idUtilisateur = ? AND idQuizz = ?");
            $requete->execute([$idUtilisateur,$idQuizz]);
            $participe = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idUtilisateur = $participe["idUtilisateur"];
            $this->idQuizz = $participe["idQuizz"];
            $this->score = $participe["score"];
        }
    }
    public function initialiserParticipe($idUtilisateur,$idQuizz,$score){
        $this->idUtilisateur = $idUtilisateur;
        $this->idQuizz = $idQuizz;
        $this->score = $score;
    }
    public function ajoutParticipe(){
        $requete = $this->getBdd()->prepare("INSERT INTO participe(idUtilisateur, idQuizz ,score) VALUES(?,?,?)");
        $requete->execute([$this->idUtilisateur, $this->idQuizz, $this->score]);
    }

    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function getIdQuizz(){
        return $this->idQuizz;
    }
    public function getScore(){
        return $this->score;
    }

}

?>