<?php



// affiche les supergloble de façon aligné les unes sous les autres.
function affiche_r($variable)
{
    echo "<pre>";
    print_r($variable);
    echo "</pre>";

    return $variable;
}

//Vérifie si un utilisateur est connecté.
function isConnctee()
{
    return isset($_SESSION['login']) && !empty($_SESSION['login']) ? true : false;
}

// Vérifie si l'utilisateur connecté est un administrateur.
function isAdmin()
{
    if (isConnctee() && $_SESSION['login']['admin'] == 1) { {
            return true;
        }
    }
}

// Verifier si il est connecté, alors cacher le formulaire de connexion.
function cacherFormulaireConnexion()
{
    if (isConnctee()) {
        echo 'hidden';
    }
}

// Afficher l'éditeur de texte que si c'est un user connecté ou un admin connecte.
function commentaireConnecteOuAdmin()
{
    if (isConnctee() || isAdmin()) {
        echo '';
    } else {
        echo 'hidden';
    }
}
