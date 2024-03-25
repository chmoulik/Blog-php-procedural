<?php

include_once('inc/fonction.php');

// Vérification si la variable 'deconnexion' est définie dans le http
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deconnexion'])) {
        // setcookie("login", $_POST["login"], time() - 3600);
        session_destroy();
        // Redirection vers la page de connexion après la déconnexion
        header("location: connexion.php");
        exit();
    }
}

$title = 'article';
include_once('inc/head.inc.php');


if (isConnctee()) {
    echo    "<form action='' method='post'>
        <input type='submit' value='Déconnexion' name='deconnexion' class='deconnexion'>
    </form>";
}
