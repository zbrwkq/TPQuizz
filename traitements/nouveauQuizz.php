<?php
require_once "../modeles/modele.php";


if(!empty($_POST["quizz"]) && $_POST["quizz"] == 1){
    if(empty($_POST["categorie"]) || empty($_POST["titre"]) || empty($_POST["question"]) || empty($_POST["reponse"]) || count($_POST["question"]) != 10 || count($_POST["reponse"]) != 10 ){
        header("location:../pages/nouveauQuizz.php?error=empty");
    }else{
        $quizz = new Quizz;
        $idQuizz = $quizz->ajoutQuizz($_POST["titre"],$_POST["categorie"],$_SESSION["idUtilisateur"]);
        foreach($_POST["question"] as $keyQuestion => $question){
            $objetQuestion = new Question;
            $idQuestion = $objetQuestion->ajoutQuestion($question,$idQuizz);
            foreach($_POST["reponse"][$keyQuestion] as $keyReponse => $reponse){
                $vraie = 0;
                if($keyReponse == 0){
                    $vraie = 1;
                }
                $objetReponse = new Reponse;
                $objetReponse->ajoutReponse($idQuestion,$reponse,$vraie);
            }
        }
    }
header("location:../pages/index.php?test=1");


    // for($i=1;$i<=10;$i++){
    //     if(empty($_POST["question".$i])){
    //         header("location:../pages/nouveauQuizz.php?error=empty");
    //         break;
    //     }else{
    //         $question = new Question;
    //         $question->setQuestion($_POST["question".$i]);
    //     }
    //     for($j=1;$j<=4;$j++){
    //         if(empty($_POST["reponse".$i."-".$j])){
    //             header("location:../pages/nouveauQuizz.php?error=empty");
    //             break;
    //         }else{
    //             $reponse = new Reponse;
    //             $reponse->setReponse($_POST["reponse".$i."-".$j]);
    //             if($j == 1){
    //                 $reponse->setVraie(1);
    //             }else{
    //                 $reponse->setVraie(0);
    //             }
    //         }
    //         $question->addReponse($reponse);
    //     }
    //     $quizz->addQuestion($question);
    // }
    // $quizz->ajoutQuizz();
    // echo "<
}
?>