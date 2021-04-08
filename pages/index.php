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
            <h1>Explorez les différentes catégories</h1>
            <div>
                <?php
                foreach($topCategories as $categorie){
                    ?>
                    <a href="#" class="card" style="background-image: linear-gradient(to top left, rgba(255, 74, 42, 0.3),rgba(255, 65, 108, 0.3)),url('<?=$categorie["photo"];?>')" data-tilt data-tilt-max="8" data-tilt-glare data-tilt-max-glare="0.8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                        <h1><?=$categorie["titre"];?></h1>
                        <h5>nombre de quizz : </h5>
                        <h3><?=$categorie["nbrQuizz"];?></h3>
                    </a>
                    <?php
                }
                ?>
                <a href="#" class="card plus" data-tilt data-tilt-max="8" data-tilt-axis="x" data-tilt data-tilt-reverse="true">
                    <h1>Toutes les categories</h1>
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
                </a>
            </div>
        </section>
        <section>
            <!-- liste d'amis -->
        </section>
    </main>
    <script src="vanilla-tilt.js"></script>
</body>