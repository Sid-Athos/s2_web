<?php
    include('./db_connect.php');
    session_start();

    $_SESSION['oui'] = 'lol';
    echo $_SESSION['oui'];
    unset($_SESSION);
    var_dump($_SESSION);
    $query =
    "UPDATE musics set nb_listening = (nb_listening+1) WHERE title='Lolilol'
    AND musics.artist = (SELECT artists.artist_ID FROM artists WHERE artists.artist_name = 'Sid')
    AND musics.album = (SELECT albums.album_ID FROM albums WHERE albums.album_name = 'Intech')";    
    
    $query_params = null;
    $_POST['lol'] = 'sid';
    $_POST['oui'] = 'lil';
    var_dump($_POST);
    unset($_POST);
    var_dump($_POST);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        echo "++";
    }catch(PDOException $ex){
        die("Failed to run query: " . $ex->getMessage());
    }
?>