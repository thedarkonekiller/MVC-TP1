<?php  
if(!isset($_SESSION)){
    session_start();
}
    $pageTitle = "Modifier un livre";
?>
<!-- Si la requête a retourné un résultat (on affiche le formulaire d'édition avec les données pré-renseignées)-->
<h1 class="text-center mb-5">Modification du livre intitulé <?= $book["name"] ?>&nbsp;:</h1>

<form action="index.php?controller=book&action=sendUpdate" method="POST" class="mt-7 mx-auto d-flex flex-columns justify-content-center">
    <input type="text" name="titre" placeholder="Nom de votre livre" value="<?= $book["name"] ?>" class="form-control mb-3">
    <textarea name="description" placeholder="Courte description de votre livre" class="form-control mb-3"><?= $book["description"] ?></textarea>
    <input type="number" name="prix" placeholder="Prix du livre" value="<?= $book["price"] ?>" class="form-control mb-3">
    <input type="hidden" value="<?= $book["id"]; ?>" name="bookID">
    <input type="submit" value="Envoyer" name="submitted" class="form-control btn bg-primary">
</form>

<?php
