<?php


require_once('./models/bookModel.php');


function showAll()
{
    $results = getAll();
    require_once('./views/books/all.php');
}


function showUpdateForm()
{
    if ($_SESSION && $_SESSION["user"]["role"] === "ADMIN") {
        // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
        if ($_POST && isset($_POST["updateID"])) {
            // Stocke l'ID du livre à update dans une variable
            $book = FindById($_POST['updateID']);
            require_once('./views/books/update.php');
            // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
            // ou bien qu'il ne contient pas un champ "updateID" renseigné.
        } else {
            header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/views/error.php');
        } 
    } else {
        // On affiche une page erreur "pas admin"
        header('Location: /notadmin');
        
    }
    }

function sendUpdate()
{
    // Traitement du formulaire de modification //

    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "submitted".
    if ($_POST && isset($_POST["submitted"])) {

        // On devrait logiquement contrôler l'intégrité des données mais... (ce sera à vous de le faire).
        $titre = htmlentities($_POST["titre"]);
        $desc = htmlentities($_POST["description"]);
        $prix = $_POST["prix"];
        $id = $_POST["bookID"];

        update($titre, $desc, $prix, $id);
    }
}

function showAddForm()
{
    if ($_SESSION && $_SESSION["user"]["role"] === "ADMIN") {
        require_once('./views/books/add.php');
    } else {
        // On affiche une page erreur "pas admin"
            header('Location: /notadmin');

    }
}

function sendAdd()
{


    // Initialisation d'un tableau d'erreurs (vide)
    $errors = [];

    // Si le formulaire a été transmis
    if ($_POST) {

        // Pour chaque champ du formulaire
        foreach ($_POST as $field => $value) {

            // Si le champ est vide (y compris si il ne contient que des espaces)
            if (empty(trim($value))) {
                $errors[$field] = $field . " non renseigné(e)"; // Stocke l'erreur dans un tableau d'erreurs
            } else {

                /* if(...) / else {
                    On pourrait procéder à une vérification approfondie.
                    Ex : le nombre de caractères contenus dans le titre, de la description,
                    le type de données (si il s'agit bien de texte ou de chiffres, etc.)
                }*/
            }
        } // end foreach

        // Si le tableau d'erreurs contient autant d'éléments que le nombre de champs transmis via POST :
        if (sizeof($errors) === sizeof($_POST)) { ?>
            <h2>L'ensemble des champs comportent une ou plusieurs erreur(s).</h2>
            <?php }

        // Le cas contraire...
        else {
            // On regarde si le tableau des erreurs contient quelque chose
            // Si c'est le cas, on affiche chaque erreur à l'utilisateur 
            if ($errors) { ?>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= $error; ?></li>
                    <?php } // endforeach 
                    ?>
                </ul>
<?php } // endif

            // Si le tableau d'erreurs est vide, alors cela signifie que le formulaire a été correctement rempli
            else {
                // Uniquement dans ce cas, il est possible de procéder à l'ajout en base de données.

                // Stockage des données issues du formulaire sous forme de variables individuelles 
                $titre = htmlentities($_POST["titre"]);
                $desc = htmlentities($_POST["description"]);
                $prix = $_POST["prix"];
                // Pour rappel : htmlentites permet aux phrases qui contiennent des apostrophes de tout de même être enregistrées.
                add($titre, $desc, $prix);
            }
        }
    }
}

function sendDelete()
{
    if ($_SESSION && $_SESSION["user"]["role"] === "ADMIN") {

        // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
        if ($_POST && $_POST["deleteID"]) {
    
            // Stocke l'ID du livre à supprimer dans une variable
            $bookID = $_POST["deleteID"];
            deleteBook($bookID);
        } else {
            header('Location: index.php?controller=book&action=error');
        }
    
        // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
        // ou bien qu'il ne contient pas un champ "deleteID" renseigné.
        
    } else {
        // On affiche une page erreur "pas admin"
            header('Location: /notadmin');

    }
}

