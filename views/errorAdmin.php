<?php 
if(!isset($_SESSION)){
    session_start();
}
    $pageTitle = "Une erreur s'est produite";
    require_once($_SERVER['DOCUMENT_ROOT'].'/views/header.php');
?>

<h1>Oups&nbsp;! On dirait bien que tu n'es pas admin.</h1>