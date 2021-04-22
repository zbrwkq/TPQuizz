<?php
require_once "../traitements/categories.php";
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body>
    <main>
        <a href="../pages/index.php">&#x25C4; retour</a>
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
            <h1>Liste des catégories</h1>
            <div>
                <?php
                foreach($categories->getListeCategories() as $categorie){
                    ?>
                    <a href="../pages/categorie.php?id=<?=$categorie->getId();?>" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.3),rgba(255, 65, 108, 0.3)),url('<?=$categorie->getPhoto();?>')" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                    <h1><?=$categorie->getTitre();?></h1>
                    <h5>nombre de quizz : </h5>
                    <h3><?=$categorie->getNbrQuizz();?></h3>
                    </a>
                    <?php
                }
                ?>
            </div>
        </section>
    </main>
    <script src="vanilla-tilt.js"></script>
</body>