<?php

class Utilisateur extends Modele{


    private $idUtilisateur;
    private $identifiant;
    private $autorisation;
    private $mdp;
    private $questionSecrete;
    private $reponseSecrete;

    private $photoProfil;

    public function __construct($idUtilisateur = null){
        if($idUtilisateur !== null){
            $this->idUtilisateur = $_SESSION["idUtilisateur"];
        }
    }

    public function inscription($identifiant, $mdp, $autorisation, $photoProfil, $questionSecrete, $reponseSecrete){
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $requete = $this->getBdd()->prepare("INSERT INTO utilisateurs(identifiant, mdp, autorisation, photoProfil) VALUES(?, ?, ?, ?)");
        $requete->execute([$identifiant, $mdp, $autorisation, $photoProfil]);

        $requete = $this->getBdd()->prepare("INSERT INTO secret(idQuestionSecrete, reponse) VALUES(?, ?)");
        $requete->execute([$questionSecrete, $reponseSecrete]);
    }

    public function connexion($identifiant, $mdp){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ? AND mdp = ?");
        $requete->execute([$identifiant, $mdp]);
        return $requete->fetch(PDO::FETCH_ASSOC);
        return $requete->rowCount();
    }

    public function selectionUtilisateurs($identifiant){
        $requete = $this->getBdd()->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        return $requete->rowCount();
    }

    public function connexionUtilisateur($identifiant, $mdp){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ? AND mdp = ?");
        $requete->execute([$identifiant, $mdp]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    // public function questionSecrete(){
        // extract($_POST);
        // $requete = $this->getBdd()->prepare("INSERT INTO secret(idQuestionSecrete, reponse) VALUES(?, ?)");
        // if($_POST["questionSecrete"] == "question1"){
        //     $idQuestionSecrete = 1;
        // }else if($_POST["questionSecrete"] == "question2"){
        //     $idQuestionSecrete = 2;
        // }else{
        //     $idQuestionSecrete = 3;
        // }
        // $requete->execute([$idQuestionSecrete, $reponseQuestionSecrete]);
    // }

    // public function utilisateurs(){
    //     $requete = $this->getBdd()->prepare("SELECT identifiant FROM utilisateurs");
    //     $requete->execute();
    //     return $requete->fetchAll(PDO::FETCH_ASSOC);
    //     return $requete->rowCount();
    // }

    public function getIdUtilisateur(){
        
    }
    public function getIdentifiant(){

    }
    public function getIdRole(){

    }
    public function getEmail(){

    }
    public function getMotDePasse(){

    }
    public function getQuestionSecrete(){

    }
    public function getReponseSecrete(){

    }

    public function setIdUtilisateur(){}
    public function setIdentifiant(){}
    public function setIdRole(){}
    public function setEmail(){}
    public function setMotDePasse(){}
    public function setQuestionSecrete(){}
    public function setReponseSecrete(){}
}

?>