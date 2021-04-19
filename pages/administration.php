<?php
require_once "header.php";
require_once "../traitements/administration.php";

$Administration = new Administration();
?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
<link rel="stylesheet" href="styles/styleAdministration.css">

<body>
    <div class="navigation">
        <div class="navigation-header">
            <i class="fas fa-user-cog"></i>
            <h1>Administration</h1>
        </div>
        <div class="navigation-content">
            <ul>
                <a href="../pages/administration.php?pages=membres">
                    <li>Membres</li>
                </a>
                <a href="#">
                    <li>Quizz</li>
                </a>
            </ul>
        </div>
        <div class="navigation-footer">
            <a href="../pages/deconnexion.php">Déconnexion</a>
        </div>
    </div>

    <div class="flex-column">
        <div class="informations">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-users"></i>
                    Membres inscrits
                </div>
                <div class="card-content">
                    <?=$Administration->membresInscrits()["nombreMembre"];?>
                </div>
                <div class="card-footer">
                    <div class="green-round"></div>
                    À jour
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-gamepad"></i>
                    Nombre de quizz
                </div>
                <div class="card-content">
                    <?=$Administration->nombreQuizz()["nombreQuizz"];?>
                </div>
                <div class="card-footer">
                    <div class="green-round"></div>
                    À jour
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-pause-circle"></i>
                    Quizz en attente
                </div>
                <div class="card-content">
                    <?=$Administration->nombreQuizzAttente()["nombreQuizzAttente"];?>
                </div>
                <div class="card-footer">
                    <div class="green-round"></div>
                    À jour
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-list-ol"></i>
                    Nombre de catégories
                </div>
                <div class="card-content">
                    <?=$Administration->nombreCategories()["nombreCategories"];?>
                </div>
                <div class="card-footer">
                    <div class="green-round"></div>
                    À jour
                </div>
            </div>
        </div>

        <div class="contenu">
            <?php
            if($_GET["pages"] == "membres"){
                ?>
                <div class="contenu-header">
                    <div class="header-left">
                        <h1>Membres inscrits</h1>
                    </div>
                    <div class="header-right">
                        <form method="post">
                            <input type="text" name="filtre" id="filtre" placeholder="Filtre...">
                            <button type="submit">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="contenu-content">
                    <table>
                        <th>N°</th>
                        <th>Identifiant</th>
                        <th>Grade</th>
                        <th>Actions</th>
                        <?php
                        foreach($membres as $membre){
                            ?>
                            <tr>
                                <td><?=$membre["idUtilisateur"];?></td>
                                <td><?=$membre["identifiant"];?></td>
                                <td><?=$membre["autorisation"];?></td>
                                <td>
                                    <button type="button">Modifier</button>
                                    <?php
                                    if($membre["autorisation"] == 1){
                                    ?>
                                        <button type="submit" title="Bannir" onclick="popupBannissement(<?=$membre['idUtilisateur'];?>)">
                                            <i class="fas fa-gavel"></i>
                                        </button>
                                    <?php
                                    }else if($membre["autorisation"] == 0){
                                    ?>
                                        <button type="submit" title="Débannir" onclick="popupDebannissement(<?=$membre['idUtilisateur'];?>)">
                                            <i class="fas fa-gavel" id="deban"></i>
                                        </button>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                    </table>
                </div>
                <div class="contenu-footer">

                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <!-- Pop-up bannissement -->
    <div class="bannissement" id="bannissement">
        <div class="pop-up">
            <div class="popup-header">Bannissement !</div>
            <div class="popup-content">
                Êtes-vous sûr(e) de vouloir bannir cet utilisateur ?
                <br>
                Une fois banni, il est impossible de revenir en arrière !
            </div>
            <div class="popup-footer">
                <form action="../traitements/bannissement.php" method="post">
                    <button type="submit" id="oui" name="id">OUI</button>
                </form>
                <button type="button" onclick="noBan()">NON</button>
            </div>
        </div>
    </div>

    <!-- Pop-up débannissement -->
    <div class="debannissement" id="debannissement">
        <div class="pop-up">
            <div class="popup-header">Débannissement !</div>
            <div class="popup-content">
                Êtes-vous sûr(e) de vouloir débannir cet utilisateur ?
                <br>
                Vous pourrez ensuite rebannir l'utilisateur !
            </div>
            <div class="popup-footer">
                <form action="../traitements/debannissement.php" method="post">
                    <button type="submit" id="yes" name="idyes">OUI</button>
                </form>
                <button type="button" onclick="noDeban()">NON</button>
            </div>
        </div>
    </div>

    <script src="../pages/script.js"></script>
</body>