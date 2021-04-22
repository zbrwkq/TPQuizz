<?php
require_once "../traitements/nouveauQuizz.php";
require_once "header.php";
?>
<link rel="stylesheet" href="../pages/styles/styleNouveauQuizz.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body>
    <main>
        <a href="../pages/categories.php">&#x25C4; retour</a>

        <form action="../traitements/nouveauQuizz.php" method="post">
            <section>
                <h1>Catégorie</h1>
                <select name="categorie" id="categorie" required>
                    <option value="" selected disabled>Choisir une catégorie...</option>
                    <?php
                    foreach($categories->getListeCategories() as $categorie){
                        ?>
                        <option value="<?=$categorie->getId();?>" <?=!empty($_GET["idCategorie"]) && $_GET["idCategorie"] == $categorie->getId() ? "selected" : "";?>><?=$categorie->getTitre();?></option>
                        <?php
                    }
                    ?>
                </select>
                <h1>Titre</h1>
                <input type="text" name="titre" id="titre" placeholder="Titre..." required>
            </section>
            <?php
            for($i=1;$i<=10;$i++){
                ?>
                <section class="<?=$i;?>">
                    <div class="divQuestion">
                        <h1>Question <?=$i;?></h1>
                        <input type="text" name="question<?=$i;?>" id="question<?=$i;?>" placeholder="Question <?=$i;?>..." class="inputQuestion" required>
                    </div>
                    <div class="divReponse">
                        <div>
                            <h3>Réponse 1</h3>
                            <input type="text" name="reponse<?=$i;?>-1" id="reponse<?=$i;?>-1" placeholder="Réponse bonne..." required>
                        </div>
                        <div>
                            <h3>Réponse 2</h3>
                            <input type="text" name="reponse<?=$i;?>-2" id="reponse<?=$i;?>-2" placeholder="Réponse fausse..." required>
                        </div>
                        <div>
                            <h3>Réponse 3</h3>
                            <input type="text" name="reponse<?=$i;?>-3" id="reponse<?=$i;?>-3" placeholder="Réponse fausse..." required>
                        </div>
                        <div>
                            <h3>Réponse 4</h3>
                            <input type="text" name="reponse<?=$i;?>-4" id="reponse<?=$i;?>-4" placeholder="Réponse fausse..." required>
                        </div>
                        <div onclick="lock(<?=$i;?>)" class="lock">V</div>
                    </div>
                </section>
                <?php
            }
            ?>


            <button type="submit" name="quizz" value="1">Valider</button>
        </form>
    </main>
</body>