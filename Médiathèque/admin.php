<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Film</title>
	<meta charset="UTF-8">
    
	<!-- Style Début -->
    <?php include "app/styles.php"?>
    <!-- Style Fin -->

	<!-- Perso Style -->

    <link rel="stylesheet" href="resources/all.css"/>
        <link rel="stylesheet" href="resources/styles.css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
</head>
    
    <!-- Menu Début -->
    <?php include "app/header.php"?>
    <!-- Menu Fin -->
<body>

        <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Adminstrateur</h1>
      </div>
    </header>    
        
    <section>
    <div class="col-lg-12 ">
    <a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter un film</a>

    </div>
    </section>
        
          <div class="row">
    <?php 
        include "app/connexionPDO.php";                     
        $a = $bdd->query('SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY movies.id DESC');
        $b = $a -> fetchAll();
        
  
    foreach ($b as $row)  { ?>
             <div class="col-md-4" style="padding-top: 10px;">
              <div class="cellphone-container">    
                  <div class="movie">       
                    <div class="menu"><i class="material-icons"></i></div>
                    <div  class="movie-img"><img height="600px" src="image/<?= $row['image']; ?>" >
                     </div>
                    <div class="text-movie-cont">
                      <div class="mr-grid">
                        <div class="col1">
                          <h1><?= $row['name']; ?></h1>
                          <ul class="movie-gen">
                            <li><?= $row['director']; ?>/</li>
                            <li><?= $row['time']; ?>/</li>
                            <li><?= $row['category']; ?></li>
                          </ul>
                        </div>
                      </div>
                      <div class="mr-grid summary-row">
                        <div class="col2">
                          <h5>Résumé</h5>
                        </div>
                      </div>
                      <div class="mr-grid">
                        <div class="col1">
                          <p class="movie-description"><?= $row['descriptions']; ?></p>
                        </div>
                      </div>
                        <div class="card-body">
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>    
                            <a href="process/process-delete.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <?php } ?>
    </div>

  
</body>

</html>