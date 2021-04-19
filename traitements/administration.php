<?php
$Administration = new Administration();

if(!empty($_POST["filtre"])){
    $membres = $Administration->recherche($_POST["filtre"]);
}else{
    $membres = $Administration->recuperationContacts();
}

?>