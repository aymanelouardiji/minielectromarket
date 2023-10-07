<?php
session_start();
if(!isset($_SESSION['kkkkkk22k2k'])){
header("Location: ../login.php");
}
if(empty($_SESSION['kkkkkk22k2k'])){
    header("Location: ../login.php");
 }
require("../config/commandes.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
          <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/index.php">Nouveau</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="supprimer.php">Suppression</a>
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
        <a class="nav-link " href="afficher.php">Vetements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="font-weight: bold;" aria-current="page"  href="afficherc.php">Cosmetiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="ajoutera.php">Accessoires</a>
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
    <h2>Pour ajouter des produits cosmetiques</h2>
    <label for="exampleInputEmail1" class="form-label">L'image du produit</label>
    <input type="name" class="form-control" name="image" required>

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
    <input type="text" class="form-control" name="nom"  required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prix</label>
    <input type="number" class="form-control" name="prix" required>
  </div>

   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea class="form-control" name="desc" required></textarea>
  </div>

  <button type="submit" name="valid" class="btn btn-success">Ajouter un nouveau produit</button>
</form>
</div></div></div>
<?php 
  if(isset($_POST['valid']))
  {
    if(isset($_POST['image']) AND isset($_POST['nom']) AND isset($_POST['prix']) AND isset($_POST['desc']))
    {
    if(!empty($_POST['image']) AND !empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['desc']))
	    {
	    	$image = htmlspecialchars(strip_tags($_POST['image']));
	    	$nom = htmlspecialchars(strip_tags($_POST['nom']));
	    	$prix = htmlspecialchars(strip_tags($_POST['prix']));
	    	$desc = htmlspecialchars(strip_tags($_POST['desc']));
          
          try 
          {
            ajouterc($image, $nom, $prix, $desc);
          }
          catch (Exception $e) 
          {
          	$e->getMessage();
          }

	    }
    }
  }
?>