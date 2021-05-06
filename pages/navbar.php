<?php
if(!empty($_SESSION["idUtilisateur"]) && $_SESSION["autorisation"] == 0){
    header("location:../pages/banni.php");
}
?>
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
        if($_SESSION["autorisation"] == 2){
            ?>
            <a href="../pages/administration.php">Administration</a>
            <?php
        }
    }else{
        ?>
        <a href="../pages/connexion.php">Connexion</a>
        <?php
    }
    ?>
</div>