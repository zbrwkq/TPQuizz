<?php
require_once "header.php";

$Administration = new Administration();
?>

<table>
    <th>N°</th>
    <th>Utilisateur</th>
    <th>Numéro question</th>
    <th>Sa réponse</th>
    <th>Réponse correcte</th>

<?php
foreach($Administration->reponsesUtilisateursQuizz() as $reponseUtilisateurQuizz){
?>
    <tr>
        <td><?=$reponseUtilisateurQuizz["idUtilisateur"];?></td>
        <td><?=$reponseUtilisateurQuizz["identifiant"];?></td>
        <td><?=$reponseUtilisateurQuizz["idQuestion"];?></td>
        <td><?=$reponseUtilisateurQuizz["idReponse"];?></td>
        <td><?=$reponseUtilisateurQuizz["BonneReponse"];?></td>

    </tr>
    <?php
}
?>
</table>



<style>
    table, tr, tr, td, th{
        border: 2px solid #111;
        border-collapse: collapse;
    }
    td, th{
        padding: 5px;
    }
</style>