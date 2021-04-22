<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require_once "../modeles/Modele.php";
$utilisateur = new Utilisateur();

$erreurs = 0;

if(!empty($_POST["connexion"]) && $_POST["connexion"] == 1){
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"])){
        extract($_POST);
        
        if(strlen($mdp) < 8){
            $erreurs ++;
            header("location:../pages/connexion.php?error=pwlenght");
        }

        if($erreurs === 0){
            $connexion = $utilisateur->connexion($identifiant);
            if($connexion > 0){
                // Vérification si le mdp entrer correspond au mdp dans la BDD.
                if(!password_verify($mdp, $connexion["mdp"])){
                    $erreurs ++;
                    header("location:../pages/connexion.php?error=pwwrong");
                }
            }else{
                $erreurs ++;
                header("location:../pages/connexion.php?error=idwrong");
            }
        }
    }

    // Si le nombre d'erreurs est à 0:
    if($erreurs === 0){
        // On connecte l'utilisateur avec une session et on le redirige vers la page correspondante à son grade.
        $_SESSION= $connexion;
        header("location:../pages/index.php");
    }
}
?>