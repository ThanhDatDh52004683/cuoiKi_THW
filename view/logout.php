<?php  
    session_start();
       include "../model/config.php";

        
            unset($_SESSION['name']);
            unset($_SESSION['username']);
            unset($_SESSION['giohang']);
               header("location: ../controller/index.php?act=login");
        
 
?>