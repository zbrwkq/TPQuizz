<?php
require_once "../modeles/modele.php";
session_destroy();
header("location:../pages/connexion.php");
?>