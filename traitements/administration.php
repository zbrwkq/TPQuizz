<?php
require_once "../modeles/modele.php";

$Administration = new Administration();
$Utilisateur = new Utilisateur();
$Categorie = new Categorie();

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


if(!empty($_POST["categorie"]) && $_POST["categorie"] == 1){
    if(!empty($_POST["nomCategorie"]) && !empty($_FILES["photoCategorie"]) && !empty($_FILES["photoCategorie"]["name"])){
        extract($_POST);

        $target_dir = "../pages/images/profils/";
        $target_file = $target_dir . ($_FILES["photoCategorie"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["photoCategorie"]["tmp_name"], $target_file);

        $Categorie->addCategorie($nomCategorie, $target_file);
    }
}
?>