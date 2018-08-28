DROP DATABASE IF EXISTS mystudio;
CREATE DATABASE mystudio;
USE mystudio;

CREATE TABLE STYLES
    (id INT(11) NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(12),
    PRIMARY KEY(id) );

CREATE TABLE ARTISTS
    (id INT(11) NOT NULL AUTO_INCREMENT,
    pseudo varchar(12),
    style ENUM('amateur','pro'),
    PRIMARY KEY(id) );

CREATE TABLE ALBUMS
    (id INT(11)NOT NULL AUTO_INCREMENT,
    album_name varchar(45),
    album_cover BLOB,
    PRIMARY KEY(id) );


CREATE TABLE USERS
    (id INT(11) NOT NULL AUTO_INCREMENT,
    pseudo varchar(12) NOT NULL,
    pw CHAR(41) NOT NULL,
    class ENUM('artiste','auditeur') NOT NULL,
    PRIMARY KEY(id) );


CREATE TABLE MUSICS
    (id INT(11) AUTO_INCREMENT NOT NULL,
    title VARCHAR(45),
    featuring VARCHAR(45),
    nb_listening INT(11),
    lyrics BLOB,
    translation BLOB,
    music BLOB,
    style SMALLINT,
    album INT(11),
    artist INT(11),
    PRIMARY KEY(id) );

CREATE TABLE PLAYLISTS
    (id int(11) AUTO_INCREMENT NOT NULL,
    play_title VARCHAR(45),
    birthdate DATE,
    users INT(11),
    PRIMARY KEY(id) );


CREATE TABLE REGISTERED_IN
    (id INT(11) AUTO_INCREMENT NOT NULL,
    music INT(11),
    playlist INT(11),
    PRIMARY KEY(id) );
