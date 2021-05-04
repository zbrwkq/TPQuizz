<?php

class Utilisateur extends Modele{

    private $idUtilisateur;
    private $identifiant;
    private $autorisation;
    private $questionSecrete;
    private $reponseSecrete;
    private $photoProfil;
    private $Score;

    public function __construct($idUtilisateur = null){
        if($idUtilisateur !== null){
            $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs LEFT JOIN secret USING(idUtilisateur) WHERE idUtilisateur = ?");
            $requete->execute([$idUtilisateur]);
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idUtilisateur = $utilisateur["idUtilisateur"];
            $this->identifiant = $utilisateur["identifiant"];
            $this->autorisation = $utilisateur["autorisation"];
            $this->photoProfil = $utilisateur["photoProfil"];
            $this->questionSecrete = $utilisateur["idQuestionSecrete"];
            $this->reponseSecrete = $utilisateur["reponse"];
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

        $requete = $this->getBdd()->prepare("SELECT * FROM `utilisateurs` WHERE identifiant = ? ORDER BY idUtilisateur DESC LIMIT 1");
        $requete->execute([$identifiant]);
        $idUtilisateur = $requete->fetch(PDO::FETCH_ASSOC)["idUtilisateur"];

        $requete = $this->getBdd()->prepare("INSERT INTO secret(idUtilisateur, idQuestionSecrete, reponse) VALUES(?, ?, ?)");
        $requete->execute([$idUtilisateur, $questionSecrete, $reponseSecrete]);
    }

    public function connexion($identifiant){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    public function selectionUtilisateurs($identifiant){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        $requete = $requete->fetchAll(PDO::FETCH_ASSOC);
        return count($requete);
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
    public function scoreTotal(){
        $requete = $this->getBdd()->prepare("SELECT SUM(score) as total FROM `participe` WHERE idUtilisateur = ?");
        $requete->execute([$this->idUtilisateur]);
        return $requete->fetch(PDO::FETCH_ASSOC)["total"];
    }

    public function mdpOublie($identifiant){
        $requete = $this->getBdd()->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        return $requete->rowCount();
    }

    public function updatePassword($mdp, $idUtilisateur){
        $requete = $this->getBdd()->prepare("UPDATE utilisateurs SET mdp = ? WHERE idUtilisateur = ?");
        $requete->execute([$mdp, $idUtilisateur]);
    }

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
    public function getphotoProfil(){
        return $this->photoProfil;
    }

    public function setIdUtilisateur(){
        
    }
    public function setIdentifiant($identifiant){
        $this->identifiant = $identifiant;
    }
    public function setIdRole(){}
    public function setEmail(){}
    public function setMotDePasse(){}
    public function setQuestionSecrete(){}
    public function setReponseSecrete(){}
}

?>