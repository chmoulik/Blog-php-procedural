<?php


include_once('inc/bdd_new_pdo.php');
include_once('inc/fonction.php');


if (isConnctee() || isAdmin()) {
    header('location: accueil.php');
}


$title = 'connexion';

//verifie si la méthode de l'envoi du formulaire est post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //ça verifie si le login est vide ou, que les input ne match pas avec autre chose que l'laphabet en maj et min ou des chiffres, dans le post login. 
    //(* = recurance des lettres/chiffres. ^ = dudebut, $ = à la fin C.A.D que depuis le debut a la fin qu'il ny ai pas autre chose que le regex qui match par le input)
    if (empty($_POST['login']) || !preg_match("/^[a-zA-Z0-9]*$/", $_POST['login'])) {
        $_SESSION['message'] .= 'Veuillez entrer votre login en majuscule ou minuscule, un/des chiffres et sans espace<br>';
    }
    // verifie le bon format de mail et netoie et supprimant les caractères potentiellement dangereux.
    if (empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL)) {
        $_SESSION['message'] .= 'Veuillez entrer votre mail valide<br>';
    }
    if (empty($_POST['password'])) {
        $_SESSION['message'] .= 'Veuillez entrer votre mot de passe <br>';
    } else {

        // Assigne les valeurs du formulaire POST à des variables après vérification du bon encodage et mise en minuscules pour éviter les erreurs liées à la casse.
        $login = strtolower(htmlspecialchars($_POST['login']));
        $mail = strtolower(htmlspecialchars($_POST['mail']));
        $password = htmlspecialchars($_POST['password']);


        // requette pour chercher tout les login de la table utilisateur
        $request = "SELECT * FROM utilisateur WHERE login = ? ";
        $prepar = $bdd->prepare($request);
        $execut = $prepar->execute([$login]);

        // si la demande d'execution n'a pas fonctioné
        if (!$execut) {
            $_SESSION['message'] .= 'Veuillez réessayer plus tard, un problème de connexion a la bdd est survenu <br>';
        }

        //si il n'y a pas de login corespondant au formaulaire envoyé
        if ($prepar->rowCount() == 0) {
            $_SESSION['message'] .= "Le login n'existe pas <br>";
        }

        // si le login du formulaire de connexion correspond bien au login de la bdd, alors il récupère et indique qu'il récupère sous la forme d'un tableau associatif
        if ($prepar->rowCount() == 1) {
            $user_from_bdd = $prepar->fetch(PDO::FETCH_ASSOC);

            // si le mail du fomulaire est different de celle/s qui est/sont dans la bdd
            if ($mail !== $user_from_bdd['mail']) {
                $_SESSION['message'] .= "Le mail n'est pas bon <br>";
            }

            // veriffication si le mdp du formulaire est identique au mdp haché de la bdd
            $hach_password = $user_from_bdd['password'];
            if (!password_verify($password, $hach_password)) {
                $_SESSION['message'] .= "Le mot de passe n'est pas bon <br>";
            }

            //si pas de message d'erreur, on crée un cookie 
            if (empty($_SESSION['message'])) {
                setcookie("login", $_POST["login"], time() + 3 * 30 * 24 * 60 * 60);

                //On stocke les informations nécessaires dans la session, elle permet de détruire cette session pour la déconnexion
                $_SESSION["login"] = $user_from_bdd;

                // renvois vers le formulaire de blog pour les blogueurs
                header("location: accueil.php");
                exit;
            }
        }
    }
}

include_once('inc/head.inc.php');
include_once('./inc/bar_navigation.php');


// Affiche les messages d'erreur liés aux différentes conditions de validation du formulaire, puis réinitialise la variable de session des messages, pour éviter d'afficher plusieurs fois le même message en même temps.
$erreur = $_SESSION['message'] ?? '';

echo '<p class="messageErreur">' . $erreur . '</p>';
$_SESSION['message'] = '';

?>

<div <?php if (isConnctee()) echo 'hidden' ?>>
    <h1 class="titreConnexion">Connexion sur le blog des programmeurs</h1>
    <!-- le formulaire de connexion-->
    <form action="" method="post" class="center-form" id="form">
        <input type="text" name="login" id="login" class="input" placeholder="Login">
        <label for="login" class="label">Login</label><br>

        <input type="text" name="mail" id="mail" class="input" placeholder="Mail">
        <label for="mail" class="label">Mail</label><br>

        <input type="password" name="password" id="password" class="input" placeholder="Mot de passe">
        <label for="password" class="label">Mot de passe</label><br>

        <input class="boutonInscription" type="submit" value="Connexion">
        <a href="./inscription.php"><button type="button" id="boutonInscription">Inscription</button></a>
    </form>
</div>
<?php
include_once('inc/footer.inc.php');
