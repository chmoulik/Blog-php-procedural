<?php

//Ces deux lignes sont souvent placées au début d'un script PHP pour spécifier le niveau de rapport d'erreurs et activer l'affichage des erreurs à l'écran.
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();



try {
    //connexion a la bdd
    $bdd = new PDO('mysql:host=localhost; dbname=cours2samir', 'root', 'root');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
}
