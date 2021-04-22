<?php
class Administration extends Modele{

    private $idUtilisateur;
    private $idQuizz;
    private $identifiant;
    private $grade;

    public function membresInscrits(){
        $requete = $this->getBdd()->prepare("SELECT COUNT(idUtilisateur) AS nombreMembre FROM utilisateurs");
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function nombreQuizz(){
        $requete = $this->getBdd()->prepare("SELECT COUNT(idQuizz) AS nombreQuizz FROM quizz WHERE valide = ?");
        $requete->execute([1]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function nombreQuizzAttente(){
        $requete = $this->getBdd()->prepare("SELECT COUNT(idQuizz) AS nombreQuizzAttente FROM quizz WHERE valide = ?");
        $requete->execute([0]);
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function nombreCategories(){
        $requete = $this->getBdd()->prepare("SELECT COUNT(idCategorie) AS nombreCategories FROM categories");
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function recuperationMembres(){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    //Fonctions pour le filtre de recherche
    public function recherche($s1){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant LIKE ?");
        $requete->execute(["%" . $s1 . "%"]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recuperationContacts(){
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function autorisationString($autorisation){
        switch($autorisation){
            case 0:
                echo "Banni";
                break;
            case 1:
                echo "Membre";
                break;
            case 2:
                echo "Administrateur";
                break;
        }
    }

    public function recuperationQuizzEnAttente(){
        $requete = $this->getBdd()->prepare("SELECT idQuizz, titre FROM quizz WHERE valide = ?");
        $requete->execute([0]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function recuperationQuestionsQuizzEnAttente($idQuizz){
        $requete = $this->getBdd()->prepare("SELECT idQuestion, question FROM questions LEFT JOIN quizz USING(idQuizz) WHERE idQuizz = ?");
        $requete->execute([$idQuizz]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recuperationReponsesQuestionsQuizzEnAttente($idQuestion){
        $requete = $this->getBdd()->prepare("SELECT idReponse, reponse FROM reponses LEFT JOIN questions USING(idQuestion) WHERE idQuestion = ?");
        $requete->execute([$idQuestion]);
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }


    public function updateProfil($identifiant, $grade, $idUtilisateur){
        $requete = $this->getBdd()->prepare("UPDATE utilisateurs SET identifiant = ?, autorisation = ? WHERE idUtilisateur = ?");
        $requete->execute([$identifiant, $grade, $idUtilisateur]);
    }

    public function reponsesUtilisateursQuizz(){
        $requete = $this->getBdd()->prepare("SELECT repondre.idUtilisateur, repondre.idQuestion, repondre.idReponse, utilisateurs.identifiant, reponses.reponse, BonneReponse.reponse AS BonneReponse FROM repondre LEFT JOIN utilisateurs ON repondre.idUtilisateur = utilisateurs.idUtilisateur LEFT JOIN questions ON repondre.idQuestion = questions.idQuestion LEFT JOIN reponses ON repondre.idReponse = reponses.idReponse LEFT JOIN reponses as BonneReponse ON questions.idQuestion = BonneReponse.idQuestion AND BonneReponse.vraie = 1");
        $requete->execute();
        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}