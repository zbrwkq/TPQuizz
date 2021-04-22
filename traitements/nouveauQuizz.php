<?php
require_once "../modeles/modele.php";
$categories = new App;
$categories->initialiserListeCategories();
if(!empty($_POST["quizz"]) && $_POST["quizz"] == 1){
    if(empty($_POST["categorie"] || empty($_POST["titre"]))){
        header("location:../pages/nouveauQuizz.php?error=empty");
    }else{
        $quizz = new Quizz;
        $quizz->setTitre($_POST["titre"]);
        $quizz->setCategorie($_POST["categorie"]);
    }
    for($i=1;$i<=10;$i++){
        if(empty($_POST["question".$i])){
            header("location:../pages/nouveauQuizz.php?error=empty");
            break;
        }else{
            $question = new Question;
            $question->setQuestion($_POST["question".$i]);
        }
        for($j=1;$j<=4;$j++){
            if(empty($_POST["reponse".$i."-".$j])){
                header("location:../pages/nouveauQuizz.php?error=empty");
                break;
            }else{
                $reponse = new Reponse;
                $reponse->setReponse($_POST["reponse".$i."-".$j]);
                if($j == 1){
                    $reponse->setVraie(1);
                }else{
                    $reponse->setVraie(0);
                }
            }
            $question->addReponse($reponse);
        }
        $quizz->addQuestion($question);
    }
    echo "<pre>";
    print_r($quizz);
    echo "</pre>";
}
?>