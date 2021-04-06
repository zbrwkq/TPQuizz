<?php
function categories(){
    $requete = getBdd()-> prepare("SELECT * FROM categories");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
function topCategories(){
    $requete = getBdd()->prepare ("SELECT idCategorie,COUNT(idQuizz) as compte FROM `quizz` GROUP BY idCategorie ORDER BY compte DESC LIMIT 4");
    $requete->execute();
    $requete = $requete->fetchAll(PDO::FETCH_ASSOC);
    $top = [];
    foreach($requete as $categorie){
        $top[]= $categorie["idCategorie"];
    }
    $sql = "SELECT * FROM categories WHERE";
    foreach($top as $iteration){
        $sql.= " idCategorie = ? OR";
    }
    $sql = substr($sql,0,-2);
    $requete= getBdd()->prepare($sql);
    $requete->execute($top);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}