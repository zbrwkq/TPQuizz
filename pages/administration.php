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
                <a href="../pages/administration.php?pages=categorie">
                    <li>Catégorie</li>
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
                        <th>Action</th>
                        <?php
                        foreach($membres as $membre){
                            ?>
                            <tr>
                                <td><?=$membre["idUtilisateur"];?></td>
                                <td id="identifiant">
                                    <span id="p<?=$membre["idUtilisateur"];?>"><?=$membre["identifiant"];?></span>
                                    <i class="fas fa-edit" title="Modifier" onclick="showInput('inputIdentifiant<?=$membre['idUtilisateur'];?>', 'p<?=$membre['idUtilisateur'];?>')"></i>
                                    <input type="hidden" name="identifiant" id="inputIdentifiant<?=$membre["idUtilisateur"];?>" placeholder="Identifiant..." value="<?=$membre["identifiant"];?>">
                                </td>
                                <td id="grade">
                                    <span id="g<?=$membre["idUtilisateur"];?>">
                                    <?php
                                        $Administration->autorisationString($membre["autorisation"]);
                                    ?>
                                    </span>
                                    <i class="fas fa-edit" title="Modifier" onclick="showSelect('autorisation<?=$membre['idUtilisateur'];?>', 'g<?=$membre['idUtilisateur'];?>')"></i>
                                    <select name="autorisation" id="autorisation<?=$membre["idUtilisateur"];?>">
                                        <option value="1">Membre</option>
                                        <option value="2">Administrateur</option>
                                    </select>
                                </td>
                                <td>
                                    <?php
                                    if($membre["autorisation"] == 1 || $membre["autorisation"] == 2){
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
                    <a href="../pages/administration.php?pages=addUser">Ajouter un utilisateur</a>
                </div>
                <?php
            }


            if($_GET["pages"] == "addUser"){
                ?>
                <div class="contenu-header">
                    <h1>Ajouter un utilisateur</h1>
                </div>
                <div class="contenu-content2">
                    <div class="content2-left">
                        <div class="left1">
                            <p>Pour ajouter un utilisateur, tout les champs ci-dessous sont requis. Vous pourrez, en tant qu'Administrateur, modifier certaines informations par la suite.</p>
                        </div>
                        <div class="left2">
                            <form action="#" method="post">
                                <input type="text" name="addIdentifiant" id="addIdentifiant" placeholder="Identifiant..." required>
                                <input type="password" name="addMdp" id="addMdp" placeholder="Mot de passe..." required>
                                <select name="addAutorisation" id="addAutorisation">
                                    <option value="1">Membre</option>
                                    <option value="2">Administrateur</option>
                                </select>
                                <select name="questionSecrete" id="questionSecrete">
                                    <option value="1">Dans quelle ville êtes-vous né(e) ?</option>
                                    <option value="2">Combien avez-vous de frère(s) et soeur(s) ?</option>
                                    <option value="3">Quel surnom vous donne vos proches ?</option>
                                </select>
                                <input type="text" name="reponseSecrete" id="reponseSecrete" placeholder="Réponse..." required>

                                <button type="submit" name="envoi" value="1">Ajouter / Enregistrer</button>
                            </form>
                        </div>
                    </div>
                    <div class="content2-right">
                        <img src="../pages/images/imagesConnexion/img4.svg" alt="Illustration" width="400">
                    </div>
                </div>

                <?php
            }


            if($_GET["pages"] == "categorie"){
                ?>
                <div class="contenu-header">
                    <h1>Catégories</h1>
                </div>
                <div class="contenu-content3">
                    <div class="content3-left">
                        <div class="left-header">
                            <h4>Ajouter une catégorie</h4>
                        </div>
                        <div class="left-content">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <input type="text" name="nomCategorie" placeholder="Nom de la catégorie..." required>
                                <input type="file" name="photoCategorie" required>

                                <button type="submit" name="categorie" value="1">Créer la catégorie</button>
                            </form>
                        </div>
                    </div>
                    <div class="content3-right">
                        <div class="right-header">
                            <h4>Liste des catégories</h4>
                        </div>
                        <div class="right-content">
                            <table>
                                <th>N°</th>
                                <th>Libelle</th>
                                <?php
                                foreach($Categorie->recuperationCategories() as $categorie){
                                    ?>
                                    <tr>
                                        <td><?=$categorie["idCategorie"];?></td>
                                        <td><?=$categorie["titre"];?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
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