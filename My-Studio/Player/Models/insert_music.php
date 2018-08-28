<?php
    $query = "INSERT INTO musics (
            id_music,
            title,
            featuring,
            music_path,
            style,
            album,
            artist
        ) VALUES (
            :ID,
            :title,
            :featuring,
            :music_path,
            (SELECT id_style FROM styles WHERE style_name = :style),
            (SELECT id_album FROM albums WHERE album_name = :album LIMIT 1),
            (SELECT id_artist FROM artists WHERE artist_name = :artist))";
        // Security measures
    $query_params = array(
        ':ID' => NULL,
        ':title' => $title,
        ':featuring' => $feat,
        ':style' => 'rap',
        ':music_path' =>$audio_path,
        ':album' => $album,
        ':artist' => $artist);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }catch(PDOException $ex){   
        die("Failed to run query: " . $ex->getMessage());
    }
?>
        