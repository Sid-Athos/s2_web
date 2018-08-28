<?php
    $query = "
    SELECT albums.album_cover as cover, musics.title as titre, artists.artist_name as name, musics.featuring as featuring, musics.music_path as source, albums.album_name AS album 
    FROM musics 
    JOIN albums 
    JOIN artists 
    ON artists.artist_ID = albums.artist_id 
    AND musics.artist = artists.artist_ID
    ORDER BY RAND()";
        $query_params = null;
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }catch(PDOException $ex){
            die("Failed to run query: " . $ex->getMessage());
        }
?>
