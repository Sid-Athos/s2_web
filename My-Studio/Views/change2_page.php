<?php
	session_start();
	if(isset($_GET['change'])==false)
	{
		header("location: ../index.php?page=settings");
	}
	else
	{
		/*if($_GET['change']!=='sup')
		{*/
			echo "<center><h2>Changement de ";
			if($_GET['change']=='nom')
			{
				echo "pseudo ?</h2><br>Votre nouveau pseudo est maintenant ".$_SESSION['pseudo'].".";
			}
			else if($_GET['change']=='statut')
			{
				echo "statut ?</h2><br>Votre nouveau statut est maintenant ".$_SESSION['type'].".";
			}
			else if($_GET['change']=='pw')
			{
				echo "mot de passe ?</h2><br>Votre nouveau mot de passe a été changé avec succès.";
			}
			echo "<form action='index.php?page=settings' method='GET'>
			<input type='hidden' name='page' value='settings'>
			<br><button>Retourner aux paramètres</button>
			</form></center>";
		/*}
		else
		{
			echo "<center>Votre compte a bien été supprimé.</center>";
		}*/
	}
?>