<?php
function search_pseudo ($POST) {
	$query =
	"SELECT id_user, username, pw, category
	FROM users
	WHERE username =?";

	$query_params= array($_POST['pseudo']);

		$pwd = $bdd->prepare($query);
		$pwd->execute($query_params);
		$donnees = $pwd->fetch();
		return $donnees;
}
?>
