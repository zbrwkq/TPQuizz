<?php
require_once "header.php";
// verif pour acceder aux quizz
if(empty($_GET["id"])){
    header("location:index.php");
}
if(isset($_SESSION["quiz"][$_GET["id"]][10])){
    header("location:../pages/score.php?id=".$_GET["id"]);
}
if(!empty($_SESSION["idUtilisateur"])){
    $participe = new Participe($_SESSION["idUtilisateur"],$_GET["id"]);
    if(!empty($participe->getScore())){
        header("location:../pages/score.php?id=".$_GET["id"]);
    }
}
$quizz = new Quizz($_GET["id"]);
?>
<link rel="stylesheet" href="../pages/styles/styleQuizz.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "navbar.php";
?>
<body <?= !empty($_GET["go"]) || isset($_SESSION["quizz"][$_GET["id"]]) ? "onload=next()" : "";?>>
    <main>
    <?php
    // affichage description Quizz
    if(!isset($_SESSION["quizz"][$_GET["id"]]) && empty($_GET["go"])){
    ?>
        <section style="display:flex;">
            <div></div>
            <h1>
                <?=$quizz->getTitre();?>
            </h1>
            <p>Vous allez répondre a un quizz composé de 10 questions avec un temps imparti de 20 secondes par question.<br>Vous ne pourrez effectuer ce quizz qu'une seule fois donc faites attention, de plus si vous quittez la page la question sera comptée fausse et vous reprendrez a la question  suivante.</p>
            <div>
                <a href="../pages/quizz.php?id=<?=$_GET["id"]."&go=1";?>">
                    <button>GO</button>
                </a>
            </div>
        </section>
        <?php    
    }
    // verification des questions deja repondu
    if(!empty($_GET["go"]) || isset($_SESSION["quizz"][$_GET["id"]])){
        if(!isset($_SESSION["quizz"][$_GET["id"]])){
            $_SESSION["quizz"][$_GET["id"]] = [];
        }
        if(empty($_SESSION["quizz"][$_GET["id"]])){
            $question = 0;
        }else{
            $question = count($_SESSION["quizz"][$_GET["id"]]);
            if($question > 9){
                header("location:../traitements/quizz.php?id=".$_GET["id"]);
            }
        }
        if($question < 10){
            $_SESSION["quizz"][$_GET["id"]][$question] = 0;
        }
    if(!empty($_POST["reponse"])){
            $_SESSION["quizz"][$_GET["id"]][$question-1] = $_POST["reponse"];
    }
    // affichage questions quizz
    ?>
        <section>
            <form action="../pages/quizz.php?id=<?=$_GET["id"];?>" method="post">
                <h1><?=$quizz->getQuestions()[$question]->getQuestion();?></h1>
            <?php
            $i = 0;
            $tab = [];
            while($i < 4){
                $num = rand(0,3);
                while(in_array($num,$tab)){
                    $num = rand(0,3);
                }
                $i += 1;
                $tab[] = $num;
                ?>
                <label for="<?=$quizz->getQuestions()[$question]->getReponses()[$num]->getIdReponse();?>"><?=$quizz->getQuestions()[$question]->getReponses()[$num]->getReponse();?></label>
                <input type="radio" id="<?=$quizz->getQuestions()[$question]->getReponses()[$num]->getIdReponse();?>" name="reponse" value="<?=$quizz->getQuestions()[$question]->getReponses()[$num]->getIdReponse();?>">
                <?php
            }
            ?>
                <button>Valider</button>
            </form>
        </section>

        <?php        
        }
        ?>
    </main>
</body>
<script src="scriptQuizz.js"></script>