<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require_once "../modeles/modele.php";

$erreurs = [];

if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"]) && !empty($_POST["confirmationMdp"])){
    extract($_POST);
    if($mdp != $confirmationMdp){
        $erreurs[] = "Les mots de passes saisit ne sont pas identiques !";
    }
    if(strlen($mdp) < 8){
        $erreurs[] = "Le mot de passe saisit fait moins de 8 caractères !";
    }

    if(count($erreurs) == 0){
        inscription();
    }else{
        ?>
        <div class="alert alert-danger">
            L'inscription n'a pas été effectuée : 
            <?php
            foreach($erreurs as $erreur){
                echo($erreur);
            }
            ?>
        </div>
        <?php
    }
}
?>