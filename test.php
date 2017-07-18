<?php
/************************************
**** Suite d'essais infructueux *****
*************************************
$i = 0;
while(true) {
	$j = 0;
	while($j < $i) {
		echo $i.', '.$j.' -> '.($i | $j).' et '.($i & $j)."\n";
		$j++;
		usleep(100000);
	}
	$i++;
}
echo (2142 & 11325)."\n";*/
/*
function isPowerOf2(Int $n) {
	$two = 2;
	while($n > $two) {
		$two *=2;
	}
	return ($n == $two);
}

function prepareLigne(Int $j, Int $n, Int $m = 0) {
	//if ($m = 0) {
		$ligne = '';
		$loop = pow(2,($n-1));
		$lvl = ($j - $loop) / 2;
	//}

	if($m == $n) return $ligne;

	if($m <= $lvl || ($m > ($loop / 2) && $m <= (($loop / 2) + $lvl) ) ) {
		if($lvl < 2) {
			return ($j % 2 == 1)?'@ ':'@@';
		}
		if($n == 1) {
			return ($j % 2 == 1)?'@ ':'@@';
		}
		$ligne .= prepareLigne($j - $loop, $n - 1, $m);
	} else $ligne .= '  ';
	$ligne .= prepareLigne($j, $n, $m + 1);
	return $ligne;
}

$j = 1;
$n = 1;
$p = 2;
while (true) {*/
	/*for($i1 = 0; $i1 < $n; $i1++) {

		$c = ($i % 2 == 0)?'@':' ';
		echo $c;
	}*/
	/*for($i = 1; $i <= $j && $i < 75; $i++) {
		$l = $j - $p/2;
		if(	$i == 1 || 
			$i == $j || 
			($j == $p-1 && $i % 2 == 1) ||
			($i <= $l || $i > $j - $l)) echo 'o';
		else if(true) {
			echo ' ';
		}
	}
	usleep(100000);
	if ($j == $p) {
		$p*=2;
		$n++;
	}
	$j++;
	echo "\n";
}

function triSper(Int $l, Int $n) {
	if ($n == 1) {
		return ($l % 2 == 1)?'@ ':'@@';
	} 
	else {
		return triSper($l, $n-1).triSper($l, $n-1);
	}
}
//*/

/************************************
******** Première réussite **********
** Mais peut s'avéré gourmande en mémoire sur un très grand triangle
*************************************
$triangle = [];
$triangle[] = '@';
$i = 0;
$p = 1;
while(true) {
	echo $triangle[$i]."\n";
	$i++;
	if($i == $p) {
		$p *= 2;
		$temp = [];
		foreach ($triangle as &$ligne) {
			$temp[] = $ligne.$ligne;
			$ligne = str_pad($ligne, $i*2);
		}
		$triangle = array_merge($triangle, $temp);

		foreach ($triangle as &$ligne) {
			if(strlen($ligne) >= 270) $ligne = substr($ligne, 0, 270);
		}

		if ($i >= 512) {
			unset($triangle);
			$triangle = [];
			$triangle[] = '@';
			$i = 0;
			$p = 1;
		}
	}
	usleep(100000);
}
// non mais euuuuuh
//*/



/************************************
***  Version finale Pouvant s'adapter facilement à des triangle de grande taille \o/
*************************************/
function getPos(Int $ligne) {
	$n = 1;
	while($n < $ligne) $n *= 2;
	return $ligne - $n/2;
}

function isSpace(Int $l, Int $p) {
	if($l <= 2 && $p <= $l) return false;
	$pos = getPos($l);
	if($p > $pos && $p <= $l - $pos) return true;
	else {
		if ($p <= $pos) return isSpace($pos, $p);
		else return isSpace($pos, ($p - ($l - $pos)));
	}
}

$ctab = ['@', '*', '+', '^', '°', '\\', '/', '='];
$c = '%';
$l = 1;
$n = 1;
while(true) {
	for($i = 1; $i <= $l && $i <= 270; $i++) {
		echo (isSpace($l, $i))?' ':chr(rand(33,127));
	}
	usleep(100000);
	echo "\n";
	$l++;
	if($l > pow(2, $n-1)) $n++;
}
// */
/**
$ctab[$n%8]
chr(rand(33,127))
$j - $p/2
isPowerOf2($l)
@   
@@  
@ @ 
@@@@
@   @
@@  @@
@ @ @ @
@@@@@@@@
@       @
@@      @@
@ @     @ @
@@@@    @@@@
@   @   @   @
@@  @@  @@  @@
@ @ @ @ @ @ @ @
@@@@@@@@@@@@@@@@
@               @
@@              @@
@ @             @ @
@@@@            @@@@
@   @           @   @
@@  @@          @@  @@
@ @ @ @         @ @ @ @
@@@@@@@@        @@@@@@@@
@       @       @       @
@@      @@      @@      @@
@ @     @ @     @ @     @ @
@@@@    @@@@    @@@@    @@@@
@   @   @   @   @   @   @   @
@@  @@  @@  @@  @@  @@  @@  @@
@ @ @ @ @ @ @ @ @ @ @ @ @ @ @ @
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//*/
?>