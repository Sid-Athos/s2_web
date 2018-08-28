<?php
    /*  */

    /* Affichage des playlists */
    $query = "SELECT playlists.name, playlists.date, playlists.last_listen, playlists.count, playlists.duration
    FROM playlists JOIN users
    WHERE playlists.user_ID = users.ID
    AND users.id = :ID";
    
    $query_params = array(':ID' => $_SESSION['user_id'],
                    ":playlist" => $_POST['playlist_name']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }

    $playlist_content = $stmt->fetchAll();
    
    /* Version sous requête */

    $query = "SELECT nam, date, last_listen, count_listen, duration
                FROM playlists
                WHERE users_ID = :ID"



        /* Récupération d'1 playlist */
    $query = "SELECT musics.name, artists.name, albums.name, playlists.name     
            FROM musics JOIN artists JOIN albums JOIN playlists JOIN users
            WHERE musics.id = playlists.music_ID
            AND playlists.user_ID = users.ID
            AND users.id = :ID
            AND musics.album = albums.ID
            AND musics.artist = artists.ID
            AND playlists.name = :playlist";
    $query_params = array(':ID' => $_SESSION['user_id'],
                           ":playlist" => $_POST['playlist_name']);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $playlist_content = $stmt->fetchAll();

        /* Récupération des favoris */
        $query = "SELECT musics.name, artists.name, albums.name
            FROM musics JOIN artists JOIN albums JOIN playlists JOIN users
            WHERE musics.id = favorites_by.music_ID
            AND favorites_by.user_ID = users.ID
            AND users.id = :ID
            AND musics.album = albums.ID
            AND musics.artist = artists.ID";
    $query_params = array(':ID' => $_SESSION['user_id']);

    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        die("Failed to run query: " . $ex->getMessage());
    }
    $favorites_content = $stmt->fetchAll();
?>