<?php
// Récupération de la connexion à la base de données
require_once('./models/dbModel.php');

function getAllUsers()
{

    $pdoConn = dbConnect();

    if ($pdoConn) {
        // Si la connexion à la base de donnée est effective :

        // Stockage de la requête SQL au sein de la variable $query.
        $query = "SELECT * FROM users";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {

            // Si la requête s'est exécutée sans accrocs :
            // Stockage de l'ensemble des résultats de la requête dans la variable $results
            $results = $execution->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return $results;
}

function addUser($lastname, $firstname, $email, $password, $role = 'VISIT')
{

    $pdoConn = dbConnect();

    // Si la connexion à la base de données est effective
    if ($pdoConn) {
        // Stockage de la requête d'ajout au sein de la variable $query.
        $query = "INSERT INTO users (lastname, firstname, email, pwd, role) VALUES ('$lastname', '$firstname', '$email', '$password', '$role')";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête s'est exécutée sans accrocs :
            // Redirection vers la page qui affiche l'ensemble des livres
            header('Location: /users');
        }
    }
}

function FindByIdUser($userID)
{

    $pdoConn = dbconnect();
    // Contrôle de l'état de la connexion à la base de données

    if ($pdoConn) {

        // Stockage de la requête SQL au sein de la variable $query.
        $query = "SELECT * FROM users WHERE id=$userID";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête qui permet de récupérer les informations du livre souhaité s'est exécutée sans accrocs :
            // On stocke les données du livre dans une variable (utilisée ultérieurement pour être affichées dans les champs).
            $user = $execution->fetch(PDO::FETCH_ASSOC);
        }
        // Si la requête a rencontré une erreur lors de son execution
        else {
            header('Location: /error');
        }
    }
    return $user;
}

function updateUser($lastname, $firstname, $email, $password, $role, $id)
{

    $pdoConn = dbconnect();

    // Contrôle de l'état de la connexion à la base de données
    if ($pdoConn) {

        // Stockage de la requête d'ajout au sein de la variable $query.
        $query = "UPDATE users SET lastname='$lastname', firstname='$firstname', email='$email', pwd='$password', role='$role' WHERE id=$id";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // echo 'Location: ../views/books/all.php';
            // Si la requête s'est exécutée sans accrocs :
            // Redirection vers la page qui affiche l'ensemble des livres
            header('Location: /users');
        } else {
            // echo "test nok";
            header('Location: /error');
        }
    } // Fin du contrôle de la connexion à PDO 
}
function deleteUser($userID)
{

    $pdoConn = dbconnect();

    // Contrôle de l'état de la connexion à la base de données
    if ($pdoConn) {


        // Stockage de la requête SQL au sein de la variable $query.
        $query = "DELETE FROM users WHERE id=$userID";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête de suppression s'est exécutée sans accrocs :
            // Redirection vers la page sur laquelle figurent l'ensemble des livres
            header('Location: /users');
        }
        // Si la requête a rencontré une erreur lors de son execution
        else {
            header('Location: /error');
        }
    } // Fin du contrôle de la connexion à PDO
}

function login($email) {
    
    $pdoConn = dbconnect();

    // Contrôle de l'état de la connexion à la base de données
    if ($pdoConn) {
        $requser = "SELECT * FROM users WHERE email = '$email'";
        $execuser = $pdoConn->query($requser);
        if ($execuser != FALSE) {
            $user = $execuser->fetch(PDO::FETCH_ASSOC);
            return $user;
}
}
}