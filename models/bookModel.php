<?php
// Récupération de la connexion à la base de données
require_once($_SERVER['DOCUMENT_ROOT'] . '/models/dbModel.php');

function getAll()
{

    $pdoConn = dbConnect();

    if ($pdoConn) {
        // Si la connexion à la base de donnée est effective :

        // Stockage de la requête SQL au sein de la variable $query.
        $query = "SELECT * FROM books";

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

function add($titre, $desc, $prix)
{

    $pdoConn = dbConnect();

    // Si la connexion à la base de données est effective
    if ($pdoConn) {
        // Stockage de la requête d'ajout au sein de la variable $query.
        $query = "INSERT INTO books (name, description, price) VALUES ('$titre', '$desc', $prix)";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête s'est exécutée sans accrocs :
            // Redirection vers la page qui affiche l'ensemble des livres
            header('Location: index.php?controller=book&action=showAll');
        }
    }
}

function FindById($bookID)
{

    $pdoConn = dbconnect();
    // Contrôle de l'état de la connexion à la base de données

    if ($pdoConn) {

        // Stockage de la requête SQL au sein de la variable $query.
        $query = "SELECT * FROM books WHERE id=$bookID";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête qui permet de récupérer les informations du livre souhaité s'est exécutée sans accrocs :
            // On stocke les données du livre dans une variable (utilisée ultérieurement pour être affichées dans les champs).
            $book = $execution->fetch(PDO::FETCH_ASSOC);
        }
        // Si la requête a rencontré une erreur lors de son execution
        else {
            header('Location: index.php?controller=book&action=error');
        }
    }
    return $book;
}

function update($titre, $desc, $prix, $id)
{

    $pdoConn = dbconnect();

    // Contrôle de l'état de la connexion à la base de données
    if ($pdoConn) {

        // Stockage de la requête d'ajout au sein de la variable $query.
        $query = "UPDATE books SET name='$titre', description='$desc', price=$prix WHERE id=$id";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // echo 'Location: ../views/books/all.php';
            // Si la requête s'est exécutée sans accrocs :
            // Redirection vers la page qui affiche l'ensemble des livres
            header('Location: index.php?controller=book&action=showAll');
        } else {
            // echo "test nok";
            header('Location: index.php?controller=book&action=error');
        }
    } // Fin du contrôle de la connexion à PDO 
}
function deleteBook($bookID)
{

    $pdoConn = dbconnect();

    // Contrôle de l'état de la connexion à la base de données
    if ($pdoConn) {


        // Stockage de la requête SQL au sein de la variable $query.
        $query = "DELETE FROM books WHERE id=$bookID";

        // Execution de la requête sur la base de données.
        // Stockage du résultat de l'exécution dans la variable $execution.
        $execution = $pdoConn->query($query);

        if ($execution) {
            // Si la requête de suppression s'est exécutée sans accrocs :
            // Redirection vers la page sur laquelle figurent l'ensemble des livres
            header('Location: index.php?controller=book&action=showAll');
        }
        // Si la requête a rencontré une erreur lors de son execution
        else {
            header('Location: index.php?controller=book&action=error');
        }
    } // Fin du contrôle de la connexion à PDO
}
