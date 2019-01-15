<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <title>CineMax</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>

    <!-- Css perso -->
    <link href="resources/index.css" rel="stylesheet">

  </head>

    
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">MÉDIATHÈQUE GEORGES BRASSENS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> 
      </div>
    </nav>
    <!-- Fin Navigation -->
    
        
<?php
session_start();
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    echo '<br>';
}
?>    
    <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3>Inscription</h3>
                    <form method="post" action="process/register-process.php">
                        <div class="form-group">
                           <label>Adresse mail</label>
                         <input type="email" class="form-control" name="mail" placeholder="Entrez votre adresse mail" required>
                        </div>
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="S'inscrire" />
                        </div>
                    </form>
                </div>
                <div class="col-md-6 login-form-2">
                    <div class="login-logo">
                        <img src="image/logo_white.png" alt=""/>
                    </div>
                    <h3>Connexion</h3>
                    <form method="post" action="process/login-process.php">
                        <div class="form-group">
                        <label>Adresse mail</label>
                        <input type="email" class="form-control" name="mail" placeholder="Entrez votre adresse mail" required>
                        </div>
                        <div class="form-group">
                        <label>Mot de passe</label>
                        <input type="password" class="form-control" name="mdp" placeholder="Entrez votre mot de passe" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Se connecter" />
                        </div>
                        <div class="form-group">

                            <a href="#" class="btnForgetPwd" value="Login">Mot de passe oublié?</a>
                      
                    </div>
                    </form>
                </div>
            </div>
        </div>
    
    </body>
</html>