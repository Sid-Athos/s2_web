<?php

function display_songs($donnees) {

	$form=array("RAP", "RAI", "RAGGAE", "RNB", "VARIETE", "JAZZ", "BLUES");
	echo"<div id='genre'>
	<table class='table_genre' border = 2 solid black><tr><td class='clicALL'>Divers</td>";
	for($i=0;$i<count($form);$i++) {
		if($i % 2 == 0) {
			echo "<td id='pair' class='clic".$form[$i]."'>".$form[$i]."</td>";
		}else{
			echo "<td id='impair' class='clic".$form[$i]."'>".$form[$i]."</td>";
		}
	}
	echo "</tr></table></div>";

	echo"<div class='ALL'>
	<table class='ligne' border = 1 solid black>
	<tr><td>Pochette</td><td>Titre</td><td>Album</td><td>Artiste</td><td>Date de sortie</td><td>Style</td></tr>";
	for($i=0;$i<count($donnees);$i++) {
		if($i % 2 == 0) {
			echo "<tr id='pair'>";
		}else{
			echo "<tr id='impair'>";
		}
		for($j=0;$j<count($donnees[$i]);$j++) {
			if($j == 0) {
				echo "<td><img width='20%' height='40%' src='".$donnees[$i][$j]."'></td>";
			}else{
				echo"<td>".$donnees[$i][$j]."</td>";
			}
		}
		echo "</tr>";
	}
	echo"</table></div>";
	for($p=0;$p<count($form);$p++) {
		echo"<div class='".$form[$p]."'>
		<table class='ligne' border = 1 solid black>
		<tr><td>Pochette</td><td>Titre</td><td>Album</td><td>Artiste</td><td>Date de sortie</td><td>Style</td></tr>";
		$t=0;
		for($k=0;$k<count($donnees);$k++) {

			if($donnees[$k][5] == $form[$p]) {
				if($t % 2 == 0) {
					echo "<tr id='pair'>";
				}else{
					echo "<tr id='impair'>";
				}
				for($j=0;$j<count($donnees[$k]);$j++) {
					if($j == 0) {
						echo "<td><img width='20%' height='40%' src='".$donnees[$k][$j]."'></td>";
					}else{
						echo"<td>".$donnees[$k][$j]."</td>";
					}
				}
				echo "</tr>";
				$t++;
			}
		}
		echo"</table></div><br><br><br><br><br><br><br><br><br>";
	}
}
?>
