<?php

function plusGrandGap(Array $tab) {
	if (empty($tab)) return 0;
	$taille = count($tab);
	$gap = 0;
	for($i = 0; $i < $taille -1; $i++) {
		if (abs($tab[$i] - $tab[$i+1]) > $gap) $gap = abs($tab[$i] - $tab[$i+1]);
	}
	return $gap;
}
?>