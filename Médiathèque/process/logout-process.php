<?php
session_start();
session_unset();
session_destroy();
setcookie('mail', $donnee['mail'], time()-1, '/');

$_SESSION['message']='Deconnexion effectue avec succes';
header('location: ../index.php');
?>
