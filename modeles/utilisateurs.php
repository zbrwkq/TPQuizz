<?php

class Utilisateur extends Modele{

    private $idUtilisateur;
    private $identifiant;
    private $autorisation;
    private $questionSecrete;
    private $reponseSecrete;

    private $photoProfil;

    public function __construct($idUtilisateur = null){
        if($idUtilisateur !== null){
            $requete = $this->getBdd()->prepare("SELECT * FROM utilisateur LEFT JOIN secret USING(idUtilisateur) WHERE idUtilisateur = ?");
            $requete->execute([$idUtilisateur]);
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idUtilisateur = $utilisateur["idUtilisateur"];
            $this->identifiant = $utilisateur["identifiant"];
            $this->autorisation = $utilisateur["autorisation"];
            $this->photoProfil = $utilisateur["photoProfil"];
            $this->questionSecrete = $utilisateur["questionSecrete"];
            $this->reponseSecrete = $utilisateur["reponseSecrete"];
        }
    }
    
    public function initialiserUtilisateur($idUtilisateur, $identifiant, $autorisation, $photoProfil){
        $this->idUtilisateur = $idUtilisateur;
        $this->identifiant = $identifiant;
        $this->autorisation = $autorisation;
        $this->photoProfil = $photoProfil;
    }


    public function inscription($identifiant, $mdp, $autorisation, $photoProfil, $questionSecrete, $reponseSecrete){
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);
        $requete = $this->getBdd()->prepare("INSERT INTO utilisateurs(identifiant, mdp, autorisation, photoProfil) VALUES(?, ?, ?, ?)");
        $requete->execute([$identifiant, $mdp, $autorisation, $photoProfil]);

        $requete = $this->getBdd()->prepare("INSERT INTO secret(idQuestionSecrete, reponse) VALUES(?, ?)");
        $requete->execute([$questionSecrete, $reponseSecrete]);
    }

    public function connexion($identifiant){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    public function selectionUtilisateurs($identifiant){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        $requete->fetchAll(PDO::FETCH_ASSOC);
        return count($requete);
    }

    public function connexionUtilisateur($identifiant, $mdp){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ? AND mdp = ?");
        $requete->execute([$identifiant, $mdp]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    //Fonction qui banni un utilisateur
    public function banUtilisateur($idUtilisateur){
        $requete = $this->getBdd()->prepare("UPDATE utilisateurs SET autorisation = 0 WHERE idUtilisateur = ?");
        $requete->execute([$idUtilisateur]);
    }

    //Fonction qui débanni un utilisateur
    public function debanUtilisateur($idUtilisateur){
        $requete = $this->getBdd()->prepare("UPDATE utilisateurs SET autorisation = 1 WHERE idUtilisateur = ?");
        $requete->execute([$idUtilisateur]);
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


    public function getIdUtilisateur(){
        return $this->idUtilisateur;
    }
    public function getIdentifiant(){
        return $this->identifiant;

    }
    public function getAutorisation(){
        return $this->autorisation;

    }
    public function getMotDePasse(){

    }
    public function getQuestionSecrete(){
        return $this->questionSecrete;
    }
    public function getReponseSecrete(){
        return $this->reponseSecrete;
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