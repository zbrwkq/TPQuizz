<?php
require_once "../modeles/modele.php";

$Administration = new Administration();
$Utilisateur = new Utilisateur();

if(!empty($_POST["filtre"])){
    $membres = $Administration->recherche($_POST["filtre"]);
}else{
    $membres = $Administration->recuperationContacts();
}

$erreurs = 0;

if(!empty($_POST["envoi"]) && $_POST["envoi"] == 1){
    if(!empty($_POST["addIdentifiant"]) && !empty($_POST["addMdp"]) && !empty($_POST["addAutorisation"]) && !empty($_POST["questionSecrete"]) && !empty($_POST["reponseSecrete"])){
        extract($_POST);

        if(strlen($addMdp) < 8){
            $erreurs++;
            ?>
            <div class="alert alert-danger">
                Mot de passe trop court !
            </div>
            <?php
        }
        if($Utilisateur->selectionUtilisateurs($addIdentifiant) >= 1){
            $erreurs++;
            ?>
            <div class="alert alert-danger">
                Le nom d'utilisateur est déjà utilisé !
            </div>
            <?php
        }
        
    }

    if(empty($erreurs)){
        extract($_POST);
        if($_POST["addAutorisation"] == 1){
            $addAutorisation = 1;
        }else if($_POST["addAutorisation"] == 2){
            $addAutorisation = 2;
        }
        
        if($_POST["questionSecrete"] == 1){
            $questionSecrete = 1;
        }else if($_POST["questionSecrete"] == 2){
            $questionSecrete = 2;
        }else if($_POST["questionSecrete"] == 3){
            $questionSecrete = 3;
        }
        $Utilisateur->inscription($addIdentifiant, $addMdp, $addAutorisation, "../pages/images/profils/default.jpg", $questionSecrete, $reponseSecrete);
    }
}

?>