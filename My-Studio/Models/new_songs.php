<?php
function news () {

		include_once('Models/db_connect.php');
		$bdd = db_connect();
                $pwd = $bdd->prepare('SELECT ALBUMS.album_cover, MUSICS.title, ALBUMS.album_name, ARTISTS.artist_name,ALBUMS.release_date, STYLES.style_name FROM MUSICS JOIN ALBUMS JOIN ARTISTS JOIN STYLES WHERE ALBUMS.id_album = MUSICS.album AND ARTISTS.id_artist = MUSICS.artist AND EXTRACT(MONTH FROM ALBUMS.release_date) = ? AND EXTRACT(YEAR FROM ALBUMS.release_date) = ? AND STYLES.id_style = MUSICS.style ' );
                //$pwd = $bdd->query('SELECT MUSICS.title, ALBUMS.album_name, ARTISTS.artist_name,ALBUMS.release_date FROM MUSICS JOIN ALBUMS JOIN ARTISTS WHERE ALBUMS.id_album = MUSICS.album AND ARTISTS.id_artist = MUSICS.artist');
                $pwd->execute(array(date("m"),
				    date("Y")
			     ));
		$i = 0;
                while($ligne = $pwd->fetch() ) {
		$donnees[$i][0] = $ligne['album_cover'];
		$donnees[$i][1] = $ligne['title'];
		$donnees[$i][2] = $ligne['album_name'];
		$donnees[$i][3] = $ligne['artist_name'];
		$line = explode(" ", $ligne['release_date']);
		$donnees[$i][4] = $line[0];
		$donnees[$i][5] = $ligne['style_name'];
		$i++;
		}
$pwd->closeCursor();
                return $donnees;
}
/*
SELECT ALBUMS.album_cover, MUSICS.title, ALBUMS.album_name, ARTISTS.artist_name,ALBUMS.release_date, STYLES.style_name FROM MUSICS JOIN ALBUMS JOIN ARTISTS JOIN STYLES WHERE ALBUMS.id_album = MUSICS.album AND ARTISTS.id_artist = MUSICS.artist AND EXTRACT(MONTH FROM ALBUMS.release_date) = '06' AND EXTRACT(YEAR FROM ALBUMS.release_date) = '2018' AND STYLES.id_style = MUSICS.style ORDER BY ALBUMS.release_date */
?>

