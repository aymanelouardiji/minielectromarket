<?php
/*connexion a la base de donnee*/
try {
$access=new pdo("mysql:host=localhost;dbname=minimarket;charset=utf8","root","");
$access->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $e) 
{
	$e->getMessage();
}
?>