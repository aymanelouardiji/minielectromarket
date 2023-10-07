<?php

require("config/commandes.php");
session_start();
if(!isset($_SESSION['username'])){
  header("Location: loginc.php");
  }
  if(empty($_SESSION['username'])){
      header("Location: loginc.php");
   }
  $Cosmetics=afficherc();
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
    <script src="script.js"></script>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo"> <i class="fas fa-shopping-basket"></i> Mini-Market </a>

    <nav class="navbar" id="navbar">
        <a href="index.php">Vêtements</a>
        <a href="#Cosmetic"> Cosmétique</a>
        <a href="accessoires.php">Accessoires</a>
        <a href="#Contact">Contact</a>
        
    </nav>

    <div class="icons">
    <a class="fas fa-bars" id="menu-btn"></a>
    <a href="search.php" class="fas fa-search" id="search-btn"></a>
    <a href="panier.php" class="fas fa-shopping-cart" id="cart-btn">
        <span>
            <?php
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                echo array_sum($_SESSION['panier']);
            } else {
                echo '0'; // Default value when $_SESSION['panier'] is not set or not an array.
            }
            ?>
        </span>
    </a>
    <a href="logout.php" class="fas fa-sign-out-alt"></a>
    </div>

    
</header>
<!-- header section ends -->
<!-- home section starts  -->
<a  href ="#Cosmetic"class="home" id="home">
    <div class="content">
    </div>
</a>

<!-- home section ends -->
<section class="products" id="products">

    <h1 class="heading" id="Cosmetic"><span>Cosmétique</span> </h1>
    <main>

<div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 " style="display:flex">

    <?php foreach($Cosmetics as $cosmetic): ?> 
      <div class="col box">
        <div class="card shadow-sm">
        
          <img src="<?= $cosmetic->image ?>" style="display:center ">
          <h3 class="price"><?= $cosmetic->nom ?></h3>
          <div class="card-body">
            <p class="card-text"><?= substr($cosmetic->description, 0, 160); ?>...</p>
            
              <div class="price"><?= $cosmetic->prix ?> DH </div>
              <a href="#" class="btn" name="add" type="submit"><i class="fas fa-shopping-cart"></i> Acheter</a>
              <div class="d-flex justify-content-between align-items-center">
            </div>
          </div>
        </div>
      </div>
<?php endforeach; ?>


    </div>
  </div>
</div>

</main>

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
            <h3>Acces rapide</h3>
            <a href="index.php" class="links"> <i class="fas fa-arrow-right"></i> Vêtements </a>
            <a href="#Cosmetic" class="links"> <i class="fas fa-arrow-right"></i> Cosmétique </a>
            <a href="accessoires.php" class="links"> <i class="fas fa-arrow-right"></i> Accessoires </a>
 
        </div>

        <div class="boxf">
            <h3>Avis</h3>
            <p>Donnez votre avis</p>
            <input type="email" placeholder="votre avis" class="email">
           <a> <input type="submit" value="envoyer" class="btn" onclick="alert('Merci pour votre avis')"></a>
            <img src="image/payment.png" class="payment-img" alt="">
        </div>
     
    </div>

    <div class="credit"> creer par <span> MFSCC </span> | tous droits réservés © 2023 </div>

</section>

<!-- footer section ends -->



<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->





 
    




  </body>
</html>