<?php
    /* You shall not pass */
    if(empty($_SESSION['ID'])){
        header("refresh:0;url=./index.php?page=Login");
        die();
    } 
?>