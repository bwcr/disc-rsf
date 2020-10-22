<?php
session_start();

require_once('../connection.php');
if (isset($_GET['id'],$_POST['password'], $_POST['username'], $_POST['email'], $_POST['mitra'])) {
	$id = $_GET['id'];
	$usernameMitra = $_POST['username'];
	$passwordMitra = md5($_POST['password']);
	$emailMitra = $_POST['email'];
	$namaMitra = $_POST['mitra'];
}

if(isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])){
	$update = $koneksi->query("UPDATE `mitra` SET `username`='$usernameMitra',`password`='$passwordMitra',`email`='$emailMitra',`mitra`='$namaMitra' WHERE md5(`id_mitra`) = '$id'");
	if($update === TRUE){
		$_SESSION['alert-success'] = "Data telah berhasil diperbarui, harap menghubungi mitra terkait";
	}
	else{
		$_SESSION['alert-failure'] = "Data gagal dimasukkan, mohon input kembali";
	}
	header("Location: mitra.php");
}

else{
	$_SESSION['alert-warning'] = "Harap Login kembali";
	header("Location: ../admin.php");	
}

?>