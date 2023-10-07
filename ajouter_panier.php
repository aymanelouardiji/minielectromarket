<?php
//include la page de connexion
include_once "config/connexion.php";
//verifier si la session existe
if (!isset($_SESSION)){
    //si non demarer la session
session_start();
}
//cree la session
if(!isset($_SESSION['panier'])){
    //s il n existe pas une session on creer et on mets un tableau a l interieur
  $_SESSION['panier'] = array ();
}
//recuperation de l id dans un lien
if(isset($_GET['id'])){ //si un id a ete envoye alors:
    $id = $_GET['id'] ;
    /*verifier grace a l id si le produit existe dans la base de donnees
    $produit = mysqli_query($access ,"SELECT * FROM produits WHERE id = $id");
    if(empty(mysqli_fetch_assoc($produit))){
        //si le produit n existe pas
    }
    die("ce produit n existe pas");*/
    //ajouter le produit au panier 
    if(isset($_SESSION['panier'][$id])){ //si le produit est deja dans le panier
        $_SESSION['panier'][$id]++; //represente la quantite
   
    }else{
        //si non on ajoute le produit
        $_SESSION['panier'][$id]= 1 ;
       //redirection vers la page index.php
       header("location: index.php");
    }
}
?>