<?php
function decryptage ($mot) {
/*
	$a1 = str_split($mot);
	$a2 = $a1;
	$point = false;
		$a = 1;
	for($i=0;$i<count($a1);$i++) {
	
		if($a1[$i] == ".") {
			$point = true;
			$i++;
		}
		if($point == true) {
			// Stockage de la lettre précedant le point et de sa place
			$e = $a2[$a2[$i+1]];
			$p = $a2[$i+1];
			// substitution de la lettre précedant le point par celle qui est après le point
			$a2[$a2[$i+1]] = $a2[$i];
			//supression de la lettre apres le point et de sa place
			unset($a2[$i]);
			unset($a2[$i+1]);
			//replacage de la lettre stocker a sa place
			$l = implode("", $a2);
			$pos = strlen($l)-($p)-1;
			$sub = substr($l, 0, -$pos).$e.substr($l, -$pos);
			$a2 = str_split($sub);
			
		}
	}

	array_shift($a2);
*/
$lettres = array("a", "b",  "c",  "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

$tab= [];
$a2 = str_split($mot);
$j = count($a2);
$j=$j-1;
foreach($a2 as $i => $val) {
        array_push($tab, $a2[$j]);
        $j=$j-1;
}

//print_r($tab);
$i = 0;
foreach($tab as $i => $val) {
	foreach($lettres as $j => $valeur) {
                if($tab[$i] === $valeur) {
                        $tab[$i] = $lettres[$j-2];
                        break;
                }
        }
        $i++;
}
$value = implode($tab);
return $value;
}
