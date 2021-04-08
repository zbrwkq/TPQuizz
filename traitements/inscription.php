<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require_once "../modeles/modele.php";
$Utilisateur = new Utilisateur();

$erreurs = [];

if(!empty($_POST["envoi"]) && $_POST["envoi"] == 1){
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"]) && !empty($_POST["confirmationMdp"]) && !empty($_POST["questionSecrete"]) && !empty($_POST["reponseQuestionSecrete"])){
        extract($_POST);
        if($mdp != $confirmationMdp){
            header("location:../pages/inscription.php?error=passwords");
        }
        if(strlen($mdp) < 8){
            header("location:../pages/inscription.php?error=passwordlen");
        }
    }else{
        header("location:../pages/inscription.php?error=empty");
    }

   
    


     // On insère les informations d'inscription en BDD si les vérifications ont été validées ci-dessus.
     if(count($erreurs) == 0){
        $Utilisateur->inscription();
        $Utilisateur->questionSecrete();
    }else{
        ?>
        <div class="alert alert-danger">
            L'inscription n'a pas été effectuée : 
            <?php
            foreach($erreurs as $erreur){
                echo($erreur . "<br>");
            }
            ?>
        </div>
        <?php
    }
}

if(!empty($_GET)){
    if($_GET["error"] == "empty"){
        $erreurs[] = "Les champs ne peuvent pas être vides pour continuer !";
        ?>
        <div class="alert alert-danger">
            L'inscription n'a pas été effectuée : 
            <?php
            foreach($erreurs as $erreur){
                echo($erreur . "<br>");
            }
            ?>
        </div>
        <?php
    }else if($_GET["error"] == "passwords"){
        $erreurs[] = "Les mots de passes saisit ne sont pas identiques !";
        ?>
        <div class="alert alert-danger">
            L'inscription n'a pas été effectuée : 
            <?php
            foreach($erreurs as $erreur){
                echo($erreur . "<br>");
            }
            ?>
        </div>
        <?php
    }else if($_GET["error"] == "passwordlen"){
        $erreurs[] = "Le mot de passe saisit fait moins de 8 caractères !";
        ?>
        <div class="alert alert-danger">
            L'inscription n'a pas été effectuée : 
            <?php
            foreach($erreurs as $erreur){
                echo($erreur . "<br>");
            }
            ?>
        </div>
        <?php
    }
}
?>