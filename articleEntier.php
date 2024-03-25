<?php


include_once('inc/bdd_new_pdo.php');
include_once('inc/deconnexion.php');
include_once('inc/fonction.php');
include_once('inc/head.inc.php');
include_once('inc/bar_navigation.php');

//assigne l'id de l'article cherché de l'URL.
$idArticle = $_GET["id_de_l'article"];

// Assigne dans à la session l'id de l'article cliqué - 'Continer à lire'.
$_SESSION['idArticle'] = $idArticle;

// requette pour afficher le titre et l'article cliqué sur le lien 'Continuer à lire'(accueil).
$afficheArticle = "SELECT `article`, `titre`, `image` FROM `articles` WHERE id_article = $idArticle";

$prepare = $bdd->prepare($afficheArticle);
$execut = $prepare->execute([]);
$resultats = $prepare->fetchAll(PDO::FETCH_ASSOC);


echo '<div class="article">';

// affiche le titre et tout l'article 
echo "<h2>" . $resultats[0]['titre'] . "</h2>";

// affiche l'image.
$nomImage = $resultats[0]['image'];
echo "<img src='./assets/images/$nomImage' alt=''> ";

//Affiche tout l'article.
echo "<p>" . $resultats[0]['article'] . "</p>";



// jointure de l'utilisateur a l'article écrit, et affiche date et heure de l'article.
$afficheArticleIdUser = "SELECT articles.titre, articles.article, articles.date_publication, utilisateur.login, utilisateur.lastName FROM utilisateur JOIN articles ON utilisateur.id = articles.id_user";

$prepare = $bdd->prepare($afficheArticleIdUser);
$execut = $prepare->execute([]);
$resultats = $prepare->fetchAll(PDO::FETCH_ASSOC);


// affiche à la fin de l'article, la date de publication, le prénom avec une majuscule au début ainsi que l'initiale de nom.
$majusculePrenom = ucfirst($resultats[0]['login']);
$nom = ucfirst($resultats[0]['lastName'][0]);
echo  "<p class='publicationPar'>" . 'Publié le ' . $resultats[0]["date_publication"] . ' par ' . $nom . '. ' . $majusculePrenom  . "</p>";


include './commentaire.php';


echo '</div>';
