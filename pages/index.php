<?php
require_once "header.php";

$topCategories = new App;
$topCategories->initialiserTopCategorie();
$topQuizz = new App;
$topQuizz->initialiserTopQuizz();
if(!empty($_SESSION["idUtilisateur"])){
    $listeAmis = new App;
    $listeAmis->initialiserListeAmis($_SESSION["idUtilisateur"]);
}
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body>
    <main>
    <?php
        if(!empty($_SESSION["idUtilisateur"])){
            ?>
            <section>
                <h1>Créer un nouveau quizz <a href="../pages/nouveauQuizz.php" class="glisse">&#9654;</a></h1>
            </section>
            <?php
        }
    ?>
        <section>
            <h1>Découvrez les quizz populaires</h1>
            <div>
                <?php
                foreach($topQuizz->getTopQuizz() as $quizz){
                        ?>
                        <a href="../pages/quizz.php?id=<?=$quizz["idQuizz"];?>" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.8),rgba(255, 65, 108, 0.8))" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                            <h1><?=$quizz["titre"];?></h1>
                            <h5>Créé par <?=$quizz["identifiant"];?></h5>
                            <h4>Fini <?=$quizz["nbrScore"];?> fois</h4>
                        </a>
                        <?php
                    }
                    ?>
            </div>
        </section>
        <section>
            <h1>Explorez les différentes catégories</h1>
            <div>
                <?php
                foreach($topCategories->getTopCategorie() as $categorie){
                    ?>
                    <a href="../pages/categorie.php?id=<?=$categorie->getId();?>" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.3),rgba(255, 65, 108, 0.3)),url('<?=$categorie->getPhoto();?>')" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                        <h1><?=$categorie->getTitre();?></h1>
                        <h5>nombre de quizz : </h5>
                        <h3><?=$categorie->getNbrQuizz();?></h3>
                    </a>
                    <?php
                }
                ?>
                <a href="../pages/categories.php" class="card plus">
                    <h1>Toutes les categories</h1>
                    <div>
                        <div>
                            <table>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </a>
            </div>
        </section>
        <?php
        if(!empty($_SESSION["idUtilisateur"])){
            echo "<section>";
            if(count($listeAmis->getListeAmis()) > 0){
                echo "<div>";
                $attente = [];
                foreach($listeAmis->getListeAmis() as $ami){
                    if($ami->getIdDemandeur() != $_SESSION["idUtilisateur"] && $ami->getStatus() == 1){
                        $objetAmi = new Utilisateur($ami->getIdDemandeur());
                        ?>
                        <a href="../pages/profil.php?id=<?=$ami->getIdDemandeur();?>">
                            <h1><?=$objetAmi->getIdentifiant();?></h1>
                        </a>
                        <?php
                    }elseif($ami->getIdReceveur() != $_SESSION["idUtilisateur"] && $ami->getStatus() == 1){
                        $objetAmi = new Utilisateur($ami->getIdReceveur());
                        ?>
                        <a href="../pages/profil.php?id=<?=$ami->getIdReceveur();?>">
                            <h1><?=$objetAmi->getIdentifiant();?></h1>
                        </a>
                        <?php
                    }elseif($ami->getIdDemandeur() != $_SESSION["idUtilisateur"] && $ami->getStatus() == 0){
                        $attente[] = $ami->getIdDemandeur();
                    }
                }
                echo "</div>";
                if(!empty($attente)){
                    foreach($attente as $futurAmi){
                        $utilisateur = new Utilisateur($futurAmi);
                        ?>
                        <h3><?=$utilisateur->getIdentifiant();?></h3>
                        <form action="../traitements/ajoutAmi.php?idDemandeur=<?=$futurAmi;?>" method="post">
                            <button name="choix" value="1">Accepter</button>
                            <button name="choix" value="2">Refuser</button>
                        </form>
                        <?php
                    }
                }
            }
            ?>
                <h1>Ajouter un ami : </h1>
                <form action="../traitements/ajoutAmi.php" method="post" id="ajoutAmi">
                    <h5>Identifiant</h5>
                    <input type="text" name="identifiant" id="identifiant">
                    <button>Ajouter !</button>
                </form>
            <section>
            <?php
        }
        ?>
    </main>
    <script src="vanilla-tilt.js"></script>
</body>