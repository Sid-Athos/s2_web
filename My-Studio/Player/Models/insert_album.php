<?php
    $query = "INSERT INTO albums (
            album_ID,
            album_name,
            album_cover,
            release_date,
            artist_id
        ) VALUES (
            :ID,
            :album_name,
            :cover_path,
            :release_date,
            (SELECT id_artist 
            FROM artists
            WHERE artist_name LIKE :artist))";
        // Security measures
    $query_params = array(
        ':ID' => NULL,
        ':album_name' => $album_name,
        ':cover_path' => $cover_path,
        ':release_date' =>$date,
        ':artist' => $artist);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){   
        die("Failed to run query: " . $ex->getMessage());
    }
?>
        