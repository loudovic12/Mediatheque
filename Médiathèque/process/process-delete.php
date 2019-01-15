<?php
session_start();
include('../app/connexionPDO.php');
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $statement = $bdd->prepare("DELETE FROM movies WHERE id = ?");
    $statement->execute(array($id));
    $_SESSION['message']='Suppression effectué avec succès';
    header("Location: ../admin.php");
}

?>
