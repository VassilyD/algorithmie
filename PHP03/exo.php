<?php
	// Exercice 1
	$tab = ["john" => [10,12,15,19], "michel" => [3, 15, 6, 19], "bernard"=>[3,5,9], "pascal"=>[12,16,9,18]];

	// A partir de ce tableau, générez moi le tableau HTML suivant

?>
<table>
	<th><td>Prénom</td><td>Note Minimale</td><td>Note Maximale</td><td>Moyenne</td></th>
</table>



<?php
	//Exercice 2 : Implémentez une fonction qui calcule un factoriel.
	// Le factoriel de 10 est égal à 10 x 9 x 8 x 7 x 6 x 5 x 4 x 3 x 2 x 1
	function fact( $nombre ) {
	}
	echo fact(5), " est égal à 120" ;
?>


<?php
	// Exercice 3 : Nombre de derniers zeros
	// Fonction qui réalise le factoriel de $nombre et qui calcule le nombre de 0 finissant le nombre calculé
	function nbTrailingZeroes($nombre){
	}
	echo nbTrailingZeroes(1), " retourne 0";
	echo nbTrailingZeroes(5), " retourne 1";
	echo nbTrailingZeroes(10)," retourne 2";

?>
