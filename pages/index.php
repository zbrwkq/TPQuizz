<?php
require_once "../traitements/index.php";
require_once "header.php";
?>
<main>
    <section>
        <!-- les 5 quizz les plus populaires -->
    </section>
    <section class="">
        <?php
        foreach($top as $categorie){
            ?>
            <div class="card" style="background-image: url('<?=$categorie["photo"];?>" alt="">')">
                <h1><?=$categorie["titre"];?></h1>
            </div>
            <?php
        }
        ?>
    </section>
    <section>
        <!-- liste d'amis -->
    </section>
</main>