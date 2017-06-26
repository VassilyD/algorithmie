<?php
$valeur = ['As','2','3','4','5','6','7','8','9','10','Valet','Dame','Roi'];
$couleur = ['Coeur','Pique','Carreau','Trefle'];
//$carte = [];
for ($i = 0; $i < count($valeur)*count($couleur); $i++) {
	$carte[$i] = $valeur[$i%count($valeur)].' de '.$couleur[$i/count($valeur)]."\n";
}
print_r($carte);
?>