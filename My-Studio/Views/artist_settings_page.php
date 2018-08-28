<?php
	session_start();
	echo"<center><h1>Compte</h1><br>";
	echo "Changer de nom : 
	<form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='un'>
	<input type='hidden' name='change' value='nom'>
	<button>Changer</button>
	</form><br>";
	echo "Changer de statut : 
	<form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='un'>
	<input type='hidden' name='change' value='statut'>
	<button>Changer</button>
	</form><br>";
	echo "Changer de mot de passe : 
	<form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='un'>
	<input type='hidden' name='change' value='pw'>
	<button>Changer</button>
	</form><br>";
	echo "Gérer mes musiques : 
	<form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='trois'>
	<button>Modifier</button>
	</form><br>";
	echo "EN CONSTRUCTION<br>";
	echo "Modifier mes playlists : 
	<form action='index.php' method='GET'>
	Modifier
	</form><br>";
	echo "Supprimer mon compte : 
	<form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='un'>
	<input type='hidden' name='change' value='sup'>
	<button>Supprimer</button>
	</form><br></center>";
?>