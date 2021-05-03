<link rel="stylesheet" href="../pages/styles/styleProfil.css">

<?php
require_once "../pages/header.php";
$Utilisateur = new Utilisateur($_GET["id"]);
?>

<body>
    <div class="modificationProfil">
        <h1>Profil de <?=$Utilisateur->getIdentifiant();?></h1>
        <form action="../traitements/profil.php" method="post">
            <label for="identifiant">Identifiant</label>
            <input type="text" name="identifiant" placeholder="Identifiant..." value="<?=$Utilisateur->getIdentifiant();?>" required>
            <br>
            <label for="grade">Grade</label>
            <select name="grade">
                <option value="1" <?=$Utilisateur->getAutorisation() == 1 ? "selected" : "";?>>Membre</option>
                <option value="2" <?=$Utilisateur->getAutorisation() == 2 ? "selected" : "";?>>Administrateur</option>
            </select>
            <br>
            <br>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>