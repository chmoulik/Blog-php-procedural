<?php

include_once('./inc/bdd_new_pdo.php');
include_once('inc/deconnexion.php');
include_once('inc/fonction.php');
include_once('inc/head.inc.php');
include_once('./inc/bar_navigation.php');



//veriffie si la session est connectée sinon il renvoie à la connexion.
if (!$_SESSION['login']) {
    header("location: connexion.php");
}
if (!isAdmin()) {
    header('location: accueil.php');
}
// asigne l'id de la table utilisateur dans la variable
$idUser = $_SESSION['login']['id'];


//asigne les informations du POST en s'assurant de la sécurité et les erreurs liées à la casse. 
//Le isset évite une erreur de variable inconnu dès le début de la navigation.
if (isset($_POST['titre']) && isset($_POST['article']) && !empty($_POST['image'])) {


    // DEBUGER : le htmlspecialchars affiche les balise dans titre/l'article
    $titre = strtolower($_POST['titre']);
    $article = strtolower($_POST['article']);
    $image = $_POST['image'];

    // Requête pour insérer un nouvel article dans la base de données.
    $insererBolg = "INSERT INTO `articles` (`titre`, `article`, `image`, `id_user`) VALUES (?,?,?,?)";

    $prepar = $bdd->prepare($insererBolg);
    $execut = $prepar->execute([$titre, $article, $image, $idUser]);
    header("location: article.php");
    exit;
}


?>

<form class="ajoutFichier" method="$_FILES">
</form>

<!--scripte de l'éditeur de texte avec API TinyMCE lié au formulaire des bloger-->
<script>
    tinymce.init({
        selector: '#article',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor',
        toolbar_mode: 'floating',
        height: 400, // Hauteur de l'éditeur
        menubar: false // Masquer la barre de menu
    });
</script>



<h1 class="titreEnregistrement">Blog des programmeurs</h1>

<!-- Formulaire permettant aux bloger de soumettre leurs articles au blog -->
<form action="" method="post" class="center-form">
    <input type="text" name="titre" id="titre" placeholder="Titre">
    <label for="titre"></label><br>
    <textarea name="article" id="article" placeholder="Article" cols="50" rows="20"></textarea><br>
    <input type="file" name="image" id="image"><br>
    <input class="boutonEnvoyer" type="submit" value="Sauvgarder">
</form>
<?php

// inclue le footer
include_once('inc/footer.inc.php');
