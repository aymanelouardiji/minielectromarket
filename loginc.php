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
    background: green;
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
    color:blue;
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

// Connexion à la base de données MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

session_start();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Utilisation de requêtes préparées avec des paramètres liés
    $query = "SELECT * FROM `users` WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);

    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($conn));
    }

    // Lier les paramètres
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

    // Exécuter la requête
    if (mysqli_stmt_execute($stmt)) {
        // Récupérer le résultat
        $result = mysqli_stmt_get_result($stmt);
        $rows = mysqli_num_rows($result);

        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
        }
    } else {
        die("Query execution failed: " . mysqli_error($conn));
    }

    // Fermer la requête préparée
    mysqli_stmt_close($stmt);
}
?>



<form class="box" action="" method="post" name="login">

<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<a href="index.php"><input type="submit" value="Connexion " name="submit" class="box-button"></a><br></br>
<p class="box-register">Vous êtes nouveau ici? <a href="registre.php">S'inscrire</a></p>
<?php if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>