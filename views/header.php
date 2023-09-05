<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/styles/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title><?= $pageTitle; ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="/" title="Retourner à la page d'accueil"><img src="/public/images/logo.svg" alt="Logo du site de la bibliotheque virtuelle"></a>
            <ul>
                <li>
                    <a href="/users" title="">Utilisateurs</a>
                </li>
                <li>
                    <a href="/books" title="">Livres</a>
                </li>
            </ul>
        </nav>
        <ul>
            <li>
                <a href="/signup" title="">S'enregistrer</a>
            </li>
            <li>
                <a href="/signin" title="">Se connecter</a>
            </li>
        </ul>
    </header>
<main>