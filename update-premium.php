<?php
session_start();

require_once('connection.php');

$username = $_POST['username'];
$password = $_POST['password'];
$session_username = $_SESSION['username_admin'];
$session_password = $_SESSION['password_admin'];
$id = $_GET['id'];

if($_GET == NULL){
	alert('Terjadi kesalahan');
	header("Location: Admin/responden.php");
}

elseif(isset($_SESSION['username_admin']) || isset($_SESSION['password_admin'])){
	$update = $koneksi->query("UPDATE `data_diri` SET `premium` = '1' WHERE md5(`id`) = '$id'");
	header("Location: results.php?id=".$id."");
}

else{
	alert("Terjadi kesalahan");
	header("Location: results.php?id=".$id."");	
}

?>