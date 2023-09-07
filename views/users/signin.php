<?php  
if(!isset($_SESSION)){
    session_start();
}
    $pageTitle = "Login";
?>
<h2>Se Connecter</h2>
<form action="/index.php?controller=user&action=sendLogin" method="post">
<label for="email">Votre email</label>
        <input type="email" name="email" id="email" placeholder="ex: marie@gmail.com"><br>
        <label for="motdepasse">Votre mot de passe</label>
        <input type="password" name="password" id="motdepasse"><br>
        <button name="login" type="submit">se connecter</button>
</form>