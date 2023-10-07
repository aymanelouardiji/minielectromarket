<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Market</title>
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
    background: rgb(47, 71, 178);
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
  </style>
</head>
<body>
<form class="box" action="" method="post" name="login">

<h1 class="box-title">Connexion</h1>
<a href="loginc.php"><input  value="Connecter comme client "  class="box-button"></a><br></br>
<a href="login.php"><input  value="Connecter comme admin"  class="box-button"></a>


</form>
</body>
</html>