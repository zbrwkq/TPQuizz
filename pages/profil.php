<?php
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
$utilisateur = new Utilisateur($_GET["id"]);
$listeParticipe = new App;
$listeParticipe->initialiserListeParticipe($_GET["id"]);
?>
<body>
    <main>
        <section>
            <h1><?=$utilisateur->getIdentifiant();?></h1>
            <img src="<?=$utilisateur->getphotoProfil();?>" alt="">
        </section>
        <section>
            <h1>Score Total : <?=$utilisateur->scoreTotal();?></h1>
            <?php
            foreach($listeParticipe->getListeParticipe() as $participe){
                $quizz = new Quizz($participe->getIdQuizz());
                ?>
                <a href="../pages/quizz.php?id=<?=$quizz->getIdQuizz();?>">
                    <h1><?=$quizz->getTitre();?></h1>
                    
                    <h4>Score <?=$participe->getScore();?></h4>
                </a>
                <?php
            }
            ?>
        </section>
    </main>
</body>