<?php

include 'Controllers/session_check.php';
        if(session_set($_SESSION['id']) == 0) {
               echo"<center>Veuillez vous connecter pour acceder aux pages du site<br><a href='index.php?page=login'>Cliques ici</a></center>";
        }else{
                include 'Views/html_top.html';
                include 'Views/barre.php';
                include 'Views/navbar.php';
		include('Models/new_songs.php');
		include('Controllers/display_songs.php');

		$donnees = news();
		display_songs($donnees);

	}
?>
<script src="Views/jquery.js"></script>
<script src="Views/style.js"></script>
