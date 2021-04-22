<?php
require_once "../traitements/categorie.php";
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body>
    <main>
        <a href="../pages/categories.php">&#x25C4; retour</a>
        <?php
        if(!empty($_SESSION["idUtilisateur"])){
            ?>
            <section>
                <h1>Créer un nouveau quizz <a href="../pages/nouveauQuizz.php?idCategorie=<?=$_GET["id"];?>" class="glisse">&#9654;</a></h1>
            </section>
            <?php
        }
        ?>
        <section>
            <h1><?=$listeQuizz->getListeQuizz()[0]["titre"];?></h1>
            <div>
            <?php
                foreach($listeQuizz->getListeQuizz() as $key => $quizz){
                    if($key == 0){
                        continue;
                    }
                        ?>
                        <a href="../pages/quizz?id=<?=$quizz["idQuizz"];?>.php" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.8),rgba(255, 65, 108, 0.8))" data-tilt data-tilt-max="0" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                            <h1><?=$quizz["titre"];?></h1>
                            <h5>Créé par <?=$quizz["identifiant"];?></h5>
                            <h4>Fini <?=$quizz["nbrScore"];?> fois</h4>
                        </a>
                        <?php
                    }
                    ?>
            </div>
        </section>
    </main>
    <script src="vanilla-tilt.js"></script>
</body>