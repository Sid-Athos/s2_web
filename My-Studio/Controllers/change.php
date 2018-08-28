<?php
	session_start();
	require('../Models/parameter_account.php');
	require('../Controllers/cryptage.php');
	if(isset($_POST['change'])==false)
	{
		header("location: ../index.php?page=settings");
	}
	else
	{
		$a=1;
		if($_POST['change']=='nom')
		{
			$data['id']=$_SESSION['id'];
	/////////cryptage
			$data['pw']=cryptage($_POST['conf_pw']);
			//$data['pw']=$_POST['conf_pw'];
			$b=search_pw($data);
			if($b==0)
			{
				$a=0;
				$_SESSION['erreur']="<center>Mot de passe incorrect. Veuillez réessayer.</center>";
			}
			else if(strlen($_POST['new_pseudo'])<6)
			{
				$a=0;
				$_SESSION['erreur']="<center>Le pseudo doit contenir un minimum de 6 caractères.</center>";
			}
			else
			{
				$data['pseudo']=$_POST['new_pseudo'];
				$b=search_pseudo_user($data);
				$c=search_pseudo_art($data);
				if($b==1 || $c==1)
				{		
					$a=0;
					$_SESSION['erreur']="<center>Ce pseudo existe déjà, veuillez en choisir un autre.</center>";
				}
			}
			if($a==0)
			{
				header("location: ../index.php?page=settings&nb=un&change=nom");
			}
			else
			{
				$data['pseudo']=$_POST['new_pseudo'];
				update_pseudo_user($data);
				if($_SESSION['type']=='artiste')
				{
					$data['nom']=$_SESSION['pseudo'];
					$data['id']=search_id_art($data);
					update_pseudo_art($data);
				}
				$_SESSION['pseudo']=$_POST['new_pseudo'];
				$_SESSION['erreur']="";
				header("location: ../index.php?page=settings&nb=deux&change=nom");
			}
		}
		else if($_POST['change']=='statut')
		{
			$data['id']=$_SESSION['id'];
	/////////cryptage
			$data['pw']=cryptage($_POST['conf_pw']);
			//$data['pw']=$_POST['conf_pw'];
			$b=search_pw($data);
			if($b==0)
			{
				$a=0;
				$_SESSION['erreur']="<center>Mot de passe incorrect. Veuillez réessayer.</center>";
			}
			else if($_POST['statut']==$_SESSION['type'])
			{
				$a=0;
				$_SESSION['erreur']="<center>Vous possédez déjà ce statut.</center>";
			}
			if($a==0)
			{
				header("location: ../index.php?page=settings&nb=un&change=statut");
			}
			else
			{
				$data['statut']=$_POST['statut'];
				update_statut($data);
				$data['pseudo']=$_SESSION['pseudo'];
				if($_SESSION['type']=='auditeur')
				{
					insert_art($data);
				}
				else
				{
					$data['nom']=$_SESSION['pseudo'];
					$data['id']=search_id_art($data);
					delete_art($data);
				}
				$_SESSION['type']=$_POST['statut'];
				$_SESSION['erreur']="";
				header("location: ../index.php?page=settings&nb=deux&change=statut");
			}
		}
		else if($_POST['change']=='pw')
		{
			$data['id']=$_SESSION['id'];
	/////////cryptage
			$data['pw']=cryptage($_POST['conf_pw']);
			//$data['pw']=$_POST['conf_pw'];
			$b=search_pw($data);
			if($b==0)
			{
				$a=0;
				$_SESSION['erreur']="<center>Ancien mot de passe incorrect. Veuillez réessayer.</center>";
			}
			else if($_POST['new_pw']!==$_POST['verif_pw'])
			{
				$a=0;
				$_SESSION['erreur']="<center>Divergence des entrées du nouveau mot de passe. Veuillez réessayer.</center>";
			}
			if($a==0)
			{
				header("location: ../index.php?page=settings&nb=un&change=pw");
			}
			else
			{
	/////////////cryptage
				$data['new_pw']=cryptage($_POST['new_pw']);
				//$data['new_pw']=$_POST['new_pw'];
				update_pw($data);
				$_SESSION['pw']=$_POST['new_pw'];
				$_SESSION['erreur']="";
				header("location: ../index.php?page=settings&nb=deux&change=pw");
			}
		}
		else if($_POST['change']=='sup')
		{
			$data['id']=$_SESSION['id'];
	/////////cryptage
			$data['pw']=cryptage($_POST['conf_pw']);
			//$data['pw']=$_POST['conf_pw'];
			$b=search_pw($data);
			if($b==0)
			{
				$a=0;
				$_SESSION['erreur']="<center>Mot de passe incorrect. Veuillez réessayer.</center>";
			}
			if($a==0)
			{
				header("location: ../index.php?page=settings&nb=un&change=sup");
			}
			else
			{
				require_once('../Models/parameter_songs.php');
				$data['nom']=$_SESSION['pseudo'];
				$data['pseudo']=$_SESSION['pseudo'];
				$data['id']=search_id_art($data);
				$datas=search_album($data);
				delete_account($data, $datas);
				include('../Controllers/logout.php');
				//header("location: ../index.php?page=settings&nb=deux&change=sup");
			}
		}
	}
?>