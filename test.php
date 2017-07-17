<?php
/*$i = 0;
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
while (true) {
	/*for($i1 = 0; $i1 < $n; $i1++) {

		$c = ($i % 2 == 0)?'@':' ';
		echo $c;
	}*/
	for($i = 1; $i <= $j && $i < 75; $i++) {
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

/**
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