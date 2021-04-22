<?php
class Reponse extends Modele
{
    private $idReponse;
    private $reponse;
    private $vraie;

    public function __construct($idReponse = null)
    {
        if($idReponse !=null){
            $requete = $this->getBdd()->prepare("SELECT * from reponses WHERE idReponse = ?");
            $requete->execute([$idReponse]);
            $reponse = $requete->fetch(PDO::FETCH_ASSOC);
            $this->id = $idReponse;
            $this->reponse = $reponse["reponse"];
            $this->vraie = $reponse["vraie"];
        }

    }
    public function initialiserReponse($idReponse, $reponse, $vraie){
        $this->idReponse = $idReponse;
        $this->reponse = $reponse;
        $this->vraie = $vraie;
    }

    public function getIdReponse(){
        return $this->idReponse;
    }
    public function getReponse(){
        return $this->reponse;
    }
    public function getVraie(){
        return $this->vraie;
    }

    public function setIdReponse(){}

    public function setReponse($reponse){
        $this->reponse = $reponse;
    }

    public function setVraie($vraie){
        $this->vraie = $vraie;
    }
}
?>