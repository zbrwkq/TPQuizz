<?php
class Ami extends Modele{
    private $idDemandeur;
    private $idReceveur;
    private $status;
    public function __construct($idDemandeur = null, $idReceveur = null, $status = null)
    {
        if($idDemandeur !== null && $idReceveur !== null && $status !== null){
            $this->idDemandeur = $idDemandeur;
            $this->idReceveur = $idReceveur;
            $this->status = $status;
        }
    }
    public function initialiserAmi($idDemandeur, $idReceveur){
        $this->idDemandeur = $idDemandeur ;
        $this->idReceveur = $idReceveur ;
    }
    public function ajoutAmi(){
        $requete = $this->getBdd()->prepare("SELECT * FROM amis WHERE idDemandeur = ? AND idReceveur = ?");
        $requete->execute([$this->idDemandeur, $this->idReceveur]);
        $verif = $requete->fetch(PDO::FETCH_ASSOC);
        if(isset($verif["idDemandeur"])){
            return false;
        }else{
            $requete = $this->getBdd()->prepare("INSERT INTO amis(idDemandeur,idReceveur) VALUES(?, ?)");
            $requete->execute([$this->idDemandeur, $this->idReceveur]);
            return true;
        }
    }
    public function accepterAmi(){
        $requete = $this->getBdd()->prepare("UPDATE amis SET status = 1 WHERE idDemandeur = ? AND idReceveur = ?");
        $requete->execute([$this->idDemandeur, $this->idReceveur]);
    }
    public function refuserAmi(){
        $requete = $this->getBdd()->prepare("DELETE FROM amis WHERE idDemandeur = ? AND idReceveur = ?");
        $requete->execute([$this->idDemandeur, $this->idReceveur]);
    }

    public function getIdDemandeur(){
        return $this->idDemandeur;
    }
    public function getIdReceveur(){
        return $this->idReceveur;
    }
    public function getStatus(){
        return $this->status;
    }
}
?>