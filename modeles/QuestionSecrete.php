<?php
class QuestionSecrete extends Modele{

    private $liste;

    public function __construct(){
        $requete = $this->getBdd()->prepare("SELECT * FROM question_secrete");
        $requete->execute();
        $this->liste = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>