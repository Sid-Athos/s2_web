<?php
	session_start();
	echo "<center><h1>Mes musiques</h1><br>";
	require('./Models/parameter_account.php');
	require('./Models/parameter_songs.php');
	$data['nom']=$_SESSION['pseudo'];
	$data['id']=search_id_art($data);
	$song=search_id_song($data);
	echo "<center><table border=1>
	<tr><th>Nom de la musique<th>Nom de l'album<th>Image de l'album</tr>";
	for($i=0;$i<$song[3][0];$i++)
	{
		echo "<tr><td>".$song[0][$i]."<td>".$song[1][$i]."<td><img src='".$song[2][$i]."' width='150' height='150'></tr>";
	}
	echo "<tr><td><form action='./index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='quatre'>
	<input type='hidden' name='change' value='add'>
	<input type='hidden' name='table' value='song'>
	<button>Ajouter une musique</button>
	</form>";
	echo "<td><form action='index.php' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<input type='hidden' name='nb' value='quatre'>
	<input type='hidden' name='change' value='add'>
	<input type='hidden' name='table' value='album'>
	<button>Ajouter un album</button>
	</form>";
	if(empty($song)==false)
	{
		echo "<td><form action='index.php' method='GET'>
		<input type='hidden' name='page' value='settings'>
		<input type='hidden' name='nb' value='quatre'>
		<input type='hidden' name='change' value='sup'>
		<button>Supprimer un album</button>
		</form>";
	}
	else
	{
		echo "<td>&nbsp;";
	}
	echo "</tr>";
	echo "</table>";
	echo "<form action='index.php?page=settings' method='GET'>
	<input type='hidden' name='page' value='settings'>
	<br><button>Retourner aux paramètres</button>
	</form></center>";
?>