<?php
require_once "header.php";
// require_once "../traitements/administration.php";

$Quizz = new Quizz(1);
?>
<!-- <pre> -->
    <?php
    echo "Le titre du quizz est : " . $Quizz->getTitre();
    echo "<br>";
    echo "<br>";
    echo "L'id de la catégorie est : " . $Quizz->getCategorie()->getId();
    echo "<br>";
    echo "<br>";
    echo "L'id de la première question est : " . $Quizz->getQuestions();
    ?>
<!-- </pre> -->

<link rel="stylesheet" href="styles/styleAdministration.css">

<!-- <body>
    <main>
        <div class="navigation">
            <h1>Navigation</h1>
            <ul>
                <li>
                    <i class="fas fa-users"></i>
                    Membres
                </li>
                <li>
                    <i class="fas fa-list-ul"></i>
                    Quizz
                </li>
                <li>
                    <i class="fas fa-history"></i>
                    Historique
                </li>
            </ul>
        </div>

        
    </main>
</body> -->