<?php
session_start();
if(!isset($_SESSION['kkkkkk22k2k'])){
header("Location: ../login.php");
}
if(empty($_SESSION['kkkkkk22k2k'])){
    header("Location: ../login.php");
 }
require("../config/commandes.php");
$Produits=afficher();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="../"><i class="fas fa-shopping-basket" style="color:red"></i><b> Mini-Market</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" aria-current="page" href="afficher.php">Produits</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="../admin/index.php">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="supprimer.php">Suppression</a>
        </li>
        
      </ul>
     
      
      <a class="btn btn-danger d-flex" style="display: flex; justify-content: flex-end;" href="deconnexion.php">Se deconnecter</a>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="supprimer.php">Supprimer un produit-vetements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="supprimerc.php">Supprimer un produit-cosmetiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="supprimera.php">Supprimer un produit-accessoires</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      	
<form method="post">
  <div class="mb-3">
  <div class="mb-3">
   
    <label for="exampleInputPassword1" class="form-label">Identifiant du produit</label>

    <input type="number" class="form-control" name="idproduit" required>
   
  </div>

  <div class="mb-3">

  
<label for="exampleInputPassword1" class="form-label">Identifiant du categorie</label>

<input type="number" class="form-control" name="idcat" required>
</div>
  <button type="submit" name="valider" class="btn btn-danger">Supprimer le produit</button>
</form>

      </div>


<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
  
        <?php foreach($Produits as $produit): ?> 
        <div class="col">
          <div class="card shadow-sm">
            
            <img src="<?= $produit->image ?>">

            <h3><?= $produit->id ?></h3>

            <div class="card-body">
            
            </div>
          </div>
        </div>
  <?php endforeach; ?>
  </div>

</body>
</html>
<?php

  if(isset($_POST['valider']))
  {
    if(isset($_POST['idproduit']) AND isset($_POST['idcat']))
    {
    if(!empty($_POST['idproduit'])  AND !empty($_POST['idcat']))
	    {
	    	
	    	$idproduit = htmlspecialchars(strip_tags($_POST['idproduit']));
        $idcat = htmlspecialchars(strip_tags($_POST['idcat']));
          
          try 
          {
            supprimer($idproduit);
          }
          catch (Exception $e) 
          {
          	$e->getMessage();
          }

	    }
    }
  }


?>