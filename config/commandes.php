<?php
function getAdmin($email, $password){
  
    if(require("connexion.php")){
  
      $req = $access->prepare(" SELECT * FROM admin WHERE email=? AND motdepasse=?");
  
      $req->execute(array($email, $password));
  
      if($req->rowCount() == 1){
        
        $data = $req->fetchAll(PDO::FETCH_OBJ);
  
        foreach($data as $i){
          $mail = $i->email;
          $mdp = $i->motdepasse;
        }
  
        if($mail == $email AND $mdp == $password)
        {
          return $data;
        }
        else{
            return false;
        }
  
      }
  
    }
  
  }
function ajouter( $image, $nom, $prix ,$desc)
{
    if(require("connexion.php"))
    {                                                                  
        $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $desc));
        
        $req->closeCursor();
    }
}
function ajouterc( $image, $nom, $prix ,$desc)
{
    if(require("connexion.php"))
    {                                                                  
        $req = $access->prepare("INSERT INTO cosmetic (image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $desc));
        
        $req->closeCursor();
    }
}
function ajoutera( $image, $nom, $prix ,$desc)
{
    if(require("connexion.php"))
    {                                                                  
        $req = $access->prepare("INSERT INTO accessoires(image, nom, prix, description) VALUES (?, ?, ?, ?)");
        $req->execute(array($image, $nom, $prix, $desc));
        
        $req->closeCursor();
    }
}
function afficher()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
       return $data;
       $req->closeCursor();

    }
}
function supprimer($id)
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM produits WHERE id=?  ");
        $req->execute(array($id));
        $req->closeCursor();
    }
}
function afficherc()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM cosmetic ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
       return $data;
       $req->closeCursor();

    }
}
function affichera()
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("SELECT * FROM accessoires ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
       return $data;
       $req->closeCursor();

    }
}
function modifier($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE produits SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=? ");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
  
}


function afficherUnProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits WHERE id=?  ");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function afficherUnProduitc($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM cosmetic WHERE id=?  ");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function afficherUnProduita($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM accessoires WHERE id=?  ");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function supprimerc($id)
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM cosmetic WHERE id=? ");
        $req->execute(array($id));
        $req->closeCursor();
    }
}
function supprimera($id)
{
    if(require("connexion.php"))
    {
        $req=$access->prepare("DELETE FROM accessoires WHERE id=?");
        $req->execute(array($id));
        $req->closeCursor();
    }
}
function modifierc($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE cosmetic SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=? ");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}
function modifiera($image, $nom, $prix, $desc, $id)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("UPDATE accessoires SET `image` = ?, nom = ?, prix = ?, description = ? WHERE id=?  ");

    $req->execute(array($image, $nom, $prix, $desc, $id));

    $req->closeCursor();
  }
}
function component($image, $nom, $prix, $desc, $id){
}
?>