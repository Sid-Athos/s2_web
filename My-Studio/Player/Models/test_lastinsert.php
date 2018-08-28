<?php
include('./db_connect.php');
include('./insert_artist.php');
    $id = $db->lastInsertId();
    print $id;
?>