<?php
class Ami extends Modele{
    private $demandeur;
    private $receveur;
    private $status;
    public function __construct($demandeur = null, $receveur = null, $status = null)
    {
        if($demandeur != null && $receveur != null && $status != null){
            $this->demandeur = $demandeur;
            $this->receveur = $receveur;
            $this->status = $status;
        }
    }
    public function initialiserAmi($idDemandeur, $idReceveur){
        $this->demandeur = $idDemandeur ;
        $this->demandeur = $idReceveur ;
    }
    public function ajoutAmi(){
        $requete = $this->getBdd()->prepare("INSERT INTO amis(demandeur,receveur) VALUES(?, ?)");
        $requete->execute([$this->demandeur, $this->receveur]);
    }

    public function getDemandeur(){
        return $this->demandeur;
    }
    public function getReceveur(){
        return $this->receveur;
    }
    public function getStatus(){
        return $this->status;
    }
}
?>