<?php

function inscription () { 

require_once('modele_insert.php');
require_once('modele_search_pseudo.php');


//traitement du formulaire:
if(isset($_POST['pseudo'],$_POST['mdp'],$_POST['conf'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['pseudo'])){//le champ pseudo est vide, on arrête l'exécution du script et on affiche un message d'erreur
         return 0;
    } elseif(!preg_match("#^[a-z0-9]+$#",$_POST['pseudo'])){
         return 1;
    } elseif(strlen($_POST['pseudo'])<5){//le pseudo est trop court, au moins 6 caractères.
         return 2;
    } elseif(empty($_POST['mdp'])){//le champ mot de passe est vide
        return 3;
    } elseif(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $_POST['mdp'])){//Le Mot de passe n'est pas conforme.
        return 4;   
    } elseif(empty($_POST['conf'])){//le champ de confirmation est vide
       return 5;
    } elseif($_POST['conf'] !== $_POST['mdp']){//Mauvaise confirmation
         return 6;
    } elseif(mysqli_num_rows(mysqli_query($mysqli,search_pseudo($_POST['pseudo'])))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
         return 7;
    } else {

        if(!mysqli_query($mysqli,insert($_POST['pseudo'],$_POST['mdp'],$_POST['Type']))) {
       return 8;
        } else {
		//on affiche plus le formulaire
            return 9;
    	}


	}

}
}

?>
