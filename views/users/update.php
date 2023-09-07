<!-- Si la requête a retourné un résultat (on affiche le formulaire d'édition avec les données pré-renseignées)-->
<h1 >Modification du utilisateur<?= $user["lastname"] ?>&nbsp;:</h1>

<form action="/index.php?controller=user&action=sendUpdateUser" method="POST" >
    
        <input type="text" name="lastname" value="<?= $user["lastname"] ?>" ><br>
        <label for="prenom">Votre Prénom</label>
        <input type="text" name="firstname" value="<?= $user["firstname"] ?>" ><br>
        <label for="email">Votre email</label>
        <input type="email" name="email" value="<?= $user["email"] ?>" ><br>
        <label for="motdepasse">Votre mot de passe</label>
        <input type="password" name="pwd" value="<?= $user["pwd"] ?>" ><br>
        <label for="role">Role</label>
        <select name="role"  >
        <option value="<?= $user["role"] ?>"></option>
        <option value="VISIT">Visiteur</option>
        <option value="USER">Utilisateur</option>
        <option value="ADMIN">Admin</option>
        </select><br>
        <button type="submit">Submit</button>
</form>

<?php
