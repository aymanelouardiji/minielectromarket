<!DOCTYPE html>
<html>
<head>
<style>
    body{
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    background:  #fff;
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
  .box {
    border: 1px solid black;
    margin: 30px auto;
    width: 400px;
    overflow: hidden;
    max-width: 500px;
    background: #fff;
    padding: 30px;
    border-radius: 5px;
    box-shadow: 0px 15px 20px rgba(0,0,0,0.1);
  }
  h1.box-logo a {
    text-decoration:none;
  }
  h1.box-title {
    color: #0d0909;
    background: #f8f8f8;
    font-weight: 300;
    padding: 15px 25px;
    line-height: 30px;
    font-size: 25px;
    text-align:center;
    margin: -27px -26px 26px;
  }
  .box-button {
    border-radius: 5px;
    background:red;
    text-align: center;
    cursor: pointer;
    font-size: 19px;
    width: 100%;
    height: 51px;
    padding: 0;
    color: #fff;
    border: 0;
    outline:0;
  }
  .box-register
  {
    text-align:center;
    margin-bottom:0px;
   
  }
  .box-register a
  {
    text-decoration:none;
    font-size:12px;
    color: blue;
  }
  .box-input {
    font-size: 14px;
    background: #fff;
    border: 1px solid #ddd;
    margin-bottom: 25px;
    padding-left:10px;
    border-radius: 5px;
    width: 347px;
    height: 50px;
  }
  .box-input:focus {
      outline: none;
      border-color:#5c7186;
  }
  .sucess{
      text-align: center;
      color: white;
  }
  .sucess a {
      text-decoration: none;
      color: #58aef7;
  }
  p.errorMessage {
      background-color: #e66262;
      border: #AA4502 1px solid;
      padding: 5px 10px;
      color: #FFFFFF;
      border-radius: 3px;
  }
  </style>
</head>
<body>
<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'minimarket');
 
// Connexion � la base de donn�es MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>
<?php
// code va créer un formulaire web qui permet aux utilisateurs de s’inscrire.
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn, $username); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
	//requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email','$password')";
	// Exécute la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
    <h1 class="box-title">Inscription</h1>
	<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="loginc.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>