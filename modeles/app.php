<?php
class App extends Modele{
    private $topCategorie = [];
    private $topQuizz= [];
    private $listeCategories = [];
    private $listeQuizz= [];
    private $listeAmis = [];
    private $listeParticipe = [];

    public function initialiserTopCategorie(){
        $requete = $this->getBdd()->prepare ("SELECT idCategorie,categories.titre,photo,COUNT(idQuizz) as nbrQuizz FROM categories LEFT JOIN quizz USING(idCategorie) WHERE valide = 1 GROUP BY idCategorie ORDER BY nbrQuizz DESC LIMIT 4");
        $requete->execute();
        $top = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($top as $categorie){
            $objetCategorie = new Categorie();
            $objetCategorie->InitialiserCategorie($categorie["idCategorie"],$categorie["titre"],$categorie["photo"],$categorie["nbrQuizz"]);
            $this->topCategorie[] = $objetCategorie;
        }
    }
    public function initialiserTopQuizz(){
        $requete = $this->getBdd()->prepare ("SELECT idQuizz,titre, COUNT(score) AS nbrScore,identifiant FROM quizz LEFT JOIN participe USING(idQuizz) LEFT JOIN utilisateurs ON quizz.idUtilisateur = utilisateurs.idUtilisateur  WHERE valide = 1 GROUP BY idQuizz ORDER BY nbrScore DESC LIMIT 5");
        $requete->execute();
        $top = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($top as $quizz){
            $Quizz = ["idQuizz" => $quizz["idQuizz"], "titre" => $quizz["titre"], "nbrScore" => $quizz["nbrScore"], "identifiant" => $quizz["identifiant"]];
            $this->topQuizz[] = $Quizz;
        }
    }
    public function initialiserListeCategories(){
        $requete = $this->getBdd()->prepare("SELECT idQuizz,idCategorie,COUNT(idQuizz) as nbrQuizz FROM quizz WHERE valide = 1  GROUP BY idCategorie ORDER BY nbrQuizz DESC");
        $requete->execute();
        $nbrs = $requete->fetchAll(PDO::FETCH_ASSOC);

        $requete = $this->getBdd()->prepare("SELECT idCategorie,categories.titre,photo,COUNT(idQuizz) as nbrQuizz FROM categories LEFT JOIN quizz USING(idCategorie)GROUP BY idCategorie ORDER BY nbrQuizz DESC");
        $requete->execute();
        $categories = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($categories as $categorie){
            foreach($nbrs as $nbr){
                if($nbr["idCategorie"] == $categorie["idCategorie"]){
                    $nbrQuizz = $nbr["nbrQuizz"];
                    break;
                }else{
                    $nbrQuizz = 0;
                }
            }
            $objetCategorie = new Categorie();
            $objetCategorie->InitialiserCategorie($categorie["idCategorie"],$categorie["titre"],$categorie["photo"],$nbrQuizz);
            $this->listeCategories[] = $objetCategorie;
        }
    }
    public function initialiserListeQuizz($idCategorie){
        $requete = $this->getBdd()->prepare("SELECT * FROM categories WHERE idCategorie = ?");
        $requete->execute([$idCategorie]);
        $this->listeQuizz[] = $requete->fetch(PDO::FETCH_ASSOC);

        $requete = $this->getBdd()->prepare("SELECT idQuizz,titre, COUNT(score) AS nbrScore,identifiant FROM quizz LEFT JOIN participe USING(idQuizz) LEFT JOIN utilisateurs ON quizz.idUtilisateur = utilisateurs.idUtilisateur  WHERE valide = 1 AND idCategorie = ? GROUP BY idQuizz ORDER BY nbrScore DESC");
        $requete->execute([$idCategorie]);
        foreach($requete as $quizz){
            $Quizz = ["idQuizz" => $quizz["idQuizz"], "titre" => $quizz["titre"], "nbrScore" => $quizz["nbrScore"], "identifiant" => $quizz["identifiant"]];
            $this->listeQuizz[] = $Quizz;
        }
    }
    public function initialiserListeAmis($idUtilisateur){
        $requete = $this->getBdd()->prepare("SELECT * FROM amis WHERE idDemandeur = ? OR idReceveur = ?");
        $requete->execute([$idUtilisateur, $idUtilisateur]);
        $amis = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($amis as $ami){
            $objetAmi = new ami($ami["idDemandeur"], $ami["idReceveur"], $ami["status"]);
            $this->listeAmis[] = $objetAmi;
        }
    }
    public function initialiserListeParticipe($idUtilisateur){
        $requete = $this->getBdd()->prepare("SELECT * FROM participe WHERE idUtilisateur = ?");
        $requete->execute([$idUtilisateur]);
        $liste = $requete->fetchAll(PDO::FETCH_ASSOC);
        foreach($liste as $participe){
            $objetParticipe = new Participe();
            $objetParticipe->initialiserParticipe($participe["idUtilisateur"], $participe["idQuizz"], $participe["score"]);
            $this->listeParticipe[] = $objetParticipe;
        }
    }

    public function getTopCategorie(){
        return $this->topCategorie;
    }
    public function getTopQuizz(){
        return $this->topQuizz;
    }
    public function getListeCategories(){
        return $this->listeCategories;
    }
    public function getListeQuizz(){
        return $this->listeQuizz;
    }
    public function getListeAmis(){
        return $this->listeAmis;
    }
    public function getListeParticipe(){
        return $this->listeParticipe;
    }
}


?>