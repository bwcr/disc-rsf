<?php
session_start();

require_once('connection.php');

$id = $_GET['id'];

if(isset($_SESSION['username_admin'])){
	$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id`) = '$id'");
	header("Location: admin/responden.php");
}

elseif (isset($_SESSION['username'])) {
	$delete = $koneksi->query("DELETE FROM `data_diri` WHERE md5(`id`) = '$id'");
	header("Location: mitra/responden.php");
}

else{
	header("Location: admin.php");
}
?>