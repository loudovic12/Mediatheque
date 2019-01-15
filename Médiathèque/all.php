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
        <h1>Film</h1>
      </div>
    </header> 
    
  <section>
  <div class="container">
    <div class="row">
    <div class="col-lg-6 ">
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="form-check">
          <input class="form-check-input" type="radio" name="tri" value="genre" checked>
          <label class="form-check-label" for="exampleRadios1">
            Catégorie
          </label>
          </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="tri" value="titre" checked>
          <label class="form-check-label" for="exampleRadios1">
            Titre
          </label>
          </div>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="tri" value="reset" checked>
          <label class="form-check-label" for="exampleRadios1">
            Reset
          </label>
          </div>
          <button class="btn btn-primary" type="submit">Trier</button>
      </form>
    </div>
    
    <div class="col-lg-6 ">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="category">Catégorie:</label>
                <div class="col-md-2">
                    <select class="form-control" name="categories" id="category">
                        <div class="col-md-2">
                            <?php
                            include "app/connexionPDO.php";

                            $a = $bdd->query('SELECT * FROM categories');
                            $b = $a -> fetchAll();

                            foreach ($b as $row)
                            {
                                echo '<option value="'. $row['id'] .'">'. $row['name'] . '</option>';
                            }
                            ?>
                        </div>
                    </select>
                </div>
        </div>
                <button class="btn btn-primary" type="submit">Trier</button>
        </form>
    </div>
      </div>
    </div>
    </section>

     
    <?php 
    include "app/connexionPDO.php";
     if(empty($_POST['tri']) AND empty($_POST['categories'])) {
        $test = TRUE;
          $a = $bdd->query('SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY movies.id DESC');
          $b = $a -> fetchAll();

     }  elseif(isset($_POST['tri'])) {
        if($_POST['tri'] == 'titre') {
            $test = TRUE;
            $query = $bdd->prepare("SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY name");
            $query->execute();
            $b = $query->fetchAll(2);
        } elseif($_POST['tri'] == 'genre'){
            $test = TRUE;
            $query = $bdd->prepare("SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY categories.name");
            $query->execute();
            $b = $query->fetchAll(2);
        } elseif($_POST['tri'] == 'reset') {
            $test = TRUE;
          $a = $bdd->query('SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY movies.id DESC');
          $b = $a -> fetchAll();
        }
        }
    elseif(isset($_POST['categories'])) {
    $tricategorie = $_POST['categories'];
    $query = $bdd->prepare("SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id WHERE categories.id = '$tricategorie'");
    $query->execute();
    $b = $query->fetchAll(2); 
    }
    ?>   
    

    <div class="row">
    <?php 
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
                    </div>
                </div>
            </div>
          </div>
          <?php } ?>
    </div>

  
</body>

</html>
