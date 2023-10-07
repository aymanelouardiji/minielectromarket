<?php
session_start();

include "config/commandes.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login </title>
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
    <form method="post" class="box">
   <h1 class="box-title">Connexion</h1>
   <input type="text" class="box-input" name="email" placeholder="Email"><br></br>

   <input type="password" class="box-input" name="motdepasse" placeholder="Mot de passe"><br></br>
   <a href="index.php"><input type="submit" value="Connexion " name="envoyer" class="box-button"></a><br></br>
<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['email']) AND !empty($_POST['motdepasse']))
    {
        $email = htmlspecialchars(strip_tags($_POST['email'])) ;
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $admin = getAdmin($email, $motdepasse);

        if($admin){
            $_SESSION['kkkkkk22k2k'] = $admin;
            header('Location: admin/index.php');
        }else{
            $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";?>
             <p class="errorMessage"><?php echo $message; ?></p>
             </form>   
</body>
</html>
           <?php
           
        }
    }
}
?>