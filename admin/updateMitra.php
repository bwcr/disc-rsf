<?php
session_start();

require_once('../connection.php');

if(isset(get('id'), post('username'), post('password'), post('email'), post('mitra')))
{
	$id = get('id');
	$usernameMitra = post('username');
	$passwordMitra = md5(post('password'));
	$emailMitra = post('email');
	$namaMitra = post('mitra');
}

if(isset(session_get('username_admin')) && isset(session_get('password_admin'))){
	$update = $koneksi->query("UPDATE `mitra` SET `username`='$usernameMitra',`password`='$passwordMitra',`email`='$emailMitra',`mitra`='$namaMitra' WHERE md5(`id_mitra`) = '$id'");
	if($update === TRUE){
		session_add('alert-success', "Data telah berhasil diperbarui, harap menghubungi mitra terkait");
		print_r("Sukses");
	}
	else{
		session_add('alert-failure', "Data gagal dimasukkan, mohon input kembali");
		print_r("Gagal");
	}
	header("Location: mitra.php");
}

else{
	session_add('alert-warning', "Harap Login kembali");
	header("Location: ../admin.php");	
}

?>