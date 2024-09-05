<?php

abstract class Model{
    private static $pdo; //Création d'une classe privée et statique

    private static function setBdd() // Connexion à la base données avec la méthode PDO
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=ma_bdd;charset=utf8", "root", "");//Paramètres de connexion à la base de données 
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//Définit un attribut pour le mode d'erreur et sa gestion qui affichera un message en cas d'erreur
        // mais qui n'interromprera pas l'execution du script
    }

    protected function getBdd(){ // Cette fonction va permettre de retourner l'attribut pdo
        if (self::$pdo === null){ //Vérfie si self de $pdo est égal à null
            self::setBdd(); // Va remplir nôtre attribut statique
        }
        return self::$pdo; // Retourne l'objet PDO (la connexion à la base de données) stocké dans self::$pdo
    }
}
