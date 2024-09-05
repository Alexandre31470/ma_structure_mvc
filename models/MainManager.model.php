<?php

require_once("Model.class.php");
class MainManager extends Model{

    public function getDatas(){//Cette fonction permet de récupérer les données de la table matable dans la bdd
        $req = $this->getBdd()->prepare("SELECT * FROM matable"); // Préparation de la requête SQL qui sélectionne toutes les colonnes de la table 'matable'.
        $req->execute(); // Exécution de la requête préparée. Cette ligne exécute la requête SQL sur la base de données.
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        // Récupération de toutes les données renvoyées par la requête. 
        // La méthode fetchAll() retourne un tableau contenant toutes les lignes du résultat.
        // PDO::FETCH_ASSOC permet de récupérer les résultats sous forme de tableau associatif 
        // où les noms des colonnes de la base de données deviennent les clés du tableau.
        
        $req->closeCursor();
        // Fermeture du curseur de la requête. Cela permet de libérer les ressources associées à cette requête 
        // pour pouvoir exécuter d'autres requêtes par la suite.
        
        return $datas;// Retourne le tableau associatif contenant toutes les données de la table.
    }
}
 