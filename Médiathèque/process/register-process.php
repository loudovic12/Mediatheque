<?php

include "../app/connexionPDO.php";
session_start();
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];


if(empty($_POST['mail']) OR empty($_POST['mdp'])) {
    $_SESSION['message']='Erreur de champ';
    header('location: ../index.php');
}
else {
    $req = $bdd->prepare('INSERT INTO connexion VALUES(:id,:mail,:mdp)');
    $req->execute(array( 'id'=> NULL, 'mail'=> $mail , 'mdp' => $mdp));
    $_SESSION['message']='Inscription effectue avec succes';
    header('location: ../index.php'); }
?>
