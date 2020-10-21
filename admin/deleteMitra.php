<?php
session_start();

require_once('../connection.php');

if(isset($_GET['id']))
{
	$id = $_GET['id'];
	if(isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])){
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE md5(`id_mitra`) = '$id'");
		$rowselect = mysqli_fetch_array($select);
		$delete = $koneksi->query("DELETE FROM `mitra` WHERE md5(`id_mitra`) = '$id'");
		$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id_mitra`) = '$id'");
		if($rowselect['logo'] != 'default.jpg'){
			unlink('../image/logo/'.$rowselect['logo'].'');
		}
		$_SESSION['alert-failure'] = "Mitra berhasil dihapus";
		header("Location: mitra.php");
	}
	else{
		$_SESSION['alert-warning'] = "Harap Login kembali";
		header("Location: ../admin.php");
	}
}


?>