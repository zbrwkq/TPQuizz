<?php
require_once "../pages/header.php";
if(empty($_GET["id"])){
    header("location:../pages/index.php");
}
$quizz = new Quizz($_GET["id"]);

?>
<link rel="stylesheet" href="../pages/styles/styleIndex.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<?php
require_once "../pages/navbar.php";
?>
<body>
    <main>
        <section>
            <h1><?=$quizz->getTitre();?></h1>
        </section>
        <?php
        $go = 0;
        if(!empty($_SESSION["idUtilisateur"])){
            $participe = new Participe($_SESSION["idUtilisateur"], $_GET["id"]);
            if(empty($participe->getScore())){
                ?>
                <section>
                    <h1>
                        Participer au quizz <a href="../pages/quizz.php?id=<?=$_GET["id"];?>">&#9654;</a>
                    </h1>
                </section>
                <?php
            }else{
                $score = $participe->getScore();
                $reponses = [];
                foreach($quizz->getQuestions() as $question){
                    $repondre = new Repondre($_SESSION["idUtilisateur"], $question->getIdQuestion());
                    $reponses[] = $repondre->getIdReponse();
                }
                $go = 1;
            }
        }elseif(!isset($_SESSION["quizz"][$_GET["id"]]) || (isset($_SESSION["quizz"][$_GET["id"]]) && count($_SESSION["quizz"][$_GET["id"]]) < 11)){
            ?>
            <section>
                <h1>
                    Participer au quizz <a href="../pages/quizz.php?id=<?=$_GET["id"];?>">&#9654;</a>
                </h1>
            </section>
            <?php
        }else{
            $score = $_SESSION["quizz"][$_GET["id"]][10];
            $reponses = [];
            foreach($_SESSION["quizz"][$_GET["id"]] as $idReponse){
                $reponses[] = $idReponse;
            }

            $go = 1;
        }
        if($go == 1){
            ?>
            <section>
                <h1>
                    Score : <?=$score;?> / 10
                </h1>
            </section>
        <?php
            foreach($quizz->getQuestions() as $question){
                ?>
                <section>
                    <h1><?=$question->getQuestion();?></h1>
                    <?php
                    foreach($question->getReponses() as $reponse){
                        if($reponse->getVraie()){
                            ?>
                            <p style="color: limegreen;"><?=$reponse->getReponse();?><?= in_array($reponse->getIdReponse(),$reponses) ? "&#x2713;" : "" ;?></p>
                        <?php
                        }else{
                            ?>
                            <p ><?=$reponse->getReponse();?><?= in_array($reponse->getIdReponse(),$reponses) ? "&#10060;" : "" ;?></p>
                            <?php
                        }
                    }
                    ?>
                </section>
                <?php
            }
        }
        ?>
    </main>
</body>