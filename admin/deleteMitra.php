<?php
session_start();

require_once('../connection.php');

$id = get('id');

if(isset($id))
{
	if(session_get('username_admin') && session_get('password_admin')){
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE md5(`id_mitra`) = '$id'");
		$rowselect = mysqli_fetch_array($select);
		$delete = $koneksi->query("DELETE FROM `mitra` WHERE md5(`id_mitra`) = '$id'");
		$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id_mitra`) = '$id'");
		if($rowselect['logo'] != 'default.jpg'){
			unlink('../image/logo/'.$rowselect['logo'].'');
		}
		session_add('alert-failure', "Mitra berhasil dihapus"
		header("Location: mitra.php");
	}
	else{
		session_add('alert-warning', "Harap Login kembali"
		header("Location: ../admin.php");
	}
}


?>