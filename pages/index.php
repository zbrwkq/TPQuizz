<?php
require_once "../traitements/index.php";
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<body>
    <main>
        <section>
            <!-- les 5 quizz les plus populaires -->
        </section>
        <section>
            <?php
            foreach($top as $categorie){
                ?>
                <a href="#" class="card" style="background-image: url('<?=$categorie["photo"];?>')">
                    <h1><?=$categorie["titre"];?></h1>
                </a>
                <?php
            }
            ?>
        </section>
        <section>
            <!-- liste d'amis -->
        </section>
    </main>
</body>