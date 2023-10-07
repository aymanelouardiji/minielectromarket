<?php 
session_start();
//connexion à la base de données
$con = mysqli_connect("localhost","root","","minimarket");
//verifier la connexion
if(!$con) die('Erreur : '.mysqli_connect_error());

  //supprimer les produits
   //si la variable del existe
   if(isset($_GET['del'])){
    $id_del = $_GET['del'] ;
    //suppression
    unset($_SESSION['panier'][$id_del]);
   }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /*Police d'écriture*/
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;500&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: white;
}
.link {
    margin: 20px;
    width: fit-content;
    position: relative;
    text-decoration: 0;
    background-color: red;
    color: #fff;
    padding: 10px 25px;
    border-radius: 6px;
    font-size: 14px;
}

/*Panier CSS*/
.panier {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;

}
.panier img {
    width: 40px;
    padding: 8px 0;
}
.panier section {
    width: 70%;
    background-color: #fff;
    padding: 10px;
    border-radius: 6px;
}
table {
    border-collapse: collapse;
    width: 100%;
    letter-spacing: 1px;
    font-size: 13px;
}
th {
    padding: 10px 0;
    font-weight: 400;
}
td {
    border-top: 0.5px solid #999;
    text-align: center;
    color: red;
}
tr {
    border-bottom: 0.5px solid #999;
}

.total th {
    border: 0;
    float: left;
    font-weight: 500;
    color: red;
    padding: 10px;
}
    </style>
</head>
<body >
<header class="header">

<a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> Mini-Market </a>

<nav class="navbar" id="navbar">
    <a href="index.php">Vêtements</a>
    <a href="cosmetic.php"> Cosmétique</a>
    <a href="accessoires.php">Accessoires</a>
    <a href="#Contact">Contact</a>
    
</nav>

<div class="icons">
<a class="fas fa-bars" id="menu-btn"></a>
    <a href="search.php" class="fas fa-search" id="search-btn"></a>
    <a href="panier.php" class="fas fa-shopping-cart" id="cart-btn" >
  <!--  <span><?=array_sum($_SESSION['panier'])?></span>--></a>
  <a  href="logout.php" class="fas fa-right-from-bracket"></a>
</div> 

</header>
<div class="panier">
    <section>
        <table>
            <tr>
                <th></th>
                <th><h3>Nom</h3></th>
                <th><h3>Prix</h3></th>
                <th><h3>Quantité</h3></th>
                <th><h3>Action</h3></th>
            </tr>
            <?php 
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = array_keys($_SESSION['panier']);
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){?>
                 <h2>Votre panier est vide !</h2>
                 <?php
              }else {
                //si oui 
                $products = mysqli_query($con, "SELECT * FROM produits WHERE id IN (".implode(',', $ids).")");

                //lise des produit avec une boucle foreach
                foreach($products as $product):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $product['prix'] * $_SESSION['panier'][$product['id']] ;
                ?>
                <tr>
                    <td><img src="<?=$product['image']?>"></td>
                    <td><?=$product['nom']?></td>
                    <td><?=$product['prix']?>DH</td>
                    <td><?=$_SESSION['panier'][$product['id']] // Quantité?></td>
                    <td><a href="panier.php?del=<?=$product['id']?>"><i class="fas fa-trash"></i></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th><h3>Total : <?=$total?>DH</h3></th>
            </tr>
        </table>
    </section>
 </div>
</body>
</html>