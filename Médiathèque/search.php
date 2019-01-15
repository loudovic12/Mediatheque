<!DOCTYPE html>
<html>
  <head>
    <title>Search</title>

      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      
    <link rel="stylesheet" href="resources/all.css"/>
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
        <h1>Rechercher</h1>
      </div>
    </header> 
      
      <section>
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                        <form class="card card-sm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" role="form" method="get" enctype="multipart/form-data">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" name="search" id="search" placeholder="Search">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</section>

<?php 
include "app/connexionPDO.php";
if(empty($_GET['search'])) { // Affiche tous les film s'il n'y a pas de recherche
    $test = TRUE;
      $a = $bdd->query('SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id ORDER BY movies.id DESC');
      $b = $a -> fetchAll();
 
 }  elseif(isset($_GET['search'])) {
        $test = TRUE;
        $search = $_GET['search'];
        $query = $bdd->prepare("SELECT movies.id, movies.name, movies.time, movies.descriptions, movies.director, movies.image,  categories.name AS category FROM movies INNER JOIN categories ON movies.category = categories.id WHERE movies.name LIKE '%" . $search . "%'");
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


<style>
.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
}
</style>
