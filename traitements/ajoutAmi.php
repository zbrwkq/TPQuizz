<?php
require_once "../modeles/modele.php";
if(!empty($_GET["idDemandeur"])){
    $ami = new Ami($_GET["idDemandeur"],$_SESSION["idUtilisateur"],0);
    if($_POST["choix"] == 1){
        $ami->accepterAmi();
    header("location:../pages/index.php?error=accepter#ajoutAmi");
        exit;
    }elseif($_POST["choix"] == 2){
        $ami->refuserAmi();
    header("location:../pages/index.php?error=refuser#ajoutAmi");
        exit;
    }
}
if(!empty($_POST["identifiant"])){
    $nouveauAmi = new Utilisateur;
    $infoAmi = $nouveauAmi->connexion($_POST["identifiant"]);
    if(!empty($infoAmi["idUtilisateur"])){
        $demandeAmi = new Ami;
        $demandeAmi->initialiserAmi($_SESSION["idUtilisateur"], $infoAmi["idUtilisateur"]);
        $demandeAmi->ajoutAmi();
        header("location:../pages/index.php#ajoutAmi");
        exit;
    }else{
        header("location:../pages/index.php?error=friendname#ajoutAmi");
        exit;
    
    }
}

?>