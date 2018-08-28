<?php
function insert ($datas) {

	include_once('Models/db_connect.php');
	$bdd = db_connect();

	$req = $bdd->prepare('INSERT INTO USERS(id_user, username, pw, category) VALUES(:id_user, :username, :pw, :category)');
                $req->execute(array(
			'id_user' => NULL,
                        'username' => $datas[0],
                        'pw' => $datas[2],
                        'category' => $datas[1]
			));
}
?>
