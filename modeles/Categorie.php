<?php
class Categorie extends Modele
{
    private $idCategorie;
    private $titre;
    private $photo;

    public function __construct($idCategorie = null)
    {
        if($idCategorie !=null){
            $requete = $this->getBdd()->prepare("SELECT * FROM categories WHERE idCategorie = ?");
            $requete->execute([$idCategorie]);
            $categorie = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idCategorie = $idCategorie;
            $this->titre = $categorie["titre"];
            $this->photo = $categorie["photo"];
        }
    }

    public function InitialiserCategorie($idCategorie, $titre, $photo, $nbrQuizz = null){
        $this->idCategorie = $idCategorie;
        $this->titre = $titre;
        $this->photo = $photo;
        $this->nbrQuizz = $nbrQuizz;
    }
    public function getId(){
        return $this->idCategorie;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getPhoto(){
        return $this->photo;
    }
    public function getNbrQuizz(){
        return $this->nbrQuizz;
    }
}
?>