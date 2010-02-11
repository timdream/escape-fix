<?php
	require('php-utf8/utf8.inc');

	$name = $argv[1];

	$s = file_get_contents($name);
	#$s = '<!ENTITY new.label              "\u958b\u65b0\u6a94\u6848">';
	$r = '';
	for ($i = 0; $i < strlen($s); $i ++ ) {
		if (substr($s,$i,2) === '\\u') {
			#echo substr($s, $i+2, 4);
			$a = array(
				intval(substr($s, $i+2, 4), 16)
			);
			$r .= unicodeToUtf8($a);
			$i += 5;
		} else {
			$r .= substr($s, $i, 1);
		}
	}
	file_put_contents($name, $r);
	print $r;

exit(0);

?>
