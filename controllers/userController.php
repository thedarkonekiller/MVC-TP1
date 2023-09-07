<?php


require_once('./models/userModel.php');


function showAllUsers()
{
    $users = getAllUsers();
    require_once('./views/users/all.php');
}


function showUpdateFormUser()
{
    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
    if ($_POST && isset($_POST["updateID"])) {
        // Stocke l'ID du livre à update dans une variable
        $user = FindByIdUser($_POST['updateID']);
        require_once('./views/users/update.php');
        // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
        // ou bien qu'il ne contient pas un champ "updateID" renseigné.
    } else {
        header('Location: /error');
    }
}

function sendUpdateUser()
{
    // Traitement du formulaire de modification //
    var_dump($_POST);
    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "submitted".
    if ($_POST && isset($_POST["submitted"])) {
        var_dump("text");

        // On devrait logiquement contrôler l'intégrité des données mais... (ce sera à vous de le faire).
        $lastname = htmlentities($_POST["lastname"]);
        $firstname = htmlentities($_POST["firstname"]);
        $email = htmlentities($_POST["email"]);
        $password = htmlentities($_POST["pwd"]);
        $role = htmlentities($_POST["role"]);
        $id = $_POST["updateID"];

        updateUser($lastname, $firstname, $email, $password, $role, $id);
    }
  
}


function showAddFormUser()
{
    require_once('./views/users/add.php');
}

function signUp()
{
    require_once('./views/users/signup.php');
}

function signIn()
{
    require_once('./views/users/signin.php');
}

function sendAddUser()
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
var_dump("test");
                // Stockage des données issues du formulaire sous forme de variables individuelles 
                $lastname = htmlentities($_POST["lastName"]);
                $firstname = htmlentities($_POST["firstName"]);
                $email = htmlentities($_POST["email"]);
                $password = htmlentities($_POST["password"]);
                $role = htmlentities($_POST["role"]);
                // Pour rappel : htmlentites permet aux phrases qui contiennent des apostrophes de tout de même être enregistrées.
                addUser($lastname, $firstname, $email, $password, $role);
            }
        }
    }
}

function sendDeleteUser()
{

    // Si l'accès à cette page résulte de la transmission d'un formulaire via POST et qu'il contient un champ non vide dont le name vaut "deleteID".
    if ($_POST && $_POST["deleteID"]) {

        // Stocke l'ID du livre à supprimer dans une variable
        $bookID = $_POST["deleteID"];
        deleteUser($bookID);
    } else {
        header('Location: /error');
    }

    // Si l'accès à la page ne s'est pas faite suite à l'envoi d'un formulaire transmis par méthode POST
    // ou bien qu'il ne contient pas un champ "deleteID" renseigné.
}

