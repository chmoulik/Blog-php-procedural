<?php

$title = 'Commentaire';

include_once('inc/bdd_new_pdo.php');
include_once('./inc/head.inc.php');
include_once('./inc/fonction.php');

//Vérification que post est bien cré.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //verification que les champs sont bien remplie.
    if (!isset($_POST['commentaire']) || empty($_POST['commentaire'])) {
        $_SESSION['message'] .= 'Laisser un commentaire';
    } else {
        //assigne le commentaire, si pas de message d'erreur.
        $commentaire = $_POST['commentaire'];

        // Assigne l'ID de l'article.
        $article_id = $_SESSION['idArticle'];
        // Assigne l'id du user connecté.
        $id_user_commentaire = $_SESSION['login']['id'];


        // Insertion en reliant l'article = $article_id, et l'id du commentaire = $id_user_commentaire et le commentaire = ?.
        $insertCommentaire = "INSERT INTO commentaire(article_id, id_user_commentaire, commentaire) VALUES ($article_id, $id_user_commentaire,?)";
        $prepar = $bdd->prepare($insertCommentaire);
        $execute = $prepar->execute([$commentaire]);

        //Affiche un message si la reqete s'est bien passé ou pas.
        if ($execute) {
            'Votre commentaire a bien été ajouté';
        } else {
            echo "Votre commentaire n'a pu être ajouté";
        }
    }
}

//changement du nom de variable pour plus de clarté après.
$article_id_requette = $_SESSION['idArticle'];

//afficher le/les commentaire/s... lié à un article precie par l'id du commentaire = id_user_commentaire et l'id de l'article = $article_id_requette.
$requetteCommentaire =  "SELECT commentaire.date_commentaire, commentaire.commentaire, utilisateur.login, utilisateur.lastName
FROM commentaire
JOIN utilisateur ON commentaire.id_user_commentaire = utilisateur.id
WHERE commentaire.article_id = $article_id_requette";


$prepare = $bdd->prepare($requetteCommentaire);
$execute = $prepare->execute([]);
$afficheCommentaire = $prepare->fetchAll(PDO::FETCH_ASSOC);


?>


<!--scripte de l'éditeur de texte avec API TinyMCE lié au formulaire des commentaire-->
<script class="commentaire">
    tinymce.init({
        selector: '#commentaire',
        plugins: 'advlist autolink lists link image charmap print preview hr anchor',
        toolbar_mode: 'floating',
        height: 200, // Hauteur de l'éditeur
        menubar: false // Masquer la barre de menu
    });
</script>
<?php

//Affiche si il y'a un messages d'erreurs.
$erreur = $_SESSION['message'] ?? '';
echo '<p class="messageErreur">' . $erreur . '</p>';
$_SESSION['message'] = '';


?><!-- formulaire de commentaires.-->
<form <?= commentaireConnecteOuAdmin() ?> action="" method="post" class="formCommentaire">
    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Laisser un commentaire"></textarea><br>
    <input type="submit" value="Envoyer" class="boutonEnvoyer"><br>
</form>


<?php

echo "<h3>" . 'Commentaire' . "</h3>";


// affiche à la fin du commentaire, la date de publication, le prénom avec une majuscule au début ainsi que l'initiale de nom.
foreach ($afficheCommentaire as $resultat) {
    $nom = ucfirst($resultat['lastName'][0]);
    $prenom = ucfirst($resultat['login']);

    echo
    "<div class='divCommentaire'>
    <p>" . $nom . '.' . ' ' . $prenom . " " . "</p> 
    <p>" . $resultat['date_commentaire'] . "</p>
    </div>";

    //Affiche le/les commentaires.
    echo "<p>" . $resultat['commentaire'] . "</p>";
    echo "--------------------------------";
}
