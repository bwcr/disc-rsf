<?php
	setlocale(LC_TIME, ['id_ID', 'INDONESIA']);

	$hostname="localhost";
	$username="root";
	$password="";
	$database="griyaps1_griya";

	$koneksi=mysqli_connect($hostname, $username, $password, $database);

	// Checking error
    if(mysqli_connect_errno()){
        die('Koneksi gagal: <br>'.mysqli_connect_error());
    }
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
        if (isset($_SERVER['HTTP_HOST'], $_SERVER['REQUEST_URI'])) {
            $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $location);
            exit;
        }
    }
?>