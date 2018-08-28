<?php
	function search_pw($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('SELECT*
								FROM users
								WHERE id_user=:id');
		$reponse->execute(['id'=>$data['id']]);
		$a=0;
		while($donnees=$reponse->fetch())
	    {
	    	if($donnees['pw']==$data['pw'])
	    	{
	    		$a=1;
	    	}
		}
		return $a;
	}
	function search_id_art($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('SELECT*
								FROM artists
								WHERE artist_name=:pseudo');
		$reponse->execute(['pseudo'=>$data['nom']]);
		$a=0;
		while($donnees=$reponse->fetch())
	    {
	    	if($donnees['artist_name']==$data['nom'])
	    	{
	    		$a=$donnees['id_artist'];
	    	}
		}
		return $a;	
	}
	function search_pseudo_user($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->query('SELECT*
							FROM users');
		$a=0;
		while($donnees=$reponse->fetch()) 
	    {
	    	if($donnees['username']==$data['pseudo'])
	    	{
	    		$a=1;
	    	}
		}
		return $a;
	}
	function search_pseudo_art($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->query('SELECT*
							FROM artists');
		$a=0;
		while($donnees=$reponse->fetch()) 
	    {
	    	if($donnees['artist_name']==$data['pseudo'])
	    	{
	    		$a=1;
	    	}
		}
		return $a;
	}
	function update_pseudo_user($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('UPDATE users 
								SET username=:pseudo 
								WHERE id_user=:id');
		$reponse->execute(array(
							'pseudo'=>$data['pseudo'], 
							'id'=>$_SESSION['id']));
	}
	function update_pseudo_art($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('UPDATE artists
								SET artist_name=:pseudo 
								WHERE id_artist=:id');
		$reponse->execute(array(
							'pseudo'=>$data['pseudo'], 
							'id'=>$data['id']));
	}
	function update_statut($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('UPDATE users 
								SET category=:statut 
								WHERE id_user=:id');
		$reponse->execute(array(
							'statut'=>$data['statut'], 
							'id'=>$_SESSION['id']));
	}
	function update_pw($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('UPDATE users 
								SET pw=:new_pw 
								WHERE id_user=:id');
		$reponse->execute(array(
							'new_pw'=>$data['new_pw'], 
							'id'=>$_SESSION['id']));
	}
	function insert_art($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('INSERT INTO artists(id_artist, artist_name, category)
								VALUES(:id, :pseudo, "amateur")');
		$reponse->execute(array(
							'id'=>NULL,
							'pseudo'=>$data['pseudo']));
	}
	function delete_art($data)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('DELETE
								FROM artists
								WHERE id_artist=:id');
		$reponse->execute(['id'=>$data['id']]);
		$reponse=$bdd->prepare('DELETE
								FROM musics
								WHERE artist_id=:id');
		$reponse->execute(['id'=>$data['id']]);
	}
	function delete_account($data, $datas)
	{
		include('Models/db_connect.php');
		$bdd = db_connect();
		//$bdd=new PDO('mysql:host=localhost;dbname=mystudio;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		$reponse=$bdd->prepare('DELETE
								FROM users
								WHERE id_user=:id');
		$reponse->execute(['id'=>$_SESSION['id']]);
		$reponse=$bdd->prepare('DELETE
								FROM musics
								WHERE artist_id=:id');
		$reponse->execute(['id'=>$data['id']]);
		for($i=0;$i<$datas[2][0];$i++)
		{
			$reponse=$bdd->prepare('DELETE 
									FROM albums 
									WHERE id_album=:id');
			$reponse->execute(['id'=>$datas[0][$i]]);
		}
		$reponse=$bdd->prepare('DELETE
								FROM artists
								WHERE id_artist=:id');
		$reponse->execute(['id'=>$data['id']]);
	}
?>
