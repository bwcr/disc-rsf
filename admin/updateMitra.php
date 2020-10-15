<?php
session_start();

require_once('../connection.php');

// $username = $_POST['username'];
// $password = $_POST['password'];
// $session_username = $_SESSION['username_admin']
   ;
// $session_password = $_SESSION['password_admin'];
$id = $_GET['id'];

$usernameMitra = $_POST['username'];
$passwordMitra = md5($_POST['password']);
$emailMitra = $_POST['email'];
$namaMitra = $_POST['mitra'];

// if($_GET == NULL){
// 	alert('Terjadi kesalahan');
// 	header("Location: mitra.php");
// }

print_r($_POST);

if(isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])){
	$update = $koneksi->query("UPDATE `mitra` SET `username`='$usernameMitra',`password`='$passwordMitra',`email`='$emailMitra',`mitra`='$namaMitra' WHERE md5(`id_mitra`) = '$id'");
	if($update === TRUE){
		$_SESSION['alert-success'] = "Data telah berhasil diperbarui, harap menghubungi mitra terkait";
		print_r("Sukses");
	}
	else{
		$_SESSION['alert-failure'] = "Data gagal dimasukkan, mohon input kembali";
		print_r("Gagal");
	}
	header("Location: mitra.php");
}

else{
	$_SESSION['alert-warning'] = "Harap Login kembali";
	header("Location: ../admin.php");	
}

?>