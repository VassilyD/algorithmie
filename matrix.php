<?php
while(true) {
	for($i = 0; $i < 100; $i++) {
		echo chr(rand(33,127));
	}
	usleep(100000);
	echo "\n";
}
?>