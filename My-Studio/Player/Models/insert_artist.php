<?php
    $query = "INSERT INTO artists (
            id_artist,
            artist_name,
            artist_picture,
            category
        ) VALUES (
            :ID,
            :artist_name,
            :artist_picture,
            :category)";
        // Security measures
    $query_params = array(
        ':ID' => NULL,
        ':artist_name' => $artist,
        ':artist_picture' => ' ';
        ':category' => 'pro');
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){   
            die("Failed to run query: " . $ex->getMessage());
        }
?>