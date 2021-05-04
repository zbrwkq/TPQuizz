<link rel="stylesheet" href="../pages/styles/stylenavbar.css">
<div id="navbar">
    <a href="../pages/index.php">
        <img src="../pages/images/logo/logo.svg" alt="">
    </a>
    <?php
    if(!empty($_SESSION["idUtilisateur"])){
        $utilisateur = new Utilisateur($_SESSION["idUtilisateur"]);
        ?>
        <a href="../pages/deconnexion.php">Déconnexion</a>
        <a href="../pages/profil?id=<?=$_SESSION["idUtilisateur"];?>">Profil</a>
        <?php
    }else{
        ?>
        <a href="../pages/connexion.php">Connexion</a>
        <?php
    }
    ?>
</div>