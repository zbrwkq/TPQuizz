<?php
require_once "header.php";
?>

<p>Vous avez oublié votre mot de passe ? Entrez votre identifiant ci-dessous.</p>
<form action="../traitements/mdpOublie.php" method="post">
    <input type="text" name="identifiant" placeholder="Identifiant" required>
    <button type="submit" name="envoi">Valider</button>
</form>