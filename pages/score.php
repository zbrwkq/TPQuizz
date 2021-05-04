<?php
require_once "../pages/header.php";
// verif d'acces
if(empty($_GET["id"])){
    header("location:../pages/index.php");
}
if(isset($_SESSION["quizz"][$_GET["id"]][10])){
    $go = 1;
    $reponses = [];
    foreach($_SESSION["quizz"][$_GET["id"]] as $key=>$reponse){
        if($key != 0 ){
            $reponses[] = $reponse;
        }else{
            $score = $_SESSION["quizz"][$_GET["id"]][10];
        }
    }
}elseif(!empty($_SESSION["idUtilisateur"])){
    $participe = new Participe($_SESSION["idUtilisateur"], $_GET["id"]);
    if(null != $participe->getIdUtilisateur()){
        $go = 1;
        $score = $participe->getScore();
        $reponses = [];
        foreach($quizz->getQuestions() as $question){
            $repondre = new Repondre($_SESSION["idUtilisateur"], $question->getIdQuestion());
            $reponses[] = $repondre->getIdReponse();
        }
    }else{
        $go = 0;
    }
}else{
    $go = 0;
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
        if($go == 0){
                ?>
                <section>
                    <h1>Participer au quizz <a href="../pages/quizz.php?id=<?=$_GET["id"];?>">&#9654;</a></h1>
                </section>
                <?php
        }else{
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