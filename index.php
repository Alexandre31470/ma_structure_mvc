<?php
session_start();//Démarrage de la session 

define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS'])?"https" : "http") . 
"://" .$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));//Définition d'une constante URL pour indiquer que l'on ira toujours chercher les ressources depuis la racine du site

require_once ("./controllers/MainController.controller.php");
$mainController =new MainController();

try{
if(empty($_GET['page'])){ //Vérifie si la variable $_GET['page'] est vide
    $page= "accueil"; //Si la variable $_GET['page'] est vide, la variable $page est définie sur la chaîne "accueil"
}else{ //sinon si $_GET['page'] n'est pas vide, c'est-à-dire qu'une page spécifique est demandée.
    $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));// Cette fonction nettoie une entrée provenant de l'utilisateur (via l'URL) et divise cette entrée en plusieurs parties
    $page = $url[0];//$page est assignée à la première valeur ici l'index 0
}

switch($page){
    case "accueil" : $mainController->accueil();
    break;
    case "page1" : $mainController->page1();
    break;
    case "page2" : $mainController->page2();
    break;
    case "page3" : $mainController->page3();
    break;
    default : throw new Exception("La page demandée n'existe pas"); //Cette exception sert à envoyer un message si l'utilisateur demande une page qui n'existe pas 
}
}catch(Exception $e){
    $mainController->pageErreur($e->getMessage());
}
?>