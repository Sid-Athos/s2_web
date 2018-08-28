<?php
function cryptage ($POST) {
	
/*
	$a1 = str_split($value);
	$a2 = $a1;
	array_push($a2, ".");
	$key = array();
	$lettres = array("a", "e", "i", "n", "s", "t", "l", "r");
	for($i=0;$i<count($a1);$i++) {
		for($j=0;$j<count($lettres);$j++) {
			if($lettres[$j] == $a1[$i]) {
				array_push($a2, $a1[$i].$i);
				//array_push($key, (string)$i);
				unset($a2[$i]);
				array_values($a2);
			}
		}
	}
	$value = implode($a2);
	//$value1 = implode($key);
*/ 
$lettres = array("a", "b",  "c",  "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
//echo "<br><br><br><br><br><br>";
$tab = str_split($_POST['password']);
foreach($tab as $i => $val) {
        foreach($lettres as $j => $valeur) {
                if($tab[$i] === $valeur) {
                        $tab[$i] = $lettres[$j+2];
		//print_r($tab);
			break;
                }
        }
        $i++;
}
$a2 = [];
$j = count($tab);
//echo $j;
$j=$j-1;
foreach($tab as $i => $val) {
	array_push($a2, $tab[$j]);
	$j=$j-1;
}
$value = implode($a2);
return $value;
}
?>
