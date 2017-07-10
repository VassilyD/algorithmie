<?php
function isPangram(String $string)
{
    if($string == '') return false;
	$separation = '#[\s,\-_\d\\\\.]#';
	//$string = addslashes($string);
	$string = preg_replace($separation, '', $string);
	$string = strtolower($string);
	echo $string.' : ';
	$taille = strlen($string);
    if($taille < 26) return false;
    $alpha = 'abcdefghijklmnopqrstuvwxyz';
    $temp = strlen($alpha);
    $alphabet = [];
    for ($i = 0; $i < $temp; $i++)
    	$alphabet[$alpha[$i]] = false;

    for ($i = 0; $i < $taille; $i++) {
    	// Si la lettre en cours n'est pas check, alors on la check ^^
    	if(isset($alphabet[$string[$i]]) && !$alphabet[$string[$i]]) $alphabet[$string[$i]] = true;
    }

    $isPangram = true;
    foreach ($alphabet as $cheked) {
    	$isPangram = $isPangram && $cheked;
    }

    return $isPangram;
}

$test = ["", "the quick brown fox jumps over the lazy dog", "a quick movement of the enemy will jeopardize five gunboats", "the quick brown fish jumps over the lazy dog", 'the_quick_brown_fox_jumps_over_the_lazy_dog', 'the 1 quick brown fox jumps over the 2 lazy dogs', '7h3 qu1ck brown fox jumps ov3r 7h3 lazy dog', '\Five quacking Zephyrs jolt my wax bed.\\', 'Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich.', 'éléphant', 'papa'];
foreach ($test as $value) {
	if (isPangram($value)) echo $value.' : Yoloooooo'."\n";
	else echo $value.' : '."Bad triiiip\n";
}
?>