DROP DATABASE IF EXISTS mystudio;

CREATE DATABASE mystudio;

USE mystudio;

CREATE TABLE IF NOT EXISTS STYLES{
    id_style INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
    style_name VARCHAR(12) NOT NULL,
	PRIMARY KEY (id_style)
}

CREATE TABLE IF NOT EXISTS ARTISTS{
    id_artist INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
    artist_name varchar(12) NOT NULL,
    cat ENUM('amateur','pro') NOT NULL,
	PRIMARY KEY (id_artist)
}

CREATE TABLE IF NOT EXISTS ALBUMS{
    id_album INT(11)NOT NULL AUTO_INCREMENT UNIQUE,
    album_name varchar(45) NOT NULL,
    album_cover BLOB,
	release_date YEAR,
	PRIMARY KEY (id_album)
}

CREATE TABLE IF NOT EXISTS USERS{
    id_user INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
    username varchar(12) NOT NULL,
    pw CHAR(41) NOT NULL,
    cat ENUM('artiste','auditeur') NOT NULL,
	PRIMARY KEY (id_user)
}

CREATE TABLE IF NOT EXISTS MUSICS{
    id_music INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
    title VARCHAR(45) NOT NULL,
    featuring VARCHAR(45) NOT NULL,
    nb_listening INT(11) NULL,
    lyrics BLOB,
    trans BLOB,
    music BLOB,
    style SMALLINT NOT NULL,
    album INT(11),
    artist INT(11),
	PRIMARY KEY (id_music)
	CONSTRAINT fk_album_has_MUSICS
		FOREIGN KEY (id_album)
		REFERENCES mystudio.ALBUMS (album_name)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT fk_artist_has_MUSICS
		FOREIGN KEY (id_artist)
		REFERENCES mystudio.ARTISTS (artist_name)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
	CONSTRAINT fk_style_has_MUSICS
		FOREIGN KEY (id_style)
		REFERENCES mystudio.STYLES (style_name)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION,
}

CREATE TABLE IF NOT EXISTS PLAYLISTS{
    id_playlist int(11) AUTO_INCREMENT NOT NULL UNIQUE,
    play_title VARCHAR(45),
    birthdate DATE,
    users INT(11),
	PRIMARY KEY (id_playlist)
	CONSTRAINT fk_users_has_GENRES_PLAYLIST
		FOREIGN KEY (users)
		REFERENCES mystudio.USERS (id_user)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
}

CREATE TABLE IF NOT EXISTS REGISTERED_IN{
    id_fav INT(11) AUTO_INCREMENT NOT NULL UNIQUE,
    music INT(11),
    playlist INT(11),
	PRIMARY KEY(id_fav)
	CONSTRAINT fk_music_has_REGISTERED_IN
		FOREIGN KEY (music)
		REFERENCES mystudio.MUSICS (id_music)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
	CONSTRAINT fk_playlist_has_REGISTERED_INà
		FOREIGN KEY (playlist)
		REFERENCES mystudio.PLAYLISTS (id_playlist)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
}