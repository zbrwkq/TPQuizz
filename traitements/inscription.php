<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require_once "../modeles/Modele.php";
$Utilisateur = new Utilisateur();
$QuestionSecrete = new QuestionSecrete();

$erreurs = 0;

if(!empty($_POST["inscription"]) && $_POST["inscription"] == 1){
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"]) && !empty($_POST["confirmationMdp"]) && !empty($_POST["questionSecrete"]) && !empty($_POST["reponseSecrete"])){
        extract($_POST);
        if($mdp != $confirmationMdp){
            $erreurs++;
            header("location:../pages/inscription.php?error=passwords");
        }
        if(strlen($mdp) < 8){
            $erreurs++;
            header("location:../pages/inscription.php?error=passwordlen");
        }
        if($Utilisateur->selectionUtilisateurs($identifiant) >= 1){
            $erreurs++;
            header("location:../pages/inscription.php?error=username");
        }
    }else{
        $erreurs++;
        header("location:../pages/inscription.php?error=empty");
    }

    if(empty($erreurs)){
        extract($_POST);
        $Utilisateur->inscription($identifiant, $mdp, 1, "../pages/images/profils/default.jpg", $questionSecrete, $reponseSecrete);
    }
}

// Vérification des données pour la question secrète choisit
if(!empty($_POST["questionSecrete"])){
    if($_POST["questionSecrete"] == 1){
        $questionSecrete = 1;
    }else if($_POST["questionSecrete"] == 2){
        $questionSecrete = 2;
    }else if($_POST["questionSecrete"] == 3){
        $questionSecrete = 3;
    }
}
?>