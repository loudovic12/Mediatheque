<?php
     
include "../app/connexionPDO.php";
$name = $_POST['name'];
$time = $_POST['time'];
$description = $_POST['description'];
$director = $_POST['director'];
$category = $_POST['category'];
$image = $_FILES['image']["name"];

if(empty($_POST['name']) OR empty ($_POST['time']) OR empty ($_POST['description']) OR empty ($_POST['director']) OR empty($_POST['category']) OR empty ($_FILES["image"]["tmp_name"])) {
    header('location: ../insert.php');
}
else {
    $req = $bdd->prepare('INSERT INTO movies VALUES(:id,:name,:time,:description,:director,:category, :image)');
    $req->execute(array(  'id'=> NULL,'name'=> $name , 'time' => $time, 'description'=> $description, 'director'=> $director, 'category'=> $category, 'image'=> $image));
    header('location: ../admin.php'); }


?>