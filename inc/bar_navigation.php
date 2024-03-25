<?php




include_once('./inc/fonction.php');
include_once('./inc/deconnexion.php');

?>

<nav>
    <ul class="barNavigation">
        <li><a class="liNavBar" href="./accueil.php"> Accueil </a></li>
        <?php


        if (!isConnctee() && !isAdmin()) {
            echo '<li><a class="liNavBar" href="./connexion.php"> Connexion </a></li>';
        }

        if (isAdmin()) {
            echo    '<li><a class="liNavBar" href="./article.php"> Article </a></li>';
            echo    '<li><a class="liNavBar" href="./Administration.php"> Administration </a></li>';
        }

        if (isConnctee() || isAdmin()) {
            $nom = ucfirst($_SESSION['login']['login']);
            echo "<li class='afficheLogin'> Bonjour" . "  " . $nom . "</li>";
        }
        ?>
    </ul>
</nav>