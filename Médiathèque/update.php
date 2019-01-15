<?php
include('app/connexionPDO.php');
session_start();
if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $_SESSION['id'] = $id;
    $statement = $bdd->prepare("SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id WHERE movies.id = '$id'");
    $statement->execute();
    $result = $statement->fetch(2); ?>
<?php
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        	<link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/style1.css"/>
    </head>
    
    <body>
    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Modifier un film</h1>
      </div>
    </header> 
        
         <div class="container admin">
            <div class="row">
                <br>
                <form class="form" action="process/process-update.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $result['name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Durée</label>
                        <input type="time" class="form-control" id="time" name="time" placeholder="Durée" value="<?php echo $result['time'];?>" >
                    </div>                    
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description"value="<?php echo $result['descriptions'];?>">
                    </div>
                    <div class="form-group">
                        <label for="name">Réalisateur:</label>
                        <input type="text" class="form-control" id="director" name="director" placeholder="Réalisateur" value="<?php echo $result['director'];?>">
                    </div>
                    <div class="form-group">
                        <label for="category">Catégorie:</label>
                        <select class="form-control" id="category" name="category">
                        <?php
                            include "app/connexionPDO.php";

                            $a = $bdd->query('SELECT * FROM categories');
                            $b = $a -> fetchAll();
                         
                            foreach ($b as $row) 
                           {
                                if($row['name'] == $result['category'])
                                {
                                   echo '<option selected="selected" value="'. $row['id'] .'">'. $row['name'] . '</option>'; 
                                    
                                }
                                else{
                                    
                                
                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';
                           }
                            }
                            var_dump($row);
                            var_dump($result);
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <p><?php echo $result['image'];?></p>
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                        <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>