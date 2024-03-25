<?php

$title = 'Iscription';


include_once('inc/bdd_new_pdo.php');

//vérification que post est bien crée
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //verification que les champs sont bien remplie.
    if (!isset($_POST['login']) || empty($_POST['login']) || !preg_match("/^[a-zA-Z0-9-']*$/", $_POST['login'])) {
        $_SESSION['message'] .= 'Veuillez remplir votre identifiant en majuscule ou minuscule, un/des chiffres et sans espace<br>';
    }
    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $_SESSION['message'] .= 'Veuillez remplir votre mot de passe <br>';
    }
    if (!isset($_POST['mail']) || empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL)) {
        $_SESSION['message'] .= 'Veuillez remplir un e-mail valide<br>';
    }
    if (!isset($_POST['lastName']) || empty($_POST['lastName']) || !preg_match("/^[a-zA-Z-']\s*$/", $_POST['lastName'])) {
        $_SESSION['message'] .= 'Veuillez remplir votre nom (éspace possible)<br>';
    }
    if (!isset($_POST['firstName']) || empty($_POST['firstName']) || !preg_match("/^[a-zA-Z-']*$/", $_POST['firstName'])) {
        $_SESSION['message'] .= 'Veuillez remplir votre prénom <br>';
    } else {
        // vérification les données du formulaire sont bien complétés
        $login = strtolower(htmlspecialchars($_POST['login']));
        $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
        $mail = strtolower(htmlspecialchars($_POST['mail']));
        $lastName = strtolower(htmlspecialchars($_POST['lastName']));
        $firstName = strtolower(htmlspecialchars($_POST['firstName']));

        //requete d'insertion 
        $request = "INSERT INTO utilisateur(login, password, mail, lastName, firstName) VALUES (?,?,?,?,?)";

        //preparation et execution de la requete
        $prepare = $bdd->prepare($request);
        $execute = $prepare->execute([$login, $password, $mail, $lastName, $firstName]);

        // if(le mail existe déjà){
        //    echo "ce mail existe deja";
        // }

        //verificatiton de succè de l'insertion
        if ($execute) {
            echo 'Bravo, tu as réussi à te connecter à la base de données MySQL.';
            header('location: connexion.php');
            exit();
        } else {
            echo 'pas réussi';
        }
    }
}


?>



<?php
include_once('inc/head.inc.php');
include_once('./inc/bar_navigation.php');

// ?? = opérateur de fusion de null (null coalescing operator) : 
#cette ligne de code vérifie si la clé 'message' est définie dans le tableau $_SESSION. Si la clé est définie, elle récupère la valeur associée ; sinon, elle renvoie une chaîne vide.
$erreur = $_SESSION['message'] ?? '';
echo '<p class="messageErreur">' . $erreur . '</p>';

// pour éviter qu'il affiche plusieurs fois l'ensemble des messages, il faut que le message soit = vide.
$_SESSION['message'] = '';


?>

<div <?php if (isConnctee()) echo 'hidden' ?>>

    <h1 class="titreEnregistrement">Inscription sur le blog des programmeurs</h1>

    <form action="" method="post" class="center-form">

        <input type="text" name="login" id="login" placeholder="Identifiant" class="input">
        <label for="login" class="label">Identifiant</label><br>

        <input type="password" name="password" id="password" placeholder="Mot de passe" class="input">
        <label for="password" class="label">Mot de passe</label><br>

        <input type="email" name="mail" id="mail" placeholder="E-mail" class="input">
        <label for="mail" class="label">E-mail</label><br>

        <input type="text" name="lastName" id="lastName" placeholder="Nom" class="input">
        <label for="lastName" class="label">Nom</label><br>

        <input type="text" name="firstName" id="firstName" placeholder="Prénom" class="input">
        <label for="firstName" class="label">Prénom</label><br>

        <input class="boutonConnexion" type="submit" value="Inscription">
        <a href="./connexion.php"><button type="button" id="boutonConnexion">Connexion</button></a>

    </form>
</div>
<?php
include_once('inc/footer.inc.php');
