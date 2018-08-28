<?php
	session_start();
	if(isset($_GET['change'])==false)
	{
		header("location: ../index.php?page=settings");
	}
	else
	{
		require('./Models/parameter_account.php');
		require('./Models/parameter_songs.php');
		echo "<center>";
		if($_GET['change']=='sup')
		{
			$data['pseudo']=$_SESSION['pseudo'];
			$album=search_album($data);
			echo "<h2>Quel album voulez-vous supprimer ?</h2><br>";
			echo "<form action='./Controllers/change_song.php' method='POST'>
			<select name='id'>";
			for($i=0;$i<$album[2][0];$i++)
			{
				echo "<option value='".$album[0][$i]."'>".$album[1][$i]."</option>";
			}
    		echo "</select><br>";
			echo "<input type='password' placeholder='Mot de passe' name='conf_pw' required><br><br>";
			if(isset($_SESSION['erreur']) && empty($_SESSION['erreur'])==false)
			{
				echo $_SESSION['erreur'];
				$_SESSION['erreur']="";
			}
			else
			{
				echo "<br>";
			}
			echo "<br><button>Oui</button>";
			echo "<input type='hidden' name='change' value='".$_GET['change']."'>
			</form>";
			echo "<form action='index.php?page=settings' method='GET'>
			<input type='hidden' name='page' value='settings'>
			<input type='hidden' name='nb' value='trois'>
			<br><button>Non</button>
			</form></center>";
		}
		else if($_GET['change']=='add')
		{
			if($_GET['table']=='song')
			{
				if((isset($_SESSION['test3'])==false && isset($_SESSION['test4'])==false) || ($_SESSION['test3']=="" && $_SESSION['test4']==""))
				{
					$_SESSION['test3']="Paroles...";
					$_SESSION['test4']="Traduction des paroles...";
				}
				echo "EN CONSTRUCTION<br>";
				echo "<h2>Ajouter une musique</h2><br>
				<form enctype='multipart/form-data' action='./Controllers/change_song.php' method='POST'>
				Lien du fichier : <input type='file' name='song' accept='audio/mp3' required><br>
					<input type='text' name='title' placeholder='Titre' required value='";if(isset($_SESSION['test1'])){echo $_SESSION['test1'];} echo "'><br>
					<input type='text' name='featuring' placeholder='Partenaire' value='";if(isset($_SESSION['test2'])){echo $_SESSION['test2'];} echo "'><br>
					Seuls les fichiers audios.mp3 sont acceptés.<br>
					<textarea name=lyrics rows='50' cols='100'>".$_SESSION['test3']."</textarea><br>
					<textarea name=trans rows='50' cols='100'>".$_SESSION['test4']."</textarea><br><br>
					<input type='hidden' name='change' value='".$_GET['change']."'>
					<input type='hidden' name='table' value='".$_GET['table']."'>";
					//echo "Envoyer
					echo "<button>Envoyer</button>
				</form>";
				if(isset($_SESSION['test1']) || isset($_SESSION['test2']) || isset($_SESSION['test3']) || isset($_SESSION['test4']))
				{
					$_SESSION['test1']="";
					$_SESSION['test2']="";
					$_SESSION['test3']="";
					$_SESSION['test4']="";
				}
			}
			else if($_GET['table']=='album')
			{
				echo "EN CONSTRUCTION<br>";
				echo "<h2>Ajouter un album</h2><br>
				<form enctype='multipart/form-data action='./Controllers/change_song.php' method='POST'>
				Image de couverture : <input type='file' name='picture' accept='image/jpeg, image/png, image/jpg' required><br>
					<input type='text' name='album_name' placeholder='Titre' required value='";if(isset($_SESSION['test5'])){echo $_SESSION['test5'];} echo "'><br>
					<input type='text' name='release_date' placeholder='Date de sortie' required value='";if(isset($_SESSION['test6'])){echo $_SESSION['test6'];} echo "'><br>
					Seules les images.png, images.jpg et images.jpeg sont acceptées.<br><br>
					<input type='hidden' name='change' value='".$_GET['change']."'>
					<input type='hidden' name='table' value='".$_GET['table']."'>";
					//echo "Envoyer
					echo "<button>Envoyer</button>
				</form>";
				if(isset($_SESSION['test5']) || isset($_SESSION['test6']))
				{
					$_SESSION['test5']="";
					$_SESSION['test6']="";
				}
			}
			if(isset($_SESSION['erreur']) && empty($_SESSION['erreur'])==false)
			{
				echo $_SESSION['erreur'];
				$_SESSION['erreur']="";
			}
			else
			{
				echo "<br>";
			}
			echo "<form action='index.php?page=settings' method='GET'>
			<input type='hidden' name='page' value='settings'>
			<input type='hidden' name='nb' value='trois'>
			<br><button>Retour</button>
			</form></center>";
		}
		else
		{
			header("location: ./index.php?page=settings");
		}
	}
?>