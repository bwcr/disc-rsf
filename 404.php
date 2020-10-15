<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DISC Test</title>
	<link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/benten.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">	
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support">
	<div class="box-content content container">
		<h2 class="error-title">404</h2>
		<h3>Error! Mohon Kembali ke Halaman Utama</h3>
		<p>Code:<?php print_r($_SESSION['error_code']); ?></p>
		<a class="go-btn" href="index.php"><i class="fas fa-home"></i> Home</a>
	</div>
</body><
</html>