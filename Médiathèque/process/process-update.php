<?php
var_dump($_POST);
var_dump($_GET);

include "../app/ConnexionPDO.php";
session_start();
$id = $_SESSION['id'];
$name = $_POST['name'];
$time = $_POST['time'];
$description = $_POST['description'];
$director = $_POST['director'];
$category = $_POST['category'];
$image = $_FILES['image']["name"];

if(empty($name) OR empty ($time) OR empty ($description) OR empty ($director) OR empty($category) OR empty ($image)) {
    header('location: ../update.php');
} else {
    $req = $bdd->prepare("UPDATE movies SET name = ?, time = ?, descriptions = ?, director = ?, category = ?, image = ? WHERE id = '$id'");
    $req->execute(array($name, $time, $description, $director, $category, $image));
    $_SESSION['message']='Modification du film effectué avec succès';
    header('location: ../admin.php');

}
?>