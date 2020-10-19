<?php
session_start();

require_once('connection.php');
if(isset($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$session_username = $_SESSION['username'];
	$session_password = $_SESSION['password'];
	
	if($_POST == NULL){
		alert('Username atau Password tidak boleh kosong');
		header("Location: admin-index.php");
	}
	
	else{
		
		$update = $koneksi->query("UPDATE `admin` SET `username`= '$username',`password`= '$password' WHERE 1");
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		header("Location: Admin/responden.php");
	}
}
	
?>