<?php
/*
* Function qui génère une table html de resultats scolaire .
*
* @Params : $notes = Tableau contenant les notes des éléves associé à leurs noms (["john" => [10,12,15,19]])
*
* @Return : Une chaine de caractère contenant le code html du tableau de notes sous la forme : 
* 			<table>
*				<th><td>Prénom</td><td>Note Minimale</td><td>Note Maximale</td><td>Moyenne</td></th>
*			</table>
*/
function GenerateTableNote(Array $notes) {
	if (empty($notes)) return "";

	$strTables = '<table>';
	$strTables .= "\t".'<th><td>Prénom</td><td>Note Minimale</td><td>Note Maximale</td><td>Moyenne</td></th>'."\n";

	foreach ($notes as $eleve => $note) {
		// Si l'élève existe
		if (is_string($eleve) && $eleve != '') {
			// et qu'il a au moins une note
			if (is_array($note) && count($note) > 0) {
				$strTables .= "\t".'<th><td>'.$eleve.'</td><td>'.min($note).'</td><td>'.max($note).'</td><td>'.round((1.0*array_sum($note)/count($note)), 2).'</td></th>'."\n";
			} else {
				$strTables .= "\t".'<th><td>'.$eleve.'</td><td>NC</td><td>NC</td><td>NC</td></th>'."\n";
			}
		}
	}
	$strTables .= '</table>'."\n";

	return $strTables;
}

/*
* Calcule le factoriel d'un nombre
*
* @Params : $nombre : Entier à mettre en factoriel
*
* @Return : Int $nombre * ($nombre - 1) * ... * 2 * 1
*/
function factR(Int $n) {
	/* On utilise une fonction récurente (qui s'apelle elle même)
	** ici il s'agit de fact(n) = n * fact(n - 1)
	** exemple fact(3) = 3 * 2 * 1 et fact(2) = 2 * 1 
	** Donc fact(3) = 3 * (2 * 1) = 3 * fact(2)
	** CQFD
	*/
	if ($n == 1) return 1;
	else return ($n * factR($n - 1));
}
function fact(Int $nombre ) {
	if ($nombre < 1 or $nombre > 20) return 1;
	else return factR($nombre);
}
/*
** Calcule combien de fois le factoriel d'un nombre est divisible par 10
**
** @Params : $nombre : entier inférieur à 20 (au dela, fact($nombre) renvoie un réel)
**
** @Return : un entier correspondant au nombre de zéro finissant le nombre calculé
*/
function nbTrailingZeroes(Int $nombre){
	if ($nombre < 5 or $nombre > 20) return 0;
	$fact = fact($nombre);
	$nb0 = 0;
	while ($fact % 10 == 0 && $fact >= 10) {
		$nb0++;
		$fact /= 10;
	}
	return $nb0;
}

// La même en version récurrente
function nb0TailR(Int $n) {
	if ($n % 10 != 0 or $n < 10) return 0;
	else return (1 + nb0TailR($n/10));
}
function nbTrailingZeroesR(Int $nombre){
	if ($nombre < 5 or $nombre > 20) return 0;
	else return nb0TailR(fact($nombre));
}

/*
echo GenerateTableNote(["john" => [10,12,15,19], "michel" => [3, 15, 6, 19], "bernard"=>[3,5,9], "pascal"=>[12,16,9,18]]);
echo fact(5)."\n";
for ($i=0; $i < 21; $i++) { 
	echo 'fact('.$i.') = '.fact($i).' ce qui donne '.nbTrailingZeroes($i).' zéro'."\n";
}
for ($i=0; $i < 21; $i++) { 
	echo 'fact('.$i.') = '.fact($i).' ce qui donne '.nbTrailingZeroesR($i).' zéro'."\n";
}
*/
?>