<h2>S'Enregistrer</h2>


<form action="index.php?controller=user&action=sendAddUser" method="POST">
        <label for="nom">Votre NOM</label>
        <input type="text" id="nom" placeholder="ex: LUMIER"><br>
        <label for="prenom">Votre Prénom</label>
        <input type="text" id="prenom" placeholder="ex: Marie"><br>
        <label for="email">Votre email</label>
        <input type="email" id="email" placeholder="ex: marie@gmail.com"><br>
        <label for="motdepasse">Votre mot de passe</label>
        <input type="password" id="motdepasse"><br>
        <button type="submit">Submit</button>
    </form>