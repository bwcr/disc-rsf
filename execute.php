<?php
require_once('connection.php');

$i = 190;
while ($i <= 192) {
	$answer = 'answer-'.$i;
	$insert = $koneksi->query("SELECT `$answer` FROM `data_diri` WHERE `id` = $i");
	$i++;
}
if($insert){
		return true;
	}
	else{
		return false;
	}

?>