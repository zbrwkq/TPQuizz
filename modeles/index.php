<?php
require_once "../modeles/app.php";

$quizz = new Quizz(1);
?>
<pre>
<?php
echo "Titre quizz: ".$quizz->getTitre();
echo "<br>";
echo "id categorie: ".$quizz->getCategorie()->getId();
echo "<br>";
echo "id de la premiere question du quizz: " . $quizz->getQuestions()[0]->getId();
echo "<br>";
echo "intitulé de la premiere question du quizz: " . $quizz->getQuestions()[0]->getQuestion();
echo "<br>";
echo "intitulé de la premiere reponse de la premiere question du quizz: " . $quizz->getQuestions()[0]->getReponses()[0]->getReponse();
echo "<br>";
echo "information si la premiere reponse de la premiere question du quizz est vraie: " . $quizz->getQuestions()[0]->getReponses()[0]->getVraie();
echo "<br>";
?>
</pre>