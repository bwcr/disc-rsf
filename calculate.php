<?php
require_once('connection.php');

session_start();

if(!isset($id)) {
	if(isset(post('nama'), post('usia'), post('gender'), post('email'))){
		$nama = post('nama');
		$usia = post('usia');
		$jk = post('gender');
		$email = post('email');
	}
	else{
		header("Location: index.php");
	}
	if(isset(post('id_mitra'))){
		$id_mitra = post('id_mitra');
	}
	$ttlD = 0;
	$ttlI = 0;
	$ttlS = 0;
	$ttlC = 0;
	$pD = 0;
	$pI = 0;
	$pS = 0;
	$pC = 0;
	$pStar = 0;
	$kD = 0;
	$kI = 0;
	$kS = 0;
	$kC = 0;
	$kStar = 0;
	if(isset(post('p'), post('k')))
	{
		for($i=1; $i < 25; ++$i) {
			if(post('p')[$i] == 'D'){
				++$ttlD;
				++$pD;
			}
			if(post('p')[$i] == 'I'){
				++$ttlI;
				++$pI;
			}
			if(post('p')[$i] == 'S'){
				++$ttlS;
				++$pS;
			}
			if(post('p')[$i] == 'C'){
				++$ttlC;
				++$pC;
			}
			if(post('p')[$i] == '*'){
				++$pStar;
			}
		}
	
		for($i=1; $i < 25; ++$i) {
			if(post('k')[$i] == 'D'){
				--$ttlD;
				++$kD;
			}
			if(post('k')[$i] == 'I'){
				--$ttlI;
				++$kI;
			}
			if(post('k')[$i] == 'S'){
				--$ttlS;
				++$kS;
			}
			if(post('k')[$i] == 'C'){
				--$ttlC;
				++$kC;
			}
			if(post('k')[$i] == '*'){
				++$kStar;
			}
		}
	}
	
}

switch ($pD) {
	case '0':
	$ppD = -6;
	break;
	case '1':
	$ppD = -5.3;
	break;
	case '2':
	$ppD = -4;
	break;
	case '3':
	$ppD = -2.5;
	break;
	case '4':
	$ppD = -1.7;
	break;
	case '5':
	$ppD = -1.3;
	break;
	case '6':
	$ppD = 0;
	break;
	case '7':
	$ppD = 0.5;
	break;
	case '8':
	$ppD = 1;
	break;
	case '9':
	$ppD = 2;
	break;
	case '10':
	$ppD = 3;
	break;
	case '11':
	$ppD = 3.5;
	break;
	case '12':
	$ppD = 4;
	break;
	case '13':
	$ppD = 4.7;
	break;
	case '14':
	$ppD = 5.3;
	break;
	case '15':
	$ppD = 6.5;
	break;
	case '16':
	$ppD = 7;
	break;
	case '17':
	$ppD = 7;
	break;
	case '18':
	$ppD = 7;
	break;
	case '19':
	$ppD = 7.5;
	break;
	case '20':
	$ppD = 7.5;
	break;
	default:
	return false;
	break;
}

switch ($pI) {
	case '0':
	$ppI = -7;
	break;
	case '1':
	$ppI = -4.6;
	break;
	case '2':
	$ppI = -2.5;
	break;
	case '3':
	$ppI = -1.3;
	break;
	case '4':
	$ppI = 1;
	break;
	case '5':
	$ppI = 3;
	break;
	case '6':
	$ppI = 3.5;
	break;
	case '7':
	$ppI = 5.3;
	break;
	case '8':
	$ppI = 5.7;
	break;
	case '9':
	$ppI = 6;
	break;
	case '10':
	$ppI = 6.5;
	break;
	case '11':
	$ppI = 7;
	break;
	case '12':
	$ppI = 7;
	break;
	case '13':
	$ppI = 7;
	break;
	case '15':
	$ppI = 7;
	break;
	case '16':
	$ppI = 7.5;
	break;
	case '17':
	$ppI = 7.5;
	break;
	case '18':
	$ppI = 7.5;
	break;
	case '19':
	$ppI = 7.5;
	break;
	case '20':
	$ppI = 8;
	break;
	default:
	return false;
	break;
}

switch ($pS) {
	case '0':
	$ppS = -5.7;
	break;
	case '1':
	$ppS = -4.3;
	break;
	case '2':
	$ppS = -3.5;
	break;
	case '3':
	$ppS = -1.5;
	break;
	case '4':
	$ppS = -0.7;
	break;
	case '5':
	$ppS = 0.5;
	break;
	case '6':
	$ppS = 1;
	break;
	case '7':
	$ppS = 2.5;
	break;
	case '8':
	$ppS = 3;
	break;
	case '9':
	$ppS = 4;
	break;
	case '10':
	$ppS = 4.6;
	break;
	case '11':
	$ppS = 5;
	break;
	case '12':
	$ppS = 5.7;
	break;
	case '13':
	$ppS = 6;
	break;
	case '14':
	$ppS = 6.5;
	break;
	case '15':
	$ppS = 6.5;
	break;
	case '16':
	$ppS = 7;
	break;
	case '17':
	$ppS = 7;
	break;
	case '18':
	$ppS = 7;
	break;
	case '19':
	$ppS = 7.5;
	break;
	case '20':
	$ppS = 7.5;
	break;
	default:
	return false;
	break;
}

switch ($pC) {
	case '0':
	$ppC = -6;
	break;
	case '1':
	$ppC = -4.7;
	break;
	case '2':
	$ppC = -3.5;
	break;
	case '3':
	$ppC = -1.5;
	break;
	case '4':
	$ppC = 0.5;
	break;
	case '5':
	$ppC = 2;
	break;
	case '6':
	$ppC = 3;
	break;
	case '7':
	$ppC = 5.3;
	break;
	case '8':
	$ppC = 5.7;
	break;
	case '9':
	$ppC = 6;
	break;
	case '10':
	$ppC = 6.3;
	break;
	case '11':
	$ppC = 6.5;
	break;
	case '12':
	$ppC = 6.7;
	break;
	case '13':
	$ppC = 7;
	break;
	case '14':
	$ppC = 7.3;
	break;
	case '15':
	$ppC = 7.3;
	break;
	case '16':
	$ppC = 7.3;
	break;
	case '17':
	$ppC = 7.5;
	break;
	case '18':
	$ppC = 8;
	break;
	case '19':
	$ppC = 8;
	break;
	case '20':
	$ppC = 8;
	break;
	default:
	return false;
	break;
}

switch ($kD) {
	case '0':
	$kkD = 7.5;
	break;
	case '1':
	$kkD = 6.5;
	break;
	case '2':
	$kkD = 4.3;
	break;
	case '3':
	$kkD = 2.5;
	break;
	case '4':
	$kkD = 1.5;
	break;
	case '5':
	$kkD = 0.5;
	break;
	case '6':
	$kkD = 0;
	break;
	case '7':
	$kkD = -1.3;
	break;
	case '8':
	$kkD = -1.5;
	break;
	case '9':
	$kkD = -2.5;
	break;
	case '10':
	$kkD = -3;
	break;
	case '11':
	$kkD = -3.5;
	break;
	case '12':
	$kkD = -4.3;
	break;
	case '13':
	$kkD = -5.3;
	break;
	case '14':
	$kkD = -5.7;
	break;
	case '15':
	$kkD = -6;
	break;
	case '16':
	$kkD = -6.5;
	break;
	case '17':
	$kkD = 6.7;
	break;
	case '18':
	$kkD = 7;
	break;
	case '19':
	$kkD = -7.3;
	break;
	case '20':
	$kkD = -7.5;
	break;
	default:
	return false;
	break;
}

switch ($kI) {
	case '0':
	$kkI = 7;
	break;
	case '1':
	$kkI = 6;
	break;
	case '2':
	$kkI = 4;
	break;
	case '3':
	$kkI = 2.5;
	break;
	case '4':
	$kkI = 0.5;
	break;
	case '5':
	$kkI = 0;
	break;
	case '6':
	$kkI = -2;
	break;
	case '7':
	$kkI = -3.5;
	break;
	case '8':
	$kkI = -4.3;
	break;
	case '9':
	$kkI = -5.3;
	break;
	case '10':
	$kkI = -6;
	break;
	case '11':
	$kkI = -6.5;
	break;
	case '12':
	$kkI = -7;
	break;
	case '13':
	$kkI = -7.2;
	break;
	case '14':
	$kkI = -7.2;
	break;
	case '15':
	$kkI = -7.2;
	break;
	case '16':
	$kkI = -7.3;
	break;
	case '17':
	$kkI = -7.3;
	break;
	case '18':
	$kkI = -7.3;
	break;
	case '19':
	$kkI = -7.3;
	break;
	case '20':
	$kkI = -8;
	break;
	default:
	return false;
	break;
}

switch ($kS) {
	case '0':
	$kkS = 7.5;
	break;
	case '1':
	$kkS = 7;
	break;
	case '2':
	$kkS = 6;
	break;
	case '3':
	$kkS = 4;
	break;
	case '4':
	$kkS = 2.5;
	break;
	case '5':
	$kkS = 1.5;
	break;
	case '6':
	$kkS = 0.5;
	break;
	case '7':
	$kkS = -1.3;
	break;
	case '8':
	$kkS = -2;
	break;
	case '9':
	$kkS = -3;
	break;
	case '10':
	$kkS = -4.3;
	break;
	case '11':
	$kkS = -5.3;
	break;
	case '12':
	$kkS = -6;
	break;
	case '13':
	$kkS = -6.5;
	break;
	case '14':
	$kkS = -6.7;
	break;
	case '15':
	$kkS = -6.7;
	break;
	case '16':
	$kkS = -7;
	break;
	case '17':
	$kkS = -7.2;
	break;
	case '18':
	$kkS = -7.3;
	break;
	case '19':
	$kkS = -7.5;
	break;
	case '20':
	$kkS = -8;
	break;
	default:
	return false;
	break;
}

switch ($kC) {
	case '0':
	$kkC = 7.5;
	break;
	case '1':
	$kkC = 7;
	break;
	case '2':
	$kkC = 5.6;
	break;
	case '3':
	$kkC = 4;
	break;
	case '4':
	$kkC = 2.5;
	break;
	case '5':
	$kkC = 1.5;
	break;
	case '6':
	$kkC = 0.5;
	break;
	case '7':
	$kkC = 0;
	break;
	case '8':
	$kkC = -1.3;
	break;
	case '9':
	$kkC = -2.5;
	break;
	case '10':
	$kkC = -3.5;
	break;
	case '11':
	$kkC = -5.3;
	break;
	case '12':
	$kkC = -5.7;
	break;
	case '13':
	$kkC = -6;
	break;
	case '14':
	$kkC = -6.5;
	break;
	case '15':
	$kkC = -7;
	break;
	case '16':
	$kkC = -7.3;
	break;
	case '17':
	$kkC = -7.5;
	break;
	case '18':
	$kkC = -7.7;
	break;
	case '19':
	$kkC = -7.9;
	break;
	case '20':
	$kkC = -8;
	break;
	default:
	return false;
	break;
}

switch ($ttlD) {
	case '-22':
	$ttllD = -8;
	break;
	case '-21':
	$ttllD = -7.5;
	break;
	case '-20':
	$ttllD = -7;
	break;
	case '-19':
	$ttllD = -6.8;
	break;
	case '-18':
	$ttllD = -6.75;
	break;
	case '-17':
	$ttllD = -6.7;
	break;
	case '-16':
	$ttllD = -6.5;
	break;
	case '-15':
	$ttllD = -6.3;
	break;
	case '-14':
	$ttllD = -6.1;
	break;
	case '-13':
	$ttllD = -5.9;
	break;
	case '-12':
	$ttllD = -5.7;
	break;
	case '-11':
	$ttllD = -5.3;
	break;
	case '-10':
	$ttllD = -4.3;
	break;
	case '-9':
	$ttllD = -3.5;
	break;
	case '-8':
	$ttllD = -3.25;
	break;
	case '-7':
	$ttllD = -3;
	break;
	case '-6':
	$ttllD = -2.75;
	break;
	case '-5':
	$ttllD = -2.5;
	break;
	case '-4':
	$ttllD = -1.5;
	break;
	case '-3':
	$ttllD = -1;
	break;
	case '-2':
	$ttllD = -0.5;
	break;
	case '-1':
	$ttllD = -0.25;
	break;
	case '0':
	$ttllD = 0;
	break;
	case '1':
	$ttllD = 0.5;
	break;
	case '2':
	$ttllD = 0.7;
	break;
	case '3':
	$ttllD = 1;
	break;
	case '4':
	$ttllD = 1.3;
	break;
	case '5':
	$ttllD = 1.5;
	break;
	case '6':
	$ttllD = 2;
	break;
	case '7':
	$ttllD = 2.5;
	break;
	case '8':
	$ttllD = 3.5;
	break;
	case '9':
	$ttllD = 4;
	break;
	case '10':
	$ttllD = 4.7;
	break;
	case '11':
	$ttllD = 4.85;
	break;
	case '12':
	$ttllD = 5;
	break;
	case '13':
	$ttllD = 5.5;
	break;
	case '14':
	$ttllD = 6;
	break;
	case '15':
	$ttllD = 6.3;
	break;
	case '16':
	$ttllD = 6.5;
	break;
	case '17':
	$ttllD = 6.7;
	break;
	case '18':
	$ttllD = 7;
	break;
	case '19':
	$ttllD = 7.3;
	break;
	case '20':
	$ttllD = 7.3;
	break;
	case '21':
	$ttllD = 7.5;
	break;
	case '22':
	$ttllD = 8;
	break;
	default:
	return false;
	break;
}

switch ($ttlI) {
	case '-22':
	case '-21':
	case '-20':
	case '-19':
	$ttllI = -8;
	break;
	case '-18':
	$ttllI = -7;
	break;
	case '-17':
	case '-16':
	case '-15':
	case '-14':
	case '-13':
	case '-12':
	case '-11':
	$ttllI = -6.7;
	break;
	case '-9':
	$ttllI = -6;
	break;
	case '-8':
	$ttllI = -5.7;
	break;
	case '-7':
	$ttllI = -4.7;
	break;
	case '-6':
	$ttllI = -4.3;
	break;
	case '-5':
	$ttllI = -3.5;
	break;
	case '-4':
	$ttllI = -3;
	break;
	case '-3':
	$ttllI = -2;
	break;
	case '-2':
	$ttllI = -1.5;
	break;
	case '-1':
	$ttllI = 0;
	break;
	case '0':
	$ttllI = 0.5;
	break;
	case '1':
	$ttllI = 1;
	break;
	case '2':
	$ttllI = 1.5;
	break;
	case '3':
	$ttllI = 3;
	break;
	case '4':
	$ttllI = 4;
	break;
	case '5':
	$ttllI = 4.3;
	break;
	case '6':
	$ttllI = 5;
	break;
	case '7':
	$ttllI = 5.5;
	break;
	case '8':
	$ttllI = 6.5;
	break;
	case '9':
	$ttllI = 6.7;
	break;
	case '10':
	$ttllI = 7;
	break;
	case '11':
	case '12':
	case '13':
	case '14':
	case '15':
	case '16':
	case '17':
	$ttllI = 7.3;
	break;
	case '18':
	$ttllI = 7.5;
	break;
	case '19':
	case '20':
	case '21':
	case '22':
	$ttllI = 8;
	break;
	default:
	return false;
	break;
}

switch ($ttlS) {
	case '-22':
	case '-21':
	case '-20':
	case '-19':
	$ttllS = -8;
	break;
	case '-18':
	$ttllS = -7.5;
	break;
	case '-17':
	case '-16':
	$ttllS = -7.3;
	break;
	case '-15':
	$ttllS = -7;
	break;
	case '-14':
	case '-13':
	case '-12':
	case '-11':
	$ttllS = -6.5;
	break;
	case '-10':
	$ttllS = -6;
	break;
	case '-9':
	$ttllS = -4.7;
	break;
	case '-8':
	$ttllS = -4.3;
	break;
	case '-7':
	$ttllS = -3.5;
	break;
	case '-6':
	$ttllS = -3;
	break;
	case '-5':
	$ttllS = -2;
	break;
	case '-4':
	$ttllS = -1.5;
	break;
	case '-3':
	$ttllS = -1;
	break;
	case '-2':
	$ttllS = -0.5;
	break;
	case '-1':
	$ttllS = 0;
	break;
	case '0':
	$ttllS = 1;
	break;
	case '1':
	$ttllS = 1.5;
	break;
	case '2':
	$ttllS = 2;
	break;
	case '3':
	$ttllS = 3;
	break;
	case '4':
	$ttllS = 3.5;
	break;
	case '5':
	$ttllS = 4;
	break;
	case '6':
	$ttllS = 0;
	break;
	case '7':
	$ttllS = 4.7;
	break;
	case '8':
	$ttllS = 5;
	break;
	case '9':
	$ttllS = 5.5;
	break;
	case '10':
	$ttllS = 6;
	break;
	case '11':
	$ttllS = 6.2;
	break;
	case '12':
	$ttllS = 6.3;
	break;
	case '13':
	$ttllS = 6.5;
	break;
	case '14':
	$ttllS = 6.7;
	break;
	case '15':
	$ttllS = 7;
	break;
	case '16':
	case '17':
	case '18':
	case '19':
	$ttllS = 7.3;
	break;
	case '20':
	$ttllS = 7.5;
	break;
	case '21':
	case '22':
	$ttllS = 8;
	break;
	default:
	return false;
	break;
}

switch ($ttlC) {
	case '-22':
	$ttllC = -7.5;
	break;
	case '-21':
	$ttllC = -7.3;
	break;
	case '-20':
	$ttllC = -7.3;
	break;
	case '-19':
	$ttllC = -7;
	break;
	case '-18':
	case '-17':
	case '-16':
	$ttllC = -6.7;
	break;
	case '-15':
	$ttllC = -6.5;
	break;
	case '-14':
	$ttllC = -6.3;
	break;
	case '-13':
	$ttllC = -6;
	break;
	case '-12':
	case '-11':
	$ttllC = -5.85;
	break;
	case '-10':
	$ttllC = -5.7;
	break;
	case '-9':
	$ttllC = -4.7;
	break;
	case '-8':
	$ttllC = -4.3;
	break;
	case '-7':
	$ttllC = -3.5;
	break;
	case '-6':
	$ttllC = -3;
	break;
	case '-5':
	$ttllC = -2.5;
	break;
	case '-4':
	$ttllC = -0.5;
	break;
	case '-3':
	$ttllC = 0;
	break;
	case '-2':
	$ttllC = 0.3;
	break;
	case '-1':
	$ttllC = 0.5;
	break;
	case '0':
	$ttllC = 1.5;
	break;
	case '1':
	$ttllC = 3;
	break;
	case '2':
	$ttllC = 4;
	break;
	case '3':
	$ttllC = 4.3;
	break;
	case '4':
	$ttllC = 5.5;
	break;
	case '5':
	$ttllC = 5.7;
	break;
	case '6':
	$ttllC = 6;
	break;
	case '7':
	$ttllC = 6.3;
	break;
	case '8':
	$ttllC = 6.5;
	break;
	case '9':
	$ttllC = 6.7;
	break;
	case '10':
	$ttllC = 7;
	break;
	case '11':
	case '12':
	case '13':
	case '14':
	case '15':
	case '16':
	$ttllC = 7.3;
	break;
	case '17':
	$ttllC = 7.5;
	break;
	case '18':
	case '19':
	case '20':
	case '21':
	case '22':
	$ttllC = 8;
	break;
	default:
	return false;
	break;
}

$discp = array($ppD, $ppI, $ppS, $ppC);
//print_r($discp);
$discp = array_filter($discp, function($p) { return $p > 0; });
rsort($discp);
//print_r($discp);
switch ($discp) {
	case array($ppC):
	$infop = 1;
	break;
	case array($ppD):
	$infop = 2;
	break;
	case array($ppC, $ppD):
	$infop = 3;
	break;
	case array($ppI, $ppD):
	$infop = 4;
	break;
	case array($ppI, $ppD, $ppC):
	$infop = 5;
	break;
	case array($ppI, $ppD, $ppS):
	$infop = 6;
	break;
	case array($ppI, $ppS, $ppD):
	$infop = 7;
	break;
	case array($ppS, $ppD, $ppC):
	$infop = 8;
	break;
	case array($ppD, $ppI):
	$infop = 9;
	break;
	case array($ppD, $ppI, $ppS):
	$infop = 10;
	break;
	case array($ppD, $ppS):
	$infop = 11;
	break;
	case array($ppC, $ppI, $ppS):
	$infop = 12;
	break;
	case array($ppC, $ppS, $ppI):
	$infop = 13;
	break;
	case array($ppI, $ppS, $ppC):
	$infop = 14;
	break;
	case array($ppS):
	$infop = 15;
	break;
	case array($ppC, $ppS):
	$infop = 16;
	break;
	case array($ppS, $ppC):
	$infop = 17;
	break;
	case array($ppD, $ppC):
	$infop = 18;
	break;
	case array($ppD, $ppI, $ppC):
	$infop = 19;
	break;
	case array($ppD, $ppS, $ppI):
	$infop = 20;
	break;
	case array($ppD, $ppS, $ppC):
	$infop = 21;
	break;
	case array($ppD, $ppI, $ppI):
	$infop = 22;
	break;
	case array($ppD, $ppC, $ppS):
	$infop = 23;
	break;
	case array($ppI):
	$infop = 24;
	break;
	case array($ppI, $ppS):
	$infop = 25;
	break;
	case array($ppI, $ppC):
	$infop = 26;
	break;
	case array($ppI, $ppC, $ppD):
	$infop = 27;
	break;
	case array($ppI, $ppC, $ppS):
	$infop = 28;
	break;
	case array($ppS, $ppD):
	$infop = 29;
	break;
	case array($ppS, $ppI):
	$infop = 30;
	break;
	case array($ppS, $ppD, $ppI):
	$infop = 31;
	break;
	case array($ppS, $ppI, $ppD):
	$infop = 32;
	break;
	case array($ppS, $ppI, $ppC):
	$infop = 33;
	break;
	case array($ppS, $ppC, $ppD):
	$infop = 34;
	break;
	case array($ppS, $ppC, $ppI):
	$infop = 35;
	break;
	case array($ppC, $ppI):
	$infop = 36;
	break;
	case array($ppC, $ppD, $ppI):
	$infop = 37;
	break;
	case array($ppC, $ppD, $ppS):
	$infop = 38;
	break;
	case array($ppC, $ppI, $ppD):
	$infop = 39;
	break;
	case array($ppC, $ppS, $ppD):
	$infop = 40;
	break;
	default:
	return false;
	break;
}

$disck = array($kkD, $kkI, $kkS, $kkC);
//print_r($discp);
$disck = array_filter($disck, function($p) { return $p > 0; });
rsort($disck);
switch ($disck) {
	case array($kkC):
	$infok = 1;
	break;
	case array($kkD):
	$infok = 2;
	break;
	case array($kkC, $kkD):
	$infok = 3;
	break;
	case array($kkI, $kkD):
	$infok = 4;
	break;
	case array($kkI, $kkD, $kkC):
	$infok = 5;
	break;
	case array($kkI, $kkD, $kkS):
	$infok = 6;
	break;
	case array($kkI, $kkS, $kkD):
	$infok = 7;
	break;
	case array($kkS, $kkD, $kkC):
	$infok = 8;
	break;
	case array($kkD, $kkI):
	$infok = 9;
	break;
	case array($kkD, $kkI, $kkS):
	$infok = 10;
	break;
	case array($kkD, $kkS):
	$infok = 11;
	break;
	case array($kkC, $kkI, $kkS):
	$infok = 12;
	break;
	case array($kkC, $kkS, $kkI):
	$infok = 13;
	break;
	case array($kkI, $kkS, $kkC):
	$infok = 14;
	break;
	case array($kkS):
	$infok = 15;
	break;
	case array($kkC, $kkS):
	$infok = 16;
	break;
	case array($kkS, $kkC):
	$infok = 17;
	break;
	case array($kkD, $kkC):
	$infok = 18;
	break;
	case array($kkD, $kkI, $kkC):
	$infok = 19;
	break;
	case array($kkD, $kkS, $kkI):
	$infok = 20;
	break;
	case array($kkD, $kkS, $kkC):
	$infok = 21;
	break;
	case array($kkD, $kkC, $kkI):
	$infok = 22;
	break;
	case array($kkD, $kkC, $kkS):
	$infok = 23;
	break;
	case array($kkI):
	$infok = 24;
	break;
	case array($kkI, $kkS):
	$infok = 25;
	break;
	case array($kkI, $kkC):
	$infok = 26;
	break;
	case array($kkI, $kkC, $kkD):
	$infok = 27;
	break;
	case array($kkI, $kkC, $kkS):
	$infok = 28;
	break;
	case array($kkS, $kkD):
	$infok = 29;
	break;
	case array($kkS, $kkI):
	$infok = 30;
	break;
	case array($kkS, $kkD, $kkI):
	$infok = 31;
	break;
	case array($kkS, $kkI, $kkD):
	$infok = 32;
	break;
	case array($kkS, $kkI, $kkC):
	$infok = 33;
	break;
	case array($kkS, $kkC, $kkD):
	$infok = 34;
	break;
	case array($kkS, $kkC, $kkI):
	$infok = 35;
	break;
	case array($kkC, $kkI):
	$infok = 36;
	break;
	case array($kkC, $kkD, $kkI):
	$infok = 37;
	break;
	case array($kkC, $kkD, $kkS):
	$infok = 38;
	break;
	case array($kkC, $kkI, $kkD):
	$infok = 39;
	break;
	case array($kkC, $kkS, $kkD):
	$infok = 40;
	break;
	case array($kkD, $kkI, $kkS, $kkC):
	$infok = 40;
	break;
	default:
	$infok = 40;
	break;
}

$discttl = array($ttllD, $ttllI, $ttllS, $ttllC);
//print_r($discp);
$discttl = array_filter($discttl, function($p) { return $p > 0; });
rsort($discttl);
switch ($discttl) {
	case array($ttllC):
	$infottl = 1;
	break;
	case array($ttllD):
	$infottl = 2;
	break;
	case array($ttllC, $ttllD):
	$infottl = 3;
	break;
	case array($ttllI, $ttllD):
	$infottl = 4;
	break;
	case array($ttllI, $ttllD, $ttllC):
	$infottl = 5;
	break;
	case array($ttllI, $ttllD, $ttllS):
	$infottl = 6;
	break;
	case array($ttllI, $ttllS, $ttllD):
	$infottl = 7;
	break;
	case array($ttllS, $ttllD, $ttllC):
	$infottl = 8;
	break;
	case array($ttllD, $ttllI):
	$infottl = 9;
	break;
	case array($ttllD, $ttllI, $ttllS):
	$infottl = 10;
	break;
	case array($ttllD, $ttllS):
	$infttl = 11;
	break;
	case array($ttllC, $ttllI, $ttllS):
	$infottl = 12;
	break;
	case array($ttllC, $ttllS, $ttllI):
	$infottl = 13;
	break;
	case array($ttllC, $ttllS, $ttllC):
	$infottl = 14;
	break;
	case array($ttllS):
	$infottl = 15;
	break;
	case array($ttllC, $ttllS):
	$infottl = 16;
	break;
	case array($ttllS, $ttllC):
	$infottl = 17;
	break;
	case array($ttllD, $ttllC):
	$infottl = 18;
	break;
	case array($ttllD, $ttllI, $ttllC):
	$infottl = 19;
	break;
	case array($ttllD, $ttllS, $ttllI):
	$infottl = 20;
	break;
	case array($ttllD, $ttllS, $ttllC):
	$infottl = 21;
	break;
	case array($ttllD, $ttllC, $ttllI):
	$infottl = 22;
	break;
	case array($ttllD, $ttllC, $ttllS):
	$infottl = 23;
	break;
	case array($ttllI):
	$infottl = 24;
	break;
	case array($ttllI, $ttllS):
	$infottl = 25;
	break;
	case array($ttllI, $ttllC):
	$infottl = 26;
	break;
	case array($ttllI, $ttllC, $ttllD):
	$infottl = 27;
	break;
	case array($ttllI, $ttllC, $ttllS):
	$infottl = 28;
	break;
	case array($ttllS, $ttllD):
	$infottl = 29;
	break;
	case array($ttllS, $ttllI):
	$infottl = 30;
	break;
	case array($ttllS, $ttllD, $ttllI):
	$infottl = 31;
	break;
	case array($ttllS, $kkI, $ttllD):
	$infottl = 32;
	break;
	case array($ttllS, $ttllI, $ttllC):
	$infottl = 33;
	break;
	case array($ttllS, $ttllC, $ttllD):
	$infottl = 34;
	break;
	case array($ttllS, $ttllC, $ttllI):
	$infottl = 35;
	break;
	case array($ttllC, $ttllI):
	$infottl = 36;
	break;
	case array($ttllC, $ttllD, $ttllI):
	$infottl = 37;
	break;
	case array($ttllC, $ttllD, $ttllS):
	$infottl = 38;
	break;
	case array($ttllC, $ttllI, $ttllD):
	$infottl = 39;
	break;
	case array($ttllC, $ttllS, $ttllD):
	$infottl = 40;
	break;
	default:
	return false;
	break;
}

if(isset(post())){
	$today = date("d/m/Y");
	if(!isset(post('id_mitra')){
		if ($koneksi->query("INSERT INTO `data_diri` (`id`, `nama`, `usia`, `jk`, `email`, `pD`, `kD`, `pI`, `kI`, `pS`, `kS`, `pC`, `sC`, `pStar`, `kStar`, `ttlD`, `ttlI`, `ttlS`, `ttlC`, `ppD`,  `ppI`, `ppS`, `ppC`, `kkD`, `kkI`, `kkS`, `kkC`, `ttllD`, `ttllI`, `ttllS`, `ttllC`, `infop`, `infok`, `infottl`, `tanggal`) VALUES (NULL,'$nama','$usia','$jk','$email','$pD','$kD','$pI','$kI','$pS','$kS','$pC','$kC','$pStar', '$kStar', '$ttlD', '$ttlI', '$ttlS', '$ttlC', '$ppD', '$ppI', '$ppS', '$ppC', '$kkD', '$kkI', '$kkS', '$kkC', '$ttllD', '$ttllI', '$ttllS', '$ttllC', '$infop', '$infok', '$infottl', '$today')") === TRUE) {
			$last_id = $koneksi->insert_id;
			for ($num = 1; $num < 193 ; $num++) { 
				$answer = 'answer-'.$num; 
				$hiddenname = 'h-'.$num;
				$hidden = post($hiddenname);
				$masuk = $koneksi->query("UPDATE `data_diri` SET `$answer` = '$hidden' WHERE id = '$last_id'");
			}
			session_get('validate') = 1;
			$email = $email;
			$nama = $nama;
			$subject = "[NOTICE] Review DISC Test Griya Psikologi";
			$body = '<!DOCTYPE html>';
			$body .= '<html style="height: 100%;">';
			$body .= '<style>';
			$body .= '@media (max-width:1024px) {';
			$body .= '}';
			$body .= '@media (max-width: 600px) {';
			$body .= '.top-title::after,';
			$body .= '.top-title::before {';
			$body .= 'display: none;';
			$body .= '}';

			$body .= '.top-title {';
			$body .= 'font-size: 15px;';
			$body .= 'letter-spacing: 1px;';
			$body .= 'margin-bottom: 0;';
			$body .= '}';

			$body .= '.content-title {';
			$body .= 'font-size: 32px;';
			$body .= '}';
			$body .= '}';
			$body .= ':root {';
			$body .= '--blue: #007bff;';
			$body .= '--indigo: #6610f2;';
			$body .= '--purple: #6f42c1;';
			$body .= '--pink: #e83e8c;';
			$body .= '--red: #dc3545;';
			$body .= '--orange: #fd7e14;';
			$body .= '--yellow: #ffc107;';
			$body .= '--green: #28a745;';
			$body .= '--teal: #20c997;';
			$body .= '--cyan: #17a2b8;';
			$body .= '--white: #fff;';
			$body .= '--gray: #6c757d;';
			$body .= '--gray-dark: #343a40;';
			$body .= '--primary: #007bff;';
			$body .= '--secondary: #6c757d;';
			$body .= '--success: #28a745;';
			$body .= '--info: #17a2b8;';
			$body .= '--warning: #ffc107;';
			$body .= '--danger: #dc3545;';
			$body .= '--light: #f8f9fa;';
			$body .= '--dark: #343a40;';
			$body .= '--breakpoint-xs: 0;';
			$body .= '--breakpoint-sm: 576px;';
			$body .= '--breakpoint-md: 768px;';
			$body .= '--breakpoint-lg: 992px;';
			$body .= '--breakpoint-xl: 1200px;';
			$body .= '--font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
			$body .= '--font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;';
			$body .= '}';

			$body .= '*,';
			$body .= '*::before,';
			$body .= '*::after {';
			$body .= 'box-sizing: border-box;';
			$body .= '}';

			$body .= 'html {';
			$body .= 'font-family: sans-serif;';
			$body .= 'line-height: 1.15;';
			$body .= '-webkit-text-size-adjust: 100%;';
			$body .= '-webkit-tap-highlight-color: rgba(0, 0, 0, 0);';
			$body .= '}';

			$body .= 'body {';
			$body .= 'margin: 0;';
			$body .= 'font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
			$body .= 'font-size: 1rem;';
			$body .= 'font-weight: 400;';
			$body .= 'line-height: 1.5;';
			$body .= 'color: #212529;';
			$body .= 'text-align: left;';
			$body .= 'background-color: #fff;';
			$body .= '}';

			$body .= 'h2, h3 {';
			$body .= 'margin-top: 0;';
			$body .= 'margin-bottom: 0.5rem;';
			$body .= '}';

			$body .= 'p {';
			$body .= 'margin-top: 0;';
			$body .= 'margin-bottom: 1rem;';
			$body .= '}';

			$body .= 'b {';
			$body .= 'font-weight: bolder;';
			$body .= '}';

			$body .= 'a {';
			$body .= 'color: #007bff;';
			$body .= 'text-decoration: none;';
			$body .= 'background-color: transparent;';
			$body .= '}';

			$body .= 'a:hover {';
			$body .= 'color: #0056b3;';
			$body .= 'text-decoration: underline;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'border-radius: 0;';
			$body .= '}';

			$body .= 'button:focus {';
			$body .= 'outline: 1px dotted;';
			$body .= 'outline: 5px auto -webkit-focus-ring-color;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'margin: 0;';
			$body .= 'font-family: inherit;';
			$body .= 'font-size: inherit;';
			$body .= 'line-height: inherit;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'overflow: visible;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'text-transform: none;';
			$body .= '}';

			$body .= 'button {';
			$body .= '-webkit-appearance: button;';
			$body .= '}';

			$body .= 'button:not(:disabled),';
			$body .= '[type="button"]:not(:disabled),';
			$body .= '[type="reset"]:not(:disabled),';
			$body .= '[type="submit"]:not(:disabled) {';
			$body .= 'cursor: pointer;';
			$body .= '}';

			$body .= 'button::-moz-focus-inner {';
			$body .= 'padding: 0;';
			$body .= 'border-style: none;';
			$body .= '}';

			$body .= '::-webkit-file-upload-button {';
			$body .= 'font: inherit;';
			$body .= '-webkit-appearance: button;';
			$body .= '}';

			$body .= 'h2, h3 {';
			$body .= 'margin-bottom: 0.5rem;';
			$body .= 'font-weight: 500;';
			$body .= 'line-height: 1.2;';
			$body .= '}';

			$body .= 'h2 {';
			$body .= 'font-size: 2rem;';
			$body .= '}';

			$body .= 'h3 {';
			$body .= 'font-size: 1.75rem;';
			$body .= '}';

			$body .= '.container {';
			$body .= 'width: 100%;';
			$body .= 'padding-right: 15px;';
			$body .= 'padding-left: 15px;';
			$body .= 'margin-right: auto;';
			$body .= 'margin-left: auto;';
			$body .= '}';

			$body .= '@media (min-width: 576px) {';
			$body .= '.container {';
			$body .= 'max-width: 540px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 768px) {';
			$body .= '.container {';
			$body .= 'max-width: 720px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 992px) {';
			$body .= '.container {';
			$body .= 'max-width: 960px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 1200px) {';
			$body .= '.container {';
			$body .= 'max-width: 1140px;';
			$body .= '}';
			$body .= '}';

			$body .= '.was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #28a745;';
			$body .= '}';

			$body .= '.was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #dc3545;';
			$body .= '}';

			$body .= '.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #0062cc;';
			$body .= 'border-color: #005cbf;';
			$body .= '}';

			$body .= '.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);';
			$body .= '}';

			$body .= '.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #545b62;';
			$body .= 'border-color: #4e555b;';
			$body .= '}';

			$body .= '.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(130, 138, 145, 0.5);';
			$body .= '}';

			$body .= '.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #1e7e34;';
			$body .= 'border-color: #1c7430;';
			$body .= '}';

			$body .= '.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(72, 180, 97, 0.5);';
			$body .= '}';

			$body .= '.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #117a8b;';
			$body .= 'border-color: #10707f;';
			$body .= '}';

			$body .= '.btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);';
			$body .= '}';

			$body .= '.btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #d39e00;';
			$body .= 'border-color: #c69500;';
			$body .= '}';

			$body .= '.btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(222, 170, 12, 0.5);';
			$body .= '}';

			$body .= '.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #bd2130;';
			$body .= 'border-color: #b21f2d;';
			$body .= '}';

			$body .= '.btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);';
			$body .= '}';

			$body .= '.btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #dae0e5;';
			$body .= 'border-color: #d3d9df;';
			$body .= '}';

			$body .= '.btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, 0.5);';
			$body .= '}';

			$body .= '.btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #1d2124;';
			$body .= 'border-color: #171a1d;';
			$body .= '}';

			$body .= '.btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(82, 88, 93, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #007bff;';
			$body .= 'border-color: #007bff;';
			$body .= '}';

			$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #6c757d;';
			$body .= 'border-color: #6c757d;';
			$body .= '}';

			$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-success:not(:disabled):not(.disabled):active, .btn-outline-success:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #28a745;';
			$body .= 'border-color: #28a745;';
			$body .= '}';

			$body .= '.btn-outline-success:not(:disabled):not(.disabled):active:focus, .btn-outline-success:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-info:not(:disabled):not(.disabled):active, .btn-outline-info:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #17a2b8;';
			$body .= 'border-color: #17a2b8;';
			$body .= '}';

			$body .= '.btn-outline-info:not(:disabled):not(.disabled):active:focus, .btn-outline-info:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #ffc107;';
			$body .= 'border-color: #ffc107;';
			$body .= '}';

			$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #dc3545;';
			$body .= 'border-color: #dc3545;';
			$body .= '}';

			$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active:focus, .btn-outline-danger:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-light:not(:disabled):not(.disabled):active, .btn-outline-light:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #f8f9fa;';
			$body .= 'border-color: #f8f9fa;';
			$body .= '}';

			$body .= '.btn-outline-light:not(:disabled):not(.disabled):active:focus, .btn-outline-light:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active, .btn-outline-dark:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #343a40;';
			$body .= 'border-color: #343a40;';
			$body .= '}';

			$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active:focus, .btn-outline-dark:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);';
			$body .= '}';

			$body .= '.custom-control-input:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #80bdff;';
			$body .= '}';

			$body .= '.custom-control-input:not(:disabled):active ~ .custom-control-label::before {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #b3d7ff;';
			$body .= 'border-color: #b3d7ff;';
			$body .= '}';

			$body .= '.close:not(:disabled):not(.disabled):hover, .close:not(:disabled):not(.disabled):focus {';
			$body .= 'opacity: .75;';
			$body .= '}';

			$body .= '.clearfix::after {';
			$body .= 'display: block;';
			$body .= 'clear: both;';
			$body .= 'content: "";';
			$body .= '}';

			$body .= '@supports ((position: -webkit-sticky) or (position: sticky)) {';
			$body .= '}';

			$body .= '.text-justify {';
			$body .= 'text-align: justify !important;';
			$body .= '}';

			$body .= '@media print {';
			$body .= '*,';
			$body .= '*::before,';
			$body .= '*::after {';
			$body .= 'text-shadow: none !important;';
			$body .= 'box-shadow: none !important;';
			$body .= '}';
			$body .= 'a:not(.btn) {';
			$body .= 'text-decoration: underline;';
			$body .= '}';
			$body .= 'p,';
			$body .= 'h2,';
			$body .= 'h3 {';
			$body .= 'orphans: 3;';
			$body .= 'widows: 3;';
			$body .= '}';
			$body .= 'h2,';
			$body .= 'h3 {';
			$body .= 'page-break-after: avoid;';
			$body .= '}';
			$body .= '@page {';
			$body .= 'size: a3;';
			$body .= '}';
			$body .= 'body {';
			$body .= 'min-width: 992px !important;';
			$body .= '}';
			$body .= '.container {';
			$body .= 'min-width: 992px !important;';
			$body .= '}';
			$body .= '}';
			$body .= '</style>';
			$body .= '<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support" style="height: 100%; color: #8d8d8d; font-family: open sans,sans-serif; font-size: 14px; line-height: 2.2; overflow-x: hidden;">';
			$body .= '<div class="container box-content content clearfix" style="text-align: center;">';
			$body .= '<p class="top-title" style="color: #707070; display: inline-block; font-family: rubik; font-size: 18px; letter-spacing: 2px; position: relative; text-transform: uppercase;">';
			$body .= 'Review</p>';
			$body .= '<h2 class="content-title" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; font-size: 45px; letter-spacing: 3px; line-height: 1; margin: 0 auto 30px; max-width: 500px; text-transform: uppercase;">';
			$body .= 'DISC Test</h2>';
			$body .= '<h3 class="content-subtitle" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; display: block; font-size: 22px; line-height: 1; margin: 0 0 20px; position: relative; text-transform: uppercase;">'.post("nama").'</h3>';
			$body .= '<p class="text-justify">Terimakasih telah melakukan DISC Test pada Griya Psikologi RSF. Anda dapat melihat kembali hasil DISC Test anda disini.</p>';
			// $body .= '<p class="text-justify">Mohon dapat melakukan ganti password setelah anda login ke akun tersebut</p>';
			$body .= '<a href="https://disc.griyapsikologi.com/results.php?id='.md5($last_id).'" style="color: #aaa; text-decoration: none; transition: ease .3s; -webkit-transition: ease .3s; -moz-transition: ease .3s; -o-transition: ease .3s; -ms-transition: ease .3s;"><button style="max-width: 100%; background: #e3451e none repeat scroll 0 0; border: 2px solid #e3451e; color: #fff; display: inline-block; font-family: rubik; font-weight: 500; letter-spacing: 4px; line-height: 1; padding: 14px 30px; text-transform: uppercase; width: auto; transition: ease .3s;">Lihat Disini</button></a>';
			$body .= '</div>';
			$body .= '</body>';
			$body .= '</html>';
			include 'test-mail.php';
			header("Location: results.php?id=".md5($last_id)."");
		} else {
			return false;
		}
	}
	elseif(isset(post('id_mitra')){
		if ($koneksi->query("INSERT INTO `data_diri` (`id`, `nama`, `usia`, `jk`, `email`, `id_mitra`, `pD`, `kD`, `pI`, `kI`, `pS`, `kS`, `pC`, `sC`, `pStar`, `kStar`, `ttlD`, `ttlI`, `ttlS`, `ttlC`, `ppD`,  `ppI`, `ppS`, `ppC`, `kkD`, `kkI`, `kkS`, `kkC`, `ttllD`, `ttllI`, `ttllS`, `ttllC`, `infop`, `infok`, `infottl`, `tanggal`) VALUES (NULL,'$nama','$usia','$jk','$email','$id_mitra','$pD','$kD','$pI','$kI','$pS','$kS','$pC','$kC','$pStar', '$kStar', '$ttlD', '$ttlI', '$ttlS', '$ttlC', '$ppD', '$ppI', '$ppS', '$ppC', '$kkD', '$kkI', '$kkS', '$kkC', '$ttllD', '$ttllI', '$ttllS', '$ttllC', '$infop', '$infok', '$infottl', '$today')") === TRUE) {
			$last_id = $koneksi->insert_id;
			$delete = $koneksi->query("DELETE FROM `data_diri_pending` WHERE `id_mitra` = '$id_mitra' AND `nama` = '$nama' AND `email` = '$email'");
			for ($num = 1; $num < 193 ; $num++) { 
				$answer = 'answer-'.$num; 
				$hiddenname = 'h-'.$num;
				$hidden = post($hiddenname);
				$masuk = $koneksi->query("UPDATE `data_diri` SET `$answer` = '$hidden' WHERE id = '$last_id'");
			}
			session_add('validate', 1);
			header("Location: results.php?id=".md5($last_id)."");
		} 
		else {
			return false;
		}
	}
}
?>