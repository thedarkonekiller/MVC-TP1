<?php 
    $pageTitle = "Notre Utilisateurs";
?>

<h1>Utilisateurs de notre site&nbsp;:</h1>

<table border=1>
        <thead>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Mot de Pass</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
            <?php foreach($users as $user){ ?>
                <tr>
                    <td><?= $user["lastName"]; ?></td>
                    <td><?= $user["firstName"]; ?></td>
                    <td><?= $user["email"]; ?></td>
                    <td><?= $user["password"]; ?></td>
                    <td>
                        <form method="POST" action="/user/update">
                            <input type="hidden" value="<?= $user["id"]; ?>" name="updateID">
                            <input type="submit" value="📝">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="/user/delete">
                            <input type="hidden" value="<?= $user["id"]; ?>" name="deleteID">
                            <input type="submit" value="🗑️">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- 
        Le chemin du lien ci dessous n'est plus valide (puisque l'on se
        base sur l'index) : à vous de le mettre à jour en prenant en compte
        le controlleur et l'action adéquate.
    -->
    <p><a href="/user/add" title="Ajouter un utilisateur">Ajouter un utilisateur</a></p>