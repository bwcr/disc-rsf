<?php
session_start();

require_once('../connection.php');
if(isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])){
	$session_username = $_SESSION['username_admin'];
	$session_password = $_SESSION['password_admin'];
}

if(isset($session_username) && isset($session_password)){
	if(isset($_POST['password'], $_POST['newPassword'], $_POST['confirmPassword'])){
		$password = md5($_POST['password']);
		$newPassword = md5($_POST['newPassword']);
		$confirmPassword = md5($_POST['confirmPassword']);

		if($password === $session_password){
			if($newPassword !== $confirmPassword){
				$_SESSION['alert-failure'] = "Password baru dan konfirmasi berbeda, mohon cek kembali";
				header("Location: editProfil.php");
			}
			else{
				$update = $koneksi->query("UPDATE `admin` SET `password`='$newPassword' WHERE `username` = '$session_username' AND `password` = '$session_password'");
				if($update){
					$_SESSION['password_admin'] = $newPassword;
					$_SESSION['alert-success'] = "Password telah berhasil diperbarui";
					print_r("Sukses");
				}
				else{
					$_SESSION['alert-failure'] = "Password gagal diperbarui";
					print_r("Gagal");
				}
				header("Location: editProfil.php");
			}
		}
		else{
			$_SESSION['alert-failure'] = "Password lama salah";
			header("Location: editProfil.php");
		}
	}
	if (isset($_POST['username']) && isset($_POST['email'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE `username` = '$username' OR `email` = '$email'");
		if($select->num_rows > 0){
			$_SESSION['alert-failure'] = "Username atau Email telah digunakan";
			header("Location: editProfil.php");
			die();
		}
		else{
			$update = $koneksi->query("UPDATE `admin` SET `username`='$username', `email`='$email' WHERE `username` = '$session_username' AND `password` = '$session_password'");
			if($update === TRUE){
				$_SESSION['username_admin'] = $username;
				$_SESSION['email'] = $email;
				header("Location: editProfil.php");
				$_SESSION['alert-success'] = "Username dan email telah berhasil diperbarui";
			}
		}
	}
	else{
		$_SESSION['alert-failure'] = "Terjadi Kesalahan";
		header("Location: editProfil.php");
	}
}

else{
	$_SESSION['alert-warning'] = "Harap Login kembali";
	header("Location: ../admin.php");
}

?>