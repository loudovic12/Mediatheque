<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Cinemax</title>
	<meta charset="UTF-8">
	<!-- Style Début -->
    <?php include "app/styles.php"?>
    <!-- Style Fin -->
    
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="menu.php">MÉDIATHÈQUE GEORGES BRASSENS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="all.php">Films</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="search.php">Recherche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="process/logout-process.php">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</html>