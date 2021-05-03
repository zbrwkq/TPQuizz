<?php
require_once "header.php";
$Utilisateur = new Utilisateur($_GET["id"]);
?>

<p>Voici votre question secrète</p>
<?php
if($Utilisateur->getQuestionSecrete() == 1){
    echo "Dans quelle ville êtes-vous né(e) ?";
}else if($Utilisateur->getQuestionSecrete() == 2){
    echo "Combien avez-vous de frère(s) et/ou de soeur(s) ?";
}else if($Utilisateur->getQuestionSecrete() == 3){
    echo "Quel surnom vous donne vos proches ?";
}
?>
<form action="../traitements/newMdp.php?id=<?=$_GET["id"];?>" method="post">
    <input type="text" name="reponse" placeholder="Réponse...">
    <button type="submit">OK</button>
</form>