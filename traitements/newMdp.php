<?php
require_once "../modeles/modele.php";
$Utilisateur = new Utilisateur($_GET["id"]);

if($Utilisateur->getReponseSecrete() == $_POST["reponse"]){
    header("location:../pages/changeMdp.php?id=" . $_GET["id"]);
}else{
    header("location:../pages/newMdp.php?error=yes");
}
?>