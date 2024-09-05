<?php

require_once("models/MainManager.model.php");

class MainController{//Je déclare une classe nommée MainController
    private $mainManager;

    public function __construct(){
    $this->mainManager = new MainManager();
    }

    private function genererPage($data){//Création d'un function genererPage avec $data en paramètre 
        extract($data);//Extract permet de récupérer les données d'un tableau pour les mettre dans des variables
        ob_start();
        require_once($view);//On récupère la vue correspondante dans "view" en la définissant au préalable
        $page_content = ob_get_clean(); // Variable locale $page_content qui gère le contenu affiche dans le body de la page en déversant le contenu du buffer
        require_once($template); //Appel du fichier template.php
    }

    public function accueil(){//Je définis une méthode publique accueil
        $data_page = [
            "page_description" => "Description de la page d'accueil", // Variable locale $page_description qui gère la Méta Description
            "page_title" => "Titre de la page d'accueil", // Variable locale $page_title quigère le title ( onglet du navigateur )
            "page_css" => ["accueil.css"],//Variable permettant d'utiliser un fichier css personnalisé dans le fichier accueil.css
            "view" => "views/accueil.view.php",// Définition de la view qui va afficher
            "template" => "views/common/template.php"//Définition du template utilisé
        ];
        $this->genererPage($data_page);//Appel de la function genererPage qui contient la variable $data_page qui contient un tableau de données 

    }
    public function page1(){
        $datas = $this->mainManager->getDatas();

        $_SESSION['alert']=[
            "message"=> "Exemple de message d'alerte Succès !!",
            "type" => "alert-success"
        ];

        $data_page = [
            "page_description" => "Description de la page 1", // Variable locale $page_description qui gère la Méta Description
            "page_title" => "Titre de la page 1", // Variable locale $page_title quigère le title ( onglet du navigateur )
            "datas"=>$datas,
            "page_css" => ["page1.css"],//Variable permettant d'utiliser un fichier css personnalisé dans le fichier page1.css
            "view" => "views/page1.view.php", // Définition de la view qui va afficher
            "template" => "views/common/template.php" //Définition du template utilisé
        ];
        $this->genererPage($data_page);//Appel de la function genererPage qui contient la variable $data_page qui contient un tableau de données 
    }
    public function page2(){
        $_SESSION['alert']=[
            "message"=> "Exemple de message d'alerte Danger  !!",
            "type" => "alert-danger"
        ];
        $data_page = [
            "page_description" => "Description de la page 2", // Variable locale $page_description qui gère la Méta Description
            "page_title" => "Titre de la page 2", // Variable locale $page_title quigère le title ( onglet du navigateur )
            "view" => "views/page2.view.php", // Définition de la view qui va afficher
            "template" => "views/common/template.php"//Définition du template utilisé
        ];
        $this->genererPage($data_page);//Appel de la function genererPage qui contient la variable $data_page qui contient un tableau de données 

        
    }
    public function page3(){
        $data_page = [
            "page_description" => "Description de la page 3", // Variable locale $page_description qui gère la Méta Description
            "page_title" => "Titre de la page 3", // Variable locale $page_title quigère le title ( onglet du navigateur )
            "view" => "views/page3.view.php", // Définition de la view qui va afficher
            "template" => "views/common/template.php"//Définition du template utilisé
        ];
        $this->genererPage($data_page);//Appel de la function genererPage qui contient la variable $data_page qui contient un tableau de données 
    }
    public function pageErreur($msg){//Function pour générer une page d'erreur en cas de demande inapropriée 

        $data_page = [
            "page_description" => "Page de gestion des erreurs", // Variable locale $page_description qui gère la Méta Description
            "page_title" => "Page de gestion des erreur", // Variable locale $page_title quigère le title ( onglet du navigateur )
            "msg" => "$msg",//Pour afficher le messade d'erreur contenur dans la variable $msg
            "view" => "views/erreur.view.php", // Définition de la view qui va afficher
            "template" => "views/common/template.php"//Définition du template utilisé
        ];
        $this->genererPage($data_page); //Appel de la function genererPage qui contient la variable $data_page qui contient un tableau de données 
    }
}
