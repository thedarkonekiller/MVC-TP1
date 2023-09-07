<?php  
if(!isset($_SESSION)){
    session_start();
}
    $pageTitle = "Notre bibliothèque";
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/header.php');
?>

<h1 class="text-center">Les ouvrages de notre bibliothèque&nbsp;:</h1>

<div class="table-responsive w-75 mx-auto">
    <table class="table align-middle table-bordered">
            <thead>
                <th>Titre</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                <?php foreach($results as $book){ 
                ?>
                    <tr>
                        <td><?= $book["name"]; ?></td>
                        <td><?= $book["description"]; ?></td>
                        <td><?= $book["price"]; ?></td>
                        <td>
                            <form method="POST" action="/book/update">
                                <input type="hidden" value="<?= $book["id"]; ?>" name="updateID">
                                <input type="submit" value="📝" class="bg-warning">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="index.php?controller=book&action=sendDelete">
                                <input type="hidden" value="<?= $book["id"]; ?>" name="deleteID">
                                <input type="submit" value="🗑️" class="bg-danger">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <button class="btn bg-primary"><a href="/book/add" title="Ajouter un livre à notre bibliotheque" class="text-white text-decoration-none">Ajouter un livre</a></button>
</div>
