<?php
	session_start();
	if(isset($_GET['change'])==false)
	{
		header("location: ../index.php?page=settings");
	}
	else
	{
		if($_GET['change']=='add')
		{
			if(isset($_GET['table'])==false)
			{
				header("location: ../index.php?page=settings");
			}
			else
			{
				echo "<center><h2>Ajouter un";
				if($_GET['table']=='song')
				{
					echo "e musique</h2><br>L'ajout de cette musique a été un succès.";
				}
				else if($_GET['table']=='album')
				{
					echo " album</h2><br>L'ajout de cet album a été un succès.";
				}
				echo "<form action='index.php?page=settings' method='GET'>
				<input type='hidden' name='page' value='settings'>
				<br><button>Retourner aux paramètres</button>
				</form></center>";
			}
		}
		else if($_GET['change']=='sup')
		{
			echo "<center>Cet album a bien été supprimé.
			<form action='index.php?page=settings' method='GET'>
			<input type='hidden' name='page' value='settings'>
			<br><button>Retourner aux paramètres</button>
			</form></center>";
		}
	}
?>