<?php
function genSelect(Array $choix) {
	$str = "<select>";
	foreach ($choix as $key => $value) {
		$str .= "\t".genOption($key+1, $value)."\n";
	}
	$str .= "</select>";
	return $str;
}
?>