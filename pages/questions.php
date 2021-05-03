<?php
require_once "../pages/header.php";

$Administration = new Administration();
?>

<a href="../pages/administration.php?pages=quizz">Retour à l'administration</a>

<table>
<th>N°</th>
<th>Libelle</th>
<th>Réponses disponibles</th>
<?php
foreach($Administration->recuperationQuestionsQuizzEnAttente($_GET["pages"]) as $question){
    ?>
    <tr>
        <td><?=$question["idQuestion"];?></td>
        <td><?=$question["question"];?></td>
        <td>
            <?php
                foreach($Administration->recuperationReponsesQuestionsQuizzEnAttente($question["idQuestion"]) as $reponse){
                    echo $reponse["reponse"] . " ";
                }
            ?>
        </td>
    </tr>
    <?php
}
?>
</table>


<style>
    table, th, tr, td{
        border: 2px solid #111;
        border-collapse: collapse;
    }
    table{
        margin-top: 10px;
    }
    th, td{
        padding: 5px;
    }
</style>