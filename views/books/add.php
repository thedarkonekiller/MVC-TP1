<?php 
    session_start();
    $pageTitle = "Ajout d'un livre";
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/header.php'); 
?>

<h1 class="text-center mb-5">Ajout d'un livre à notre bibliothèque&nbsp;:</h1>

<form method="POST" action="index.php?controller=book&action=sendAdd" class="mx-auto d-flex flex-columns justify-content-center">
    <input type="text" name="titre" placeholder="Nom de votre livre" class="form-control mb-3">
    <textarea name="description" placeholder="Courte description de votre livre" class="form-control mb-3"></textarea>
    <input type="number" name="prix" placeholder="Prix du livre" class="form-control mb-3">
    <input type="submit" value="Envoyer" class="form-control btn bg-primary">
</form>


<?php require_once($_SERVER['DOCUMENT_ROOT'].'/views/footer.php'); ?>