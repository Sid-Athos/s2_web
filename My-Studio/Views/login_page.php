<?php
require('Controllers/login.php');
if(conect($_POST['pseudo'], $_POST['password']) == 0) {
	echo "<br><br><br><br><br><br><br><br><br><br><br><center>La connexion est un succès<br><a href='index.php?page=accueil_membres'>Cliques ici</a></center>";
        //header("Location:index.php?page=accueil_membres");
} else {
echo"<br><br><br><br><br><br><br><center><h3>Bienvenue sur Mystudio</h3></center><p class='txt' ><td class='case' >MyStudio est une plateforme de diffusion de<br>musique de tous genres en streaming où artistes<br>et auditeurs se croisent.<br>Elle est destinée aux auditeurs de langue française<br>qui aiment avoir toutes les informations disponibles<br>sur leurs artistes favoris, paroles, biographies, et <br>collaborateurs fréquents.<br>
Les utilisateurs doivent s’inscrire pour accéder au site.<br> Les auditeurs peuvent écouter et apprécier les morceaux<br>de leurs artistes préférés, mais aussi profiter des paroles<br>qui sont accompagnées des traductions.<br>
    Lors de la création d’un compte utilisateur, il est possible<br>de s’enregistrer en tant qu’artiste et ainsi de diffuser ses<br>créations ou de créer un compte auditeur qui permet<br>simplement d’écouter.
Le site propose également des<br>suggestions d’écoutes en fonction des goûts et des<br> précédentes visites du client.</td></p>
	<form class='form' action='' method='POST'>
	<input type='text' class='champ' id='pseudo' placeholder='Pseudo' name='pseudo' value='".$_POST['pseudo']."'>";
	if(conect($_POST['pseudo'], $_POST['password']) == 1) {
		echo "Le champ est vide";
	}else if(conect($_POST['pseudo'], $_POST['password']) == 2 || conect($_POST['pseudo'], $_POST['password']) == 6) {
		echo "Pseudo incorrect";
	}
	echo"<br>
	<input type='password' class='champ' id='mdp' placeholder='Mot de passe' name='password' value='".$_POST['password']."'>";
	if(conect($_POST['pseudo'], $_POST['password']) == 4) {
        echo "Le champ est vide";
	}else if(conect($_POST['pseudo'], $_POST['password']) == 5 || conect($_POST['pseudo'], $_POST['password']) == 6) {
		echo "Mot de passe incorrect";
	}
	echo"<br/>
	<input type='submit' name='send' value='envoyer' class='verif'>
        </form>
	<p class='msg'>as tu bien completer le formulaire avant de cliquer</p>
	<a class='href' href='index.php?page=register'>Créer un compte</a>
        <br>";
	
if(conect($_POST['pseudo'], $_POST['password']) == 3) {
}
}
?>
<!--Barre horizontale-->
<ul class="hori">
<li class="hori">
<a class="hori active" href="">MyStudio</a>
</li>
<li class="hori">
<img src='Views/images/LOGO.jpg'width='100' height='90'>
</li>
<li style="float:right">
<a class="hori1" href="">MyStudio, C'est quoi ?<!--Image--></a>
</li>
</ul>
<script src="Views/jquery.js"></script> 
<script src="Views/style.js"></script>
