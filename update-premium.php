<?php
session_start();

require_once('connection.php');

if(isset(post('username'), post('password'), session_get('username_admin'), session_get('password_admin'), get('id') || empty(get('id'))) {
	$username = get('username');
	$password = get('password');
	$session_username = session_get('username_admin');
	$session_password = session_get('password_admin');
	$id = get('id');
}

else {
	alert('Terjadi kesalahan');
	header("Location: Admin/responden.php");
}

if(isset(session_get('username_admin') || isset(session_get('password_admin')){
	$update = $koneksi->query("UPDATE `data_diri` SET `premium` = '1' WHERE md5(`id`) = '$id'");
	header("Location: results.php?id=".$id."");
}

else{
	alert("Terjadi kesalahan");
	header("Location: results.php?id=".$id."");	
}

?>