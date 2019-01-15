<!DOCTYPE html>
<html>
    <head>
        <title>Add</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    </head>
    
    <body>
                <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Ajouter un film</h1>
      </div>
    </header> 
        
         <div class="container admin">
            <div class="row">
                <br>
                <form class="form" action="process/process-insert.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" >
                    </div>
                    <div class="form-group">
                        <label for="price">Durée</label>
                        <input type="time" class="form-control" id="time" name="time" placeholder="Durée" >
                    </div>                    
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="name">Réalisateur:</label>
                        <input type="text" class="form-control" id="director" name="director" placeholder="Réalisateur">
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
                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';
                           }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Sélectionner une image:</label>
                        <input type="file" id="image" name="image"> 
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="admin.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                   </div>
                </form>
            </div>
        </div>   
    </body>
</html>