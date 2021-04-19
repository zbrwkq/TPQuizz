<?php
require_once "header.php";
require_once "../traitements/connexion.php";
?>

<link rel="stylesheet" href="styles/styleConnexion.css">

<body>
    <main>
        <div class="column left">
            <div class="left-card">
                    <img id="imgProfil" src="images/imagesConnexion/img2.svg" alt="Image d'illutration d'un profil" width="100">
                    <h1>Se connecter</h1>
                    <form action="#" method="post">
                        <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant..." required>
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe..." required>

                        <a href="#">Mot de passe oublié ?</a>
                        <button type="submit" name="connexion" value="1">Connexion</button>
                    </form>
                </div>
        </div>
        <div class="column right">
            <div class="wave">
                <img src="../pages/images/logo/logo.svg" alt="Logo" width="250">
                <img src="../pages/images/imagesConnexion/img3.svg" alt="Illustration 3" width="500">
            </div>
        </div>
    </main>
</body>