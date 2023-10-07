<?php
require("config/commandes.php");
$bdd = new PDO('mysql:host=localhost;dbname=minimarket', 'root', '');
$allproducts = $bdd->query('SELECT image, nom, prix, description FROM produits  ORDER BY id DESC');
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allproducts = $bdd->query('SELECT image, nom, prix, description FROM produits WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
$allcosmetic = $bdd->query('SELECT image, nom, prix, description FROM cosmetic  ORDER BY id DESC');
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allcosmetic = $bdd->query('SELECT image, nom, prix, description FROM cosmetic WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
$allaccessoires = $bdd->query('SELECT image, nom, prix, description FROM accessoires ORDER BY id DESC');
if (isset($_GET['s']) AND !empty($_GET['s'])){
    $recherche = htmlspecialchars($_GET['s']);
    $allaccessoires = $bdd->query('SELECT image, nom, prix, description FROM accessoires WHERE nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Market</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
      <!-- font awesome cdn link  -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- header section starts  -->

<header class="header">

<a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Mini-Market </a>

<nav class="navbar" id="navbar">
    <a href="index.php" style=" text-decoration: none">home</a>

    <a href="#Contact">Contact</a>
    
</nav>

<div class="icons">
<a class="fas fa-bars" id="menu-btn"></a>
    <a href="search.php" class="fas fa-search" id="search-btn"></a>
    <a href="panier.php" class="fas fa-shopping-cart" id="cart-btn"></a>
    <a  href="logout.php" class="fas fa-right-from-bracket"></a>
</div> 

</header>
  <!-- header section ends  -->

    <section class="search-form">
    <form  class="search" method="GET">
        <input type="search" name="s" placeholder="Rechercher un produit" class="bs" style="font-size: 2rem">
        <input type="submit" name="envoyer" class="btn">
    </form>
</section>


    <section> 
        <?php
       
        if($allproducts->rowCount() > 0){?>

            <div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 " style="display:flex">
    <?php
            while($produit = $allproducts->fetch()){
                ?>
         

  
      <div class="col box">
        <div class="card shadow-sm">
          <img src="<?= $produit['image']; ?>" >
          <h3 class="price"><?= $produit['nom'] ;?></h3>
          <div class="card-body">
         
            <p class="card-text"><?= $produit['description']; ?></p>
           
              <p class="price" style="display:centre"><?= $produit['prix'] ?> DH </p><br/>
             
              <a class="btn  "  ><i class="fas fa-shopping-cart"></i> Acheter</a> 
              <div class="d-flex justify-content-between align-items-center">

              </div>
          </div>
        </div>
      </div>
      <?php
                }
            }    
       
            ?>
             </section> 
             <section> 
 
        <?php
       
        if($allcosmetic->rowCount() > 0){?>

            <div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 " style="display:flex">
    <?php
            while($cosmetic = $allcosmetic->fetch()){
                ?>
         

  
      <div class="col box">
        <div class="card shadow-sm">
          <img src="<?= $cosmetic['image']; ?>" >
          <h3 class="price"><?= $cosmetic['nom'] ;?></h3>
          <div class="card-body">
         
            <p class="card-text"><?= $cosmetic['description']; ?></p>
           
              <p class="price" style="display:centre"><?= $cosmetic['prix'] ?> DH </p><br/>
             
              <a class="btn  "  ><i class="fas fa-shopping-cart"></i> Acheter</a> 
              <div class="d-flex justify-content-between align-items-center">

              </div>
          </div>
        </div>
      </div>
      <?php
                }
            } ?>
           
</section> 
<section> 
 
 <?php

 if($allaccessoires->rowCount() > 0){?>

     <div class="album py-5 bg-light">
<div class="container">

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 " style="display:flex">
<?php
     while($accessoire = $allaccessoires->fetch()){
         ?>
  


<div class="col box">
 <div class="card shadow-sm">
   <img src="<?= $accessoire['image']; ?>" >
   <h3 class="price"><?= $accessoire['nom'] ;?></h3>
   <div class="card-body">
  
     <p class="card-text"><?= $accessoire['description']; ?></p>
    
       <p class="price" style="display:centre"><?= $accessoire['prix'] ?> DH </p><br/>
      
       <a class="btn  "  ><i class="fas fa-shopping-cart"></i> Acheter</a> 
       <div class="d-flex justify-content-between align-items-center">

       </div>
   </div>
 </div> 
</div>
<?php
         }
     } else{
         ?>
         <h3>Aucun resultat trouve</h3>
         <?php
     }       

     ?>
    
</section> 
<!-- footer section starts  -->

<section class="footer" id="Contact">

    <div class="box-container">

        <div class="boxf">
            <h3> Mini-Market <i class="fas fa-shopping-basket"></i> </h3>
            <p>Suivez-nous sur :</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="boxf">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +212 623456789 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +212 623456789 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> minimarket@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> Tanger, Maroc - Boukhalf </a>
        </div>

        <div class="boxf">
            <h3>quick links</h3>
            <a href="#home" class="links"> <i class="fas fa-arrow-right"></i> home </a>
         
 
        </div>

        <div class="boxf">
            <h3>Avis</h3>
            <p>Donnez votre avis</p>
            <input type="email" placeholder="votre avis" class="email">
           <a> <input type="submit" value="envoyer" class="btn" onclick="alert('Merci pour votre avis')"></a>
            <img src="image/payment.png" class="payment-img" alt="">
        </div>
     
    </div>

    <div class="credit"> created by <span> MFSCC </span> | tous droits réservés © 2023 </div>

</section>

<!-- footer section ends -->

</body>
</html>