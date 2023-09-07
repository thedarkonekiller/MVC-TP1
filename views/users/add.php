<?php  
if(!isset($_SESSION)){
    session_start();
}
    $pageTitle = "Ajouter un livre";
?>
<h2>Entrez vos informations</h2>


<form action="/index.php?controller=user&action=sendAddUser" method="POST">
        <label for="nom">Votre NOM</label>
        <input type="text" name="lastName" id="nom" placeholder="ex: LUMIER"><br>
        <label for="prenom">Votre Prénom</label>
        <input type="text" name="firstName" id="prenom" placeholder="ex: Marie"><br>
        <label for="email">Votre email</label>
        <input type="email" name="email" id="email" placeholder="ex: marie@gmail.com"><br>
        <label for="motdepasse">Votre mot de passe</label>
        <input type="password" name="password" id="motdepasse"><br>
        <label for="role">Role</label>
        <select name="role" id="">
        <option value="VISIT">Visiteur</option>
        <option value="USER">Utilisateur</option>
        <option value="ADMIN">Admin</option>
        </select><br>
        <button type="submit">Submit</button>
    </form>