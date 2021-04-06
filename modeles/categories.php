<?php
function categories(){
    $requete = getBdd()-> prepare("SELECT * FROM categories");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}
function topCategories(){
    $requete = getBdd()->prepare ("SELECT idCategorie,categories.titre,photo,COUNT(idQuizz) as nbrQuizz FROM categories LEFT JOIN quizz USING(idCategorie) GROUP BY idCategorie ORDER BY nbrQuizz DESC LIMIT 4");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}