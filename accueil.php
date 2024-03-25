<?php


include_once('inc/bdd_new_pdo.php');
include_once('inc/deconnexion.php');
include_once('inc/fonction.php');
include_once('./inc/head.inc.php');
include_once('./inc/bar_navigation.php');


// jointure de l'auteur de l'article, et affiche date et heure de l'article.
$afficheArticleIdUser = "SELECT id_article, articles.titre, articles.article, articles.image, articles.date_publication, utilisateur.login, utilisateur.lastName FROM utilisateur JOIN articles ON utilisateur.id = articles.id_user";

$prepar = $bdd->prepare($afficheArticleIdUser);
$execut = $prepar->execute([]);
$resultats = $prepar->fetchAll(PDO::FETCH_ASSOC);

echo "<h2 class='titreEnregistrement'>Blog des programmeurs</h2>";
echo '<div class="articlesAccueil">';


// parcourir le tableau de la requete // parcourir le tableau de la requête. 
foreach ($resultats as $resultat) {
    echo '<div class="articleAccueil">';
    echo "<h2>" . $resultat['titre'] . "</h2>";
    // affiche i'image de l'article.
    echo "<img src='./assets/images/$resultat[image]' alt=''> ";

    // si l'article est plus long que 400 on affiche qu'une partie du contenu.
    if (strlen($resultat['article']) > 399) {
        $articleDebut = substr($resultat['article'], 0, 400); {
            echo  "$articleDebut... <br>";
        }
    } else {
        echo "<p>" . $resultat['article'] . "</p>";
    }

    // Lien pour être dirigé vers l'article choisi pour continuer à lire.
    echo "<a class='continuer_a_lire' href=articleEntier.php?id_de_l'article=$resultat[id_article]>Continer à lire </a>";


    // afficher en majuscule la première lettre du prénom.
    $majusculePrenom = ucfirst($resultat['login']);

    // afficher en majuscule la première lettre du nom de famille.
    $nom = ucfirst($resultat['lastName'][0]);

    // affiche la date de publication, l'initial du nom et tout le prénom. 
    echo  "<p class='publicationDate'>" . 'Publié le ' . $resultat["date_publication"] . ' par ' . $nom . '. ' . $majusculePrenom  . "</p>";
    echo '</div>';
}
echo '</div>';
