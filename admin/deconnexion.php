<?php
session_start();
if (isset($_SESSION['kkkkkk22k2k']))
{
    $_SESSION['kkkkkk22k2k']=array();
    session_destroy();
    header("Location: ../index.php");
}
else{
    header("Location: ../login.php");
}

?>