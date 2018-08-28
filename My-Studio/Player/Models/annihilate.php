<?php

    include('../Models/db_connect.php');
    require_once('../Controllers/Functions/PHP/kill_all_files.php');
    /* Suppresses an artist from the database */
    $query[0] = 
    "SELECT artist_name
    FROM artists
    WHERE id_artist = :artist_id";
    $query[1] = 
    "DELETE 
    FROM musics
    WHERE artist = :artist_id";
    $query[2] = 
    "DELETE
    FROM albums
    WHERE artist_id = :artist_id";
    $query[3] = 
    "DELETE
    FROM artists
    WHERE id_artist = :artist_id";

    for($i=0; $i < 4; $i++){
        $query_params[$i] = array(":artist_id" => 5);
        try {
            $stmt = $db->prepare($query[$i]);
            $result = $stmt->execute($query_params[$i]);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
        if($i == 0){
            $artist_row = $stmt -> fetchAll();
            $dir = '../../../data/mystudio/musics/'.$artist_row[$i]['artist_name'];
        }
    }
    /* Suppresses all files and directories an artist have in our servers */
    kill_all_files($dir);
?>