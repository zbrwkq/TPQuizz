<?php
class Utilisateur extends Modele{
    private $idUtilisateur; //int
    private $identifiant; //string
    private $role; //objet a creer
    private $mdp; //str
    private $questionSecrete ; //objet a creer

    public function __construct(){

    }
    public function getId(){
        return $this->idUtilisateur;
    }
    public function getIdentifiant(){
        return $this->identifiant;
    }
    public function getRole(){
        return $this->role;
    }
    public function getMdp(){
        return $this->mdp;
    }
    public function getQuestionSecrete(){
        return $this->questionSecrete;
    }
    public function setId($idUtilisateur){
        $this->idUtilisateur = $idUtilisateur;
    }
    public function setMdp($mdp){
        $this->mdp = $mdp;
    }
    public function setQuestionSecrete($questionSecrete){
        $this->questionSecrete = $questionSecrete;
    }
    public function connexion($identifiant,$mdp){
        
    }
    public function inscription($identifiant,$mdp,$idQuestionSecrete,$idReponseSecrete){

    }
}
?>