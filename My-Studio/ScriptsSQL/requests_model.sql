INSERT INTO USERS ('pseudo','password','mail') VALUES ('$_POST['pseudo']','$_POST['pw']','$_POST['mail']');

INSERT INTO STYLES ('style_name') VALUES ('keyboard');

INSERT INTO ARTISTS('artist_name','cat') VALUES('name1','cat1');

INSERT INTO ALBUMS('album_name','album_cover','release_date') VALUES ('keyboard','keyboard','keyboard');

INSERT INTO ALBUMS('album_name','album_cover','release_date') VALUES ('$_POST['album_name']','$_FILE['album_cover']','$_POST['date']'); //** Pour artiste amateur **//

