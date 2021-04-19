<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
require_once "../modeles/Modele.php";
$Utilisateur = new Utilisateur();

$erreurs = [];

if(!empty($_POST["connexion"]) && $_POST["connexion"] == 1){
    if(!empty($_POST["identifiant"]) && !empty($_POST["mdp"])){
        extract($_POST);

        if($Utilisateur->selectionUtilisateurs($_POST["identifiant"]) != 1){
            $erreurs[] = "L'identifiant saisi est incorrect";
        }

        $connexion = $Utilisateur->connexion($identifiant, $mdp);
        if(count($erreurs) == 0){
            $connexion;
        }
        if($connexion > 0){
            $utilisateur = $connexion;
            // Vérification si le mdp entrer correspond au mdp dans la BDD.
            if(!password_verify($mdp,$utilisateur["mdp"])){
                $erreurs[] = "Le mot de passe saisi est icorrect";
            }
        }
    }

    // Si le nombre d'erreurs est à 0:
    if(count($erreurs)=== 0){
        // On connecte l'utilisateur avec une session et on le redirige vers la page correspondante à son grade.
        $_SESSION = $utilisateur;
        header("location:../pages/index.php");
    }else{
    // Affichage des erreurs possibles
        ?>
        <div class="alert alert-danger mt-3" style="z-index:999">
            Erreur<?=(count($erreurs)>1 ? "s" :"")?> : 
            <?php
                foreach($erreurs as $erreur){
                    echo($erreur);
                    ?>
                    <br>
                    <?php
                }
            ?>
        </div>
<?php
    }
}
?>