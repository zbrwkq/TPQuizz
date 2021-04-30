<?php
class Ami extends Modele{
    private $demandeur;
    private $receveur;
    private $status;
    public function __construct($demandeur, $receveur, $status)
    {
        $this->demandeur = $demandeur;
        $this->receveur = $receveur;
        $this->status = $status;
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