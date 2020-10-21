<?php
session_start();

require_once('connection.php');

if(session_get('id')){
	$id = session_get('id');
	if(session_get('username_admin')){
		$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id`) = '$id'");
		header("Location: admin/responden.php");
	}
	elseif (session_get('username')) {
		$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id`) = '$id'");
		header("Location: mitra/responden.php");
	}
}

else{
	header("Location: admin.php");
}
?>