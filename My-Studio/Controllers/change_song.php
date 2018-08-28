<?php
	session_start();
	require('../Models/parameter_account.php');
	require('../Models/parameter_songs.php');
	require('../Controllers/cryptage.php');
	if(isset($_POST['change'])==false)
	{
		header("location: ../index.php?page=settings");
	}
	else
	{
		if($_POST['change']=='sup')
		{
			if(isset($_POST['id']))
			{
				$a=1;
				$data['id']=$_SESSION['id'];
/////////////////cryptage
				$data['pw']=cryptage($_POST['conf_pw']);
				//$data['pw']=$_POST['conf_pw'];
				$b=search_pw($data);
				if($b==0)
				{
					$a=0;
					$_SESSION['erreur']="<center>Mot de passe incorrect. Veuillez réessayer.</center>";
				}
				else
				{
					$data['ID']=$_POST['id'];
					delete_album($data['ID']);
					header("location: ../index.php?page=settings&nb=cinq&change=sup");
				}
			}
			else
			{
				header("location: ../index.php?page=settings");
			}
			if($a==0)
			{
				header("location: ../index.php?page=settings&nb=quatre&change=sup");
			}
		}
		else if($_POST['change']=='add')
		{
			if($_POST['table']=='song')
			{
				if(isset($_POST['music_path'])==false || isset($_POST['titre'])==false)
				{
					header("location: ../index.php?page=settings");
				}
				else
				{
					$a=1;
				}
				if($a==0)
				{
					header("location: ../index.php?page=settings&nb=quatre&change=add&table=song");
				}
			}
			else if($_POST['table']=='album')
			{
				if(isset($_POST['album_cover'])==false || isset($_POST['album_name'])==false || isset($_POST['release_date'])==false)
				{
					header("location: ../index.php?page=settings");
				}
				else
				{
					$a=1;
					if(isset($_FILES['picture']))
					{
						$dossier="../Views/images/";
						$fichier=basename($_FILES['picture']['name']);
						if(move_uploaded_file($_FILES['picture']['tmp_name'], $dossier.$fichier))
						{
							header("location: ../index.php?page=settings&nb=cinq&change=add&table=album");
						}
						else
						{
							$a=0;
							$_SESSION['erreur']="Echec de l'upload !";
						}
					}
					else
					{
						$a=0;
						$_SESSION['erreur']="erreur fichier.";
					}
				}
				if($a==0)
				{
					header("location: ../index.php?page=settings&nb=quatre&change=add&table=album");
				}
			}
		}
	}
?>