<?php
session_start();

require_once('../connection.php');
if(isset(session_get('userame_admin')) && isset(session_get('password_admin'))){
	$session_username = session_get('userame_admin');
	$session_password = session_get('password_admin');
}

if(isset($session_username) && isset($session_password)){
	if(isset(post('password'), post('newPassword'), post('confirmPassword')){
		$password = md5($_POST['password']);
		$newPassword = md5($_POST['newPassword']);
		$confirmPassword = md5($_POST['confirmPassword']);

		if($password === $session_password){
			if($newPassword !== $confirmPassword){
				session_add('alert-failure', "Password baru dan konfirmasi berbeda, mohon cek kembali");
				header("Location: editProfil.php");
			}
			else{
				$update = $koneksi->query("UPDATE `admin` SET `password`='$newPassword' WHERE `username` = '$session_username' AND `password` = '$session_password'");
				if($update){
					session_add('password_admin', $newPassword);
					session_add('alert-success', "Password telah berhasil diperbarui");
					print_r("Sukses");
				}
				else{
					session_add('alert-failure', "Password gagal diperbarui");
					print_r("Gagal");
				}
				header("Location: editProfil.php");
			}
		}
		else{
			session_add('alert-failure', "Password lama salah");
			header("Location: editProfil.php");
		}
	}
	if (isset(post('username')) && isset(post('email'))) {
		$username = post('username');
		$email = post('email');
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE `username` = '$username' OR `email` = '$email'");
		if($select->num_rows > 0){
			session_add('alert-failure', "Username atau Email telah digunakan");
			header("Location: editProfil.php");
			die();
		}
		else{
			$update = $koneksi->query("UPDATE `admin` SET `username`='$username', `email`='$email' WHERE `username` = '$session_username' AND `password` = '$session_password'");
			if($update === TRUE){
				session_get('userame_admin') = $username;
				session_add('email', $email);
				header("Location: editProfil.php");
				session_add('alert-success', "Username dan email telah berhasil diperbarui");
			}
		}
	}
	else{
		session_add('alert-failure', "Terjadi Kesalahan");
		header("Location: editProfil.php");
	}
}

else{
	session_add('alert-warning', "Harap Login kembali");
	header("Location: ../admin.php");
}

?>