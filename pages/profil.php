<?php
require_once "../pages/header.php";
?>

<body>
    <h1>Profil de <?=$_SESSION["identifiant"];?></h1>
    <form action="../traitements/profil.php" method="post">
        <label for="identifiant">Identifiant</label>
        <input type="text" name="identifiant" placeholder="Identifiant..." value="<?=$_SESSION["identifiant"];?>" required>
        <br>
        <p style="margin-bottom: 0">Grade</p>
        <select name="grade">
            <option value="1" <?=$_SESSION["autorisation"] == 1 ? "selected" : "";?>>Membre</option>
            <option value="2" <?=$_SESSION["autorisation"] == 2 ? "selected" : "";?>>Administrateur</option>
        </select>
        <br>
        <br>
        <button type="submit">Enregistrer</button>
    </form>
</body>