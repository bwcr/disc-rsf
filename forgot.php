<?php
require_once 'connection.php';

session_start();

if (isset($_GET["key"]) && isset($_GET["email"])){
	$key = FILTER_INPUT(INPUT_GET, 'key');
	$email = FILTER_INPUT(INPUT_GET, 'email');
	$curDate = date("Y-m-d H:i:s");
	$select = $koneksi->query("SELECT * FROM `password_reset` WHERE `key` = '$key' AND `email` = '$email'");
	$row = mysqli_fetch_array($select);
	if($row == ""){
		$_SESSION['alert-warning'] = "Invalid Link";
		header("Location: admin.php");
	}
	else{
		$expDate = $row['expDate'];
		if($expDate >= $curDate){
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Reset Password | Admin DISC Test Griya Psikologi</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
				<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
				<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
				<link rel="stylesheet" type="text/css" href="css/benten.css">
				<link rel="stylesheet" type="text/css" href="css/style.css">
				<style>
					.row{
						margin-right: unset;
						margin-left: unset;
					}
				</style>
			</head>
			<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support">
				<div class="container box-content content clearfix">
				<p class="top-title">
				DISC TEST</p>
				<h2 class="content-title">
				Reset Password</h2>
				<form id="formReset" action="validation.php" method="POST">
					<div class="mb-3">
						<input required="required" id="newPassword" type="password" name="newPassword" placeholder="Password Baru..">
						<input required="required" id="confirmPassword" type="password" name="confirmPassword" placeholder="Password Konfirmasi..">
						<input type="hidden" name="email" value="<?= $email ?>">
					</div>
					<br>		
					<button type="submit">SUBMIT</button>
				</form>
			</div>
		</body>
		<script>
			$(document).ready(function() {
				$("#formReset").validate({
					rules: {
						newPassword: {
							required: true,
						},
						confirmPassword: {
							required: true,
							equalTo: "#newPassword"
						}
					}
				});
		/*
		 * Translated default messages for the jQuery validation plugin.
		 * Locale: ID (Indonesia; Indonesian)
		 */
		 $.extend( $.validator.messages, {
		 	required: "Kolom ini diperlukan.",
		 	remote: "Harap benarkan kolom ini.",
		 	email: "Silakan masukkan format email yang benar.",
		 	url: "Silakan masukkan format URL yang benar.",
		 	date: "Silakan masukkan format tanggal yang benar.",
		 	dateISO: "Silakan masukkan format tanggal(ISO) yang benar.",
		 	number: "Silakan masukkan angka yang benar.",
		 	digits: "Harap masukan angka saja.",
		 	creditcard: "Harap masukkan format kartu kredit yang benar.",
		 	equalTo: "Harap masukkan nilai yg sama dengan sebelumnya.",
		 	maxlength: $.validator.format( "Input dibatasi hanya {0} karakter." ),
		 	minlength: $.validator.format( "Input tidak kurang dari {0} karakter." ),
		 	rangelength: $.validator.format( "Panjang karakter yg diizinkan antara {0} dan {1} karakter." ),
		 	range: $.validator.format( "Harap masukkan nilai antara {0} dan {1}." ),
		 	max: $.validator.format( "Harap masukkan nilai lebih kecil atau sama dengan {0}." ),
		 	min: $.validator.format( "Harap masukkan nilai lebih besar atau sama dengan {0}." )
		 } );
		});
	</script>
	</html>
	<?php
}
else{
	$_SESSION['alert-warning'] = "Link expired";
	header("Location: admin.php");
}
}
}
else{
	$_SESSION['alert-warning'] = "Link Invalid";
	header("Location: admin.php");
}

?>