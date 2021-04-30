<?php
    require_once "../modeles/modele.php";
    $quizz = new Quizz($_GET["id"]);
    $score = 0;
    foreach($quizz->getQuestions() as $question){
        foreach($question->getReponses() as $reponse){
            if($reponse->getVraie() == 1 and  in_array($reponse->getIdReponse(),$_SESSION["quizz"][$_GET["id"]])){
                $score +=1;

            }
        }
    }
    $_SESSION["quizz"][$_GET["id"]][10] = $score;
    if(empty($_SESSION["idUtilisateur"])){
        header("location:../pages/score.php?id=".$_GET["id"]);
    }else{
        foreach($quizz->getQuestions() as $key => $question){
            if($_SESSION["quizz"][$_GET["id"]][$key] != 0){
                $repondre = new Repondre;
                $repondre->initialiserRepondre($_SESSION["idUtilisateur"],$question->getIdQuestion(),$_SESSION["quizz"][$_GET["id"]][$key]);
                $repondre->ajoutRepondre();

            }
        }
        $participe = new Participe;
        $participe->initialiserParticipe($_SESSION["idUtilisateur"],$quizz->getIdQuizz(),$_SESSION["quizz"][$_GET["id"]][10]);
        $participe->ajoutParticipe();
    }
    header("location:../pages/score.php?id=".$_GET["id"]);
    


?>