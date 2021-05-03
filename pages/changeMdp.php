<?php
require_once "header.php";
$Utilisateur = new Utilisateur($_GET["id"]);
?>

<h1>Nouveau mdp</h1>
<form action="../traitements/changeMdp.php?id=<?=$_GET["id"];?>" method="post">
    <input type="password" name="password" placeholder="Mdp..." required>
    <button type="submit">OK</button>
</form>