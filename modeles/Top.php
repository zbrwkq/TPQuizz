<?php
class Top extends Modele{
    private $topCategorie = [];
    private $topQuizz= [];

    public function initialiserTopCategorie(){
        $requete = $this->getBdd()->prepare ("SELECT idCategorie,categories.titre,photo,COUNT(idQuizz) as nbrQuizz FROM categories LEFT JOIN quizz USING(idCategorie) GROUP BY idCategorie ORDER BY nbrQuizz DESC LIMIT 4");
        $requete->execute();
        $top = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($top as $categorie){
            $objetCategorie = new Categorie();
            $objetCategorie->InitialiserCategorie($categorie["idCategorie"],$categorie["titre"],$categorie["photo"],$categorie["nbrQuizz"]);
            $this->topCategorie[] = $objetCategorie;
        }
    }
    public function initialiserTopQuizz(){
        $requete = $this->getBdd()->prepare ("SELECT idQuizz,titre, COUNT(score) AS nbrScore,identifiant FROM participe LEFT JOIN quizz USING(idQuizz) LEFT JOIN utilisateurs ON quizz.idUtilisateur = utilisateurs.idUtilisateur  WHERE valide = 1 GROUP BY idQuizz ORDER BY nbrScore DESC LIMIT 5");
        $requete->execute();
        $top = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($top as $quizz){
            $Quizz = ["idQuizz" => $quizz["idQuizz"], "titre" => $quizz["titre"], "nbrScore" => $quizz["nbrScore"], "identifiant" => $quizz["identifiant"]];
            $this->topQuizz[] = $Quizz;
        }
    }

    public function getTopCategorie(){
        return $this->topCategorie;
    }
    public function getTopQuizz(){
        return $this->topQuizz;
    }
}

?>