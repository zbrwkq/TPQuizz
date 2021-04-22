<?php
require_once "../pages/header.php";
?>

<body>
    <h1>Profil de <?=$_SESSION["identifiant"];?></h1>
    <input type="text" name="identifiant" placeholder="Identifiant..." required>
    <br>
    <p style="margin-bottom: 0">Grade</p>
    <select name="grade">
        <option value="1">Membre</option>
        <option value="2">Administrateur</option>
    </select>
</body>