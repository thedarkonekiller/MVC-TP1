<?php 
    $pageTitle = "Appli à améliorer selon le design pattern MVC";
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/header.php');

    if($_GET && $_GET['controller']){
        $controller =$_GET['controller'].'Controller';
        require_once('./controllers/'.$controller.'.php');
        
        if($_GET["action"]){
            $action = $_GET["action"];
            $action();
        } else {
            header('Location: /error');
        }
    
    
    }
    else { ?>
        <p>Cliquez <a href="/books">ici</a> pour accéder à notre bibliothèque</p>        
    <?php }
?>


<!-- Correction V1 -->
<!-- Code corrigé pour faciliter l'implémentation d'un MVC procédural -->
