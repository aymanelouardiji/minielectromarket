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
$Cosmetics=afficherc();
$Accessoires=affichera()


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <a class="nav-link active" style="font-weight: bold;" aria-current="page" href="../admin/afficher.php">Produits</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="../admin/">Nouveau</a>
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
          <a class="nav-link " aria-current="page"  href="afficherc.php">Cosmetiques</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" style="font-weight: bold;" href="affichera.php">Accessoires</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>


<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">image</th>
                <th scope="col">nom</th>
                <th scope="col">prix</th>
                <th scope="col">Description</th>
                <th scope="col">Editer</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($Accessoires as $accessoire): ?>
                <tr>
                <th scope="row"><?= $accessoire->id ?></th>
                <td>
                <img src="<?= $accessoire->image ?>" style="width: 15%">
                </td>
                <td><?= $accessoire->nom ?></td>
                <td style="font-weight: bold; color: green;"><?= $accessoire->prix ?>DH</td>
                <td><?= substr($accessoire->description, 0, 100); ?>...</td>
                <td><a href="editera.php?id=<?= $accessoire->id ?>"><i class="fa fa-pencil" style="font-size: 20px;"></i></a></td>
                </tr>      
<?php endforeach; ?>

            </tbody>
            </table>
    </div>
</div>
</div>

    
</body>
</html>

