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
                    <form action="../traitements/connexion.php" method="post">
                        <input type="text" name="identifiant" id="identifiant" placeholder="Identifiant..." required value="<?=!empty($_POST["identifiant"]) ? $_POST["identifiant"] : "";?>">
                        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe..." required>

                        <a href="#">Mot de passe oublié ?</a>
                        <button type="submit" name="connexion" value="1">Connexion</button>
                    </form>
                </div>
        </div>
        <div class="column right">
            <div class="wave">
                <a href="../pages/index.php">
                    <img src="../pages/images/logo/logo.svg" alt="Logo" width="250" id="logoTopQuizz">
                </a>
                <div class="img">
                    <img src="../pages/images/imagesConnexion/img3.svg" alt="Illustration 3" width="500">
                    <a href="../pages/inscription.php">S'INSCRIRE</a>
                </div>
            </div>
        </div>
        <?php
        if(!empty($_GET["error"])){
        ?>
        <div class="alert alert-danger">
        <?php
        switch ($_GET["error"]) {
            case 'pwlenght':
                echo "Le mot de passe doit faire au moins 8 caractères";
                break;
            
            case 'pwwrong':
                echo "Le mot de passe saisi est icorrect";
                break;
            
            case 'idwrong':
                echo "L'identifiant saisi est icorrect";
                break;
            
            default:
                break;
        }
        ?>
        </div>
        <?php
        }
        ?>
    </main>
</body>