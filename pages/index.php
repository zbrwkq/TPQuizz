<?php
require_once "../traitements/index.php";
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body>
    <main>
        <section>
            <h1>Découvrez les quizz populaires</h1>
            <div>
                <?php
                foreach($topQuizz->getTopQuizz() as $quizz){
                        ?>
                        <a href="../pages/quizz?id=<?=$quizz["idQuizz"];?>.php" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.8),rgba(255, 65, 108, 0.8))" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                            <h1><?=$quizz["titre"];?></h1>
                            <h5>Par <?=$quizz["identifiant"];?></h5>
                            <h3><?=$quizz["nbrScore"];?></h3>
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
                    <a href="../pages/categorie?id=<?=$categorie->getId();?>.php" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.3),rgba(255, 65, 108, 0.3)),url('<?=$categorie->getPhoto();?>')" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
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
        <section>
            <!-- liste d'amis -->
        </section>
    </main>
    <script src="vanilla-tilt.js"></script>
</body>