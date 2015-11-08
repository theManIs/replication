<?php
function str_rand($len, $alphabet = 'qwertyuiopasdfghjklzxcvbnm0987654321') {
	for ($i = 0, $r = NULL, $r =& $random; $i < $len; $i++) 
		$r .= $alphabet[mt_rand(0, strlen($alphabet)-1)];
	return $random;
}

echo str_rand(32);
?>

