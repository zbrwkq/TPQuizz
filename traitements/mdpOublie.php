<?php
require_once "../modeles/modele.php";
$Utilisateur = new Utilisateur();
$variable = $Utilisateur->connexion($_POST['identifiant']);

if($Utilisateur->mdpOublie($_POST["identifiant"]) == 1){
    header("location:../pages/newMdp.php?id=" . $variable["idUtilisateur"]);

}else{
    header("location:../pages/mdpOublie.php?error=yes");
}
?>