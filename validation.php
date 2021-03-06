<?php

session_start();

require_once('connection.php');

if(isset($_POST['username']) && isset($_POST['password'])){
	$username = FILTER_INPUT(INPUT_POST, 'username');
	$password = md5(FILTER_INPUT(INPUT_POST, 'password'));

	$select = $koneksi->query("SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'");

	$row = mysqli_fetch_array($select);

	if(($select->num_rows) === 1){
		$_SESSION['username_admin'] = $row['username'];
		$_SESSION['password_admin'] = $row['password'];
		$_SESSION['email'] = $row['email'];
		header("Location: admin/dashboard.php");
	}

	elseif(($select->num_rows) === 0){
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE `username` = '$username' AND `password` = '$password'");
		$row = mysqli_fetch_array($select);
		if(($select->num_rows) === 1){
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id_mitra'] = $row['id_mitra'];
			$_SESSION['mitra'] = $row['mitra'];
			$_SESSION['logo'] = $row['logo'];
			header("Location: mitra/responden.php");
		}
		elseif(($select->num_rows) === 0){
			$_SESSION['alert-warning'] = "<strong>Username</strong> atau <strong>Password</strong> yang anda masukkan salah.";
			header("Location: admin.php");
		}
	}

	else{
		$_SESSION['alert-warning'] = "Terjadi kesalahan, coba lagi";
		header("Location: admin.php");
	}
}

if (isset($_POST['forgot'])) {
	$forgot = FILTER_INPUT(INPUT_POST, 'forgot');
	$select = $koneksi->query("SELECT `username`,`email` FROM `admin` WHERE `username` = '$forgot' OR `email` = '$forgot' UNION SELECT `username`,`email` FROM `mitra` WHERE `username` = '$forgot' OR `email` = '$forgot'");
	$row = mysqli_fetch_array($select);
	if(($select->num_rows) === 1){
		$p = strpos($row['email'], '@');
		$email = $row['email'];
		$expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
		$expDate = date("Y-m-d H:i:s",$expFormat);
		$key = md5(2418*2+$email);
		$addKey = substr(md5(uniqid(rand(),1)),3,10);
		$key = $key . $addKey;
		$insert = $koneksi->query("INSERT INTO `password_reset`(`email`, `key`, `expDate`) VALUES ('$email','$key','$expDate')");
		$nama = $row['mitra'];
		$subject = "[NOTICE] Lupa Password";
		$body = '<!DOCTYPE html>';
		$body .= '<html style="height: 100%;">';
		$body .= '<style>';
		$body .= '@media (max-width:1024px) {';
		$body .= '}';
		$body .= '@media (max-width: 600px) {';
		$body .= '.top-title::after,';
		$body .= '.top-title::before {';
		$body .= 'display: none;';
		$body .= '}';

		$body .= '.top-title {';
		$body .= 'font-size: 15px;';
		$body .= 'letter-spacing: 1px;';
		$body .= 'margin-bottom: 0;';
		$body .= '}';

		$body .= '.content-title {';
		$body .= 'font-size: 32px;';
		$body .= '}';
		$body .= '}';
		$body .= ':root {';
		$body .= '--blue: #007bff;';
		$body .= '--indigo: #6610f2;';
		$body .= '--purple: #6f42c1;';
		$body .= '--pink: #e83e8c;';
		$body .= '--red: #dc3545;';
		$body .= '--orange: #fd7e14;';
		$body .= '--yellow: #ffc107;';
		$body .= '--green: #28a745;';
		$body .= '--teal: #20c997;';
		$body .= '--cyan: #17a2b8;';
		$body .= '--white: #fff;';
		$body .= '--gray: #6c757d;';
		$body .= '--gray-dark: #343a40;';
		$body .= '--primary: #007bff;';
		$body .= '--secondary: #6c757d;';
		$body .= '--success: #28a745;';
		$body .= '--info: #17a2b8;';
		$body .= '--warning: #ffc107;';
		$body .= '--danger: #dc3545;';
		$body .= '--light: #f8f9fa;';
		$body .= '--dark: #343a40;';
		$body .= '--breakpoint-xs: 0;';
		$body .= '--breakpoint-sm: 576px;';
		$body .= '--breakpoint-md: 768px;';
		$body .= '--breakpoint-lg: 992px;';
		$body .= '--breakpoint-xl: 1200px;';
		$body .= '--font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
		$body .= '--font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;';
		$body .= '}';

		$body .= '*,';
		$body .= '*::before,';
		$body .= '*::after {';
		$body .= 'box-sizing: border-box;';
		$body .= '}';

		$body .= 'html {';
		$body .= 'font-family: sans-serif;';
		$body .= 'line-height: 1.15;';
		$body .= '-webkit-text-size-adjust: 100%;';
		$body .= '-webkit-tap-highlight-color: rgba(0, 0, 0, 0);';
		$body .= '}';

		$body .= 'body {';
		$body .= 'margin: 0;';
		$body .= 'font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
		$body .= 'font-size: 1rem;';
		$body .= 'font-weight: 400;';
		$body .= 'line-height: 1.5;';
		$body .= 'color: #212529;';
		$body .= 'text-align: left;';
		$body .= 'background-color: #fff;';
		$body .= '}';

		$body .= 'h2, h3 {';
		$body .= 'margin-top: 0;';
		$body .= 'margin-bottom: 0.5rem;';
		$body .= '}';

		$body .= 'p {';
		$body .= 'margin-top: 0;';
		$body .= 'margin-bottom: 1rem;';
		$body .= '}';

		$body .= 'b {';
		$body .= 'font-weight: bolder;';
		$body .= '}';

		$body .= 'a {';
		$body .= 'color: #007bff;';
		$body .= 'text-decoration: none;';
		$body .= 'background-color: transparent;';
		$body .= '}';

		$body .= 'a:hover {';
		$body .= 'color: #0056b3;';
		$body .= 'text-decoration: underline;';
		$body .= '}';

		$body .= 'button {';
		$body .= 'border-radius: 0;';
		$body .= '}';

		$body .= 'button:focus {';
		$body .= 'outline: 1px dotted;';
		$body .= 'outline: 5px auto -webkit-focus-ring-color;';
		$body .= '}';

		$body .= 'button {';
		$body .= 'margin: 0;';
		$body .= 'font-family: inherit;';
		$body .= 'font-size: inherit;';
		$body .= 'line-height: inherit;';
		$body .= '}';

		$body .= 'button {';
		$body .= 'overflow: visible;';
		$body .= '}';

		$body .= 'button {';
		$body .= 'text-transform: none;';
		$body .= '}';

		$body .= 'button {';
		$body .= '-webkit-appearance: button;';
		$body .= '}';

		$body .= 'button:not(:disabled),';
		$body .= '[type="button"]:not(:disabled),';
		$body .= '[type="reset"]:not(:disabled),';
		$body .= '[type="submit"]:not(:disabled) {';
		$body .= 'cursor: pointer;';
		$body .= '}';

		$body .= 'button::-moz-focus-inner {';
		$body .= 'padding: 0;';
		$body .= 'border-style: none;';
		$body .= '}';

		$body .= '::-webkit-file-upload-button {';
		$body .= 'font: inherit;';
		$body .= '-webkit-appearance: button;';
		$body .= '}';

		$body .= 'h2, h3 {';
		$body .= 'margin-bottom: 0.5rem;';
		$body .= 'font-weight: 500;';
		$body .= 'line-height: 1.2;';
		$body .= '}';

		$body .= 'h2 {';
		$body .= 'font-size: 2rem;';
		$body .= '}';

		$body .= 'h3 {';
		$body .= 'font-size: 1.75rem;';
		$body .= '}';

		$body .= '.container {';
		$body .= 'width: 100%;';
		$body .= 'padding-right: 15px;';
		$body .= 'padding-left: 15px;';
		$body .= 'margin-right: auto;';
		$body .= 'margin-left: auto;';
		$body .= '}';

		$body .= '@media (min-width: 576px) {';
		$body .= '.container {';
		$body .= 'max-width: 540px;';
		$body .= '}';
		$body .= '}';

		$body .= '@media (min-width: 768px) {';
		$body .= '.container {';
		$body .= 'max-width: 720px;';
		$body .= '}';
		$body .= '}';

		$body .= '@media (min-width: 992px) {';
		$body .= '.container {';
		$body .= 'max-width: 960px;';
		$body .= '}';
		$body .= '}';

		$body .= '@media (min-width: 1200px) {';
		$body .= '.container {';
		$body .= 'max-width: 1140px;';
		$body .= '}';
		$body .= '}';

		$body .= '.was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {';
		$body .= 'border-color: #28a745;';
		$body .= '}';

		$body .= '.was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {';
		$body .= 'border-color: #dc3545;';
		$body .= '}';

		$body .= '.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #0062cc;';
		$body .= 'border-color: #005cbf;';
		$body .= '}';

		$body .= '.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);';
		$body .= '}';

		$body .= '.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #545b62;';
		$body .= 'border-color: #4e555b;';
		$body .= '}';

		$body .= '.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(130, 138, 145, 0.5);';
		$body .= '}';

		$body .= '.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #1e7e34;';
		$body .= 'border-color: #1c7430;';
		$body .= '}';

		$body .= '.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(72, 180, 97, 0.5);';
		$body .= '}';

		$body .= '.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #117a8b;';
		$body .= 'border-color: #10707f;';
		$body .= '}';

		$body .= '.btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);';
		$body .= '}';

		$body .= '.btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active {';
		$body .= 'color: #212529;';
		$body .= 'background-color: #d39e00;';
		$body .= 'border-color: #c69500;';
		$body .= '}';

		$body .= '.btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(222, 170, 12, 0.5);';
		$body .= '}';

		$body .= '.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #bd2130;';
		$body .= 'border-color: #b21f2d;';
		$body .= '}';

		$body .= '.btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);';
		$body .= '}';

		$body .= '.btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active {';
		$body .= 'color: #212529;';
		$body .= 'background-color: #dae0e5;';
		$body .= 'border-color: #d3d9df;';
		$body .= '}';

		$body .= '.btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, 0.5);';
		$body .= '}';

		$body .= '.btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #1d2124;';
		$body .= 'border-color: #171a1d;';
		$body .= '}';

		$body .= '.btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(82, 88, 93, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #007bff;';
		$body .= 'border-color: #007bff;';
		$body .= '}';

		$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #6c757d;';
		$body .= 'border-color: #6c757d;';
		$body .= '}';

		$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-success:not(:disabled):not(.disabled):active, .btn-outline-success:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #28a745;';
		$body .= 'border-color: #28a745;';
		$body .= '}';

		$body .= '.btn-outline-success:not(:disabled):not(.disabled):active:focus, .btn-outline-success:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-info:not(:disabled):not(.disabled):active, .btn-outline-info:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #17a2b8;';
		$body .= 'border-color: #17a2b8;';
		$body .= '}';

		$body .= '.btn-outline-info:not(:disabled):not(.disabled):active:focus, .btn-outline-info:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active {';
		$body .= 'color: #212529;';
		$body .= 'background-color: #ffc107;';
		$body .= 'border-color: #ffc107;';
		$body .= '}';

		$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #dc3545;';
		$body .= 'border-color: #dc3545;';
		$body .= '}';

		$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active:focus, .btn-outline-danger:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-light:not(:disabled):not(.disabled):active, .btn-outline-light:not(:disabled):not(.disabled).active {';
		$body .= 'color: #212529;';
		$body .= 'background-color: #f8f9fa;';
		$body .= 'border-color: #f8f9fa;';
		$body .= '}';

		$body .= '.btn-outline-light:not(:disabled):not(.disabled):active:focus, .btn-outline-light:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);';
		$body .= '}';

		$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active, .btn-outline-dark:not(:disabled):not(.disabled).active {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #343a40;';
		$body .= 'border-color: #343a40;';
		$body .= '}';

		$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active:focus, .btn-outline-dark:not(:disabled):not(.disabled).active:focus {';
		$body .= 'box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);';
		$body .= '}';

		$body .= '.custom-control-input:focus:not(:checked) ~ .custom-control-label::before {';
		$body .= 'border-color: #80bdff;';
		$body .= '}';

		$body .= '.custom-control-input:not(:disabled):active ~ .custom-control-label::before {';
		$body .= 'color: #fff;';
		$body .= 'background-color: #b3d7ff;';
		$body .= 'border-color: #b3d7ff;';
		$body .= '}';

		$body .= '.close:not(:disabled):not(.disabled):hover, .close:not(:disabled):not(.disabled):focus {';
		$body .= 'opacity: .75;';
		$body .= '}';

		$body .= '.clearfix::after {';
		$body .= 'display: block;';
		$body .= 'clear: both;';
		$body .= 'content: "";';
		$body .= '}';

		$body .= '@supports ((position: -webkit-sticky) or (position: sticky)) {';
		$body .= '}';

		$body .= '.text-justify {';
		$body .= 'text-align: justify !important;';
		$body .= '}';

		$body .= '@media print {';
		$body .= '*,';
		$body .= '*::before,';
		$body .= '*::after {';
		$body .= 'text-shadow: none !important;';
		$body .= 'box-shadow: none !important;';
		$body .= '}';
		$body .= 'a:not(.btn) {';
		$body .= 'text-decoration: underline;';
		$body .= '}';
		$body .= 'p,';
		$body .= 'h2,';
		$body .= 'h3 {';
		$body .= 'orphans: 3;';
		$body .= 'widows: 3;';
		$body .= '}';
		$body .= 'h2,';
		$body .= 'h3 {';
		$body .= 'page-break-after: avoid;';
		$body .= '}';
		$body .= '@page {';
		$body .= 'size: a3;';
		$body .= '}';
		$body .= 'body {';
		$body .= 'min-width: 992px !important;';
		$body .= '}';
		$body .= '.container {';
		$body .= 'min-width: 992px !important;';
		$body .= '}';
		$body .= '}';
		$body .= '</style>';
		$body .= '<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support" style="height: 100%; color: #8d8d8d; font-family: open sans,sans-serif; font-size: 14px; line-height: 2.2; overflow-x: hidden;">';
		$body .= '<div class="container box-content content clearfix" style="text-align: center;">';
		$body .= '<p class="top-title" style="color: #707070; display: inline-block; font-family: rubik; font-size: 18px; letter-spacing: 2px; position: relative; text-transform: uppercase;">';
		$body .= 'DISC TEST</p>';
		$body .= '<h2 class="content-title" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; font-size: 45px; letter-spacing: 3px; line-height: 1; margin: 0 auto 30px; max-width: 500px; text-transform: uppercase;">';
		$body .= 'DISC Test</h2>';
		$body .= '<h3 class="content-subtitle" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; display: block; font-size: 22px; line-height: 1; margin: 0 0 20px; position: relative; text-transform: uppercase;">Forgot Password</h3>';
		$body .= '<p class="text-justify">Kami mendeteksi bahwa seseorang menekan lupa password pada akun anda. Maka dari itu, kami memberikan kesempatan untuk <i>reset password</i>.</p>';
		// $body .= '<p class="text-justify">Mohon dapat melakukan ganti password setelah anda login ke akun tersebut</p>';
		$body .= '<a href="https://disc.griyapsikologi.com/forgot.php?key='.$key.'&email='.$email.'" style="color: #aaa; text-decoration: none; transition: ease .3s; -webkit-transition: ease .3s; -moz-transition: ease .3s; -o-transition: ease .3s; -ms-transition: ease .3s;"><button style="max-width: 100%; background: #e3451e none repeat scroll 0 0; border: 2px solid #e3451e; color: #fff; display: inline-block; font-family: rubik; font-weight: 500; letter-spacing: 4px; line-height: 1; padding: 14px 30px; text-transform: uppercase; width: auto; transition: ease .3s;">Reset Disini</button></a>';
		$body .= '</div>';
		$body .= '</body>';
		$body .= '</html>';
			// $destination = 'admin.php';
		include 'test-mail.php';
		$email = substr_replace($row['email'], str_repeat('*', $p-2), 1, $p-2);
		$_SESSION['alert-success'] = "Informasi login akan dikirimkan pada email ".$email."";
		?>
		<script type="text/javascript">
			window.location.href = 'admin.php';
		</script>
		<?php
		
	}
	elseif(($select->num_rows) === 0){
		$select = $koneksi->query("SELECT `username`,`email`,`password` FROM `mitra` WHERE `username` = '$forgot' OR `email` = '$forgot'");
		$row = mysqli_fetch_array($select);
		if(($select->num_rows) === 1){
			$p = strpos($row['email'], '@');
			$email = $row['email'];
			$nama = $row['mitra'];
			$subject = "[NOTICE] Lupa Password";
			$body = '<!DOCTYPE html>';
			$body .= '<html style="height: 100%;">';
			$body .= '<style>';
			$body .= '@media (max-width:1024px) {';
			$body .= '}';
			$body .= '@media (max-width: 600px) {';
			$body .= '.top-title::after,';
			$body .= '.top-title::before {';
			$body .= 'display: none;';
			$body .= '}';

			$body .= '.top-title {';
			$body .= 'font-size: 15px;';
			$body .= 'letter-spacing: 1px;';
			$body .= 'margin-bottom: 0;';
			$body .= '}';

			$body .= '.content-title {';
			$body .= 'font-size: 32px;';
			$body .= '}';
			$body .= '}';
			$body .= ':root {';
			$body .= '--blue: #007bff;';
			$body .= '--indigo: #6610f2;';
			$body .= '--purple: #6f42c1;';
			$body .= '--pink: #e83e8c;';
			$body .= '--red: #dc3545;';
			$body .= '--orange: #fd7e14;';
			$body .= '--yellow: #ffc107;';
			$body .= '--green: #28a745;';
			$body .= '--teal: #20c997;';
			$body .= '--cyan: #17a2b8;';
			$body .= '--white: #fff;';
			$body .= '--gray: #6c757d;';
			$body .= '--gray-dark: #343a40;';
			$body .= '--primary: #007bff;';
			$body .= '--secondary: #6c757d;';
			$body .= '--success: #28a745;';
			$body .= '--info: #17a2b8;';
			$body .= '--warning: #ffc107;';
			$body .= '--danger: #dc3545;';
			$body .= '--light: #f8f9fa;';
			$body .= '--dark: #343a40;';
			$body .= '--breakpoint-xs: 0;';
			$body .= '--breakpoint-sm: 576px;';
			$body .= '--breakpoint-md: 768px;';
			$body .= '--breakpoint-lg: 992px;';
			$body .= '--breakpoint-xl: 1200px;';
			$body .= '--font-family-sans-serif: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
			$body .= '--font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;';
			$body .= '}';

			$body .= '*,';
			$body .= '*::before,';
			$body .= '*::after {';
			$body .= 'box-sizing: border-box;';
			$body .= '}';

			$body .= 'html {';
			$body .= 'font-family: sans-serif;';
			$body .= 'line-height: 1.15;';
			$body .= '-webkit-text-size-adjust: 100%;';
			$body .= '-webkit-tap-highlight-color: rgba(0, 0, 0, 0);';
			$body .= '}';

			$body .= 'body {';
			$body .= 'margin: 0;';
			$body .= 'font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";';
			$body .= 'font-size: 1rem;';
			$body .= 'font-weight: 400;';
			$body .= 'line-height: 1.5;';
			$body .= 'color: #212529;';
			$body .= 'text-align: left;';
			$body .= 'background-color: #fff;';
			$body .= '}';

			$body .= 'h2, h3 {';
			$body .= 'margin-top: 0;';
			$body .= 'margin-bottom: 0.5rem;';
			$body .= '}';

			$body .= 'p {';
			$body .= 'margin-top: 0;';
			$body .= 'margin-bottom: 1rem;';
			$body .= '}';

			$body .= 'b {';
			$body .= 'font-weight: bolder;';
			$body .= '}';

			$body .= 'a {';
			$body .= 'color: #007bff;';
			$body .= 'text-decoration: none;';
			$body .= 'background-color: transparent;';
			$body .= '}';

			$body .= 'a:hover {';
			$body .= 'color: #0056b3;';
			$body .= 'text-decoration: underline;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'border-radius: 0;';
			$body .= '}';

			$body .= 'button:focus {';
			$body .= 'outline: 1px dotted;';
			$body .= 'outline: 5px auto -webkit-focus-ring-color;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'margin: 0;';
			$body .= 'font-family: inherit;';
			$body .= 'font-size: inherit;';
			$body .= 'line-height: inherit;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'overflow: visible;';
			$body .= '}';

			$body .= 'button {';
			$body .= 'text-transform: none;';
			$body .= '}';

			$body .= 'button {';
			$body .= '-webkit-appearance: button;';
			$body .= '}';

			$body .= 'button:not(:disabled),';
			$body .= '[type="button"]:not(:disabled),';
			$body .= '[type="reset"]:not(:disabled),';
			$body .= '[type="submit"]:not(:disabled) {';
			$body .= 'cursor: pointer;';
			$body .= '}';

			$body .= 'button::-moz-focus-inner {';
			$body .= 'padding: 0;';
			$body .= 'border-style: none;';
			$body .= '}';

			$body .= '::-webkit-file-upload-button {';
			$body .= 'font: inherit;';
			$body .= '-webkit-appearance: button;';
			$body .= '}';

			$body .= 'h2, h3 {';
			$body .= 'margin-bottom: 0.5rem;';
			$body .= 'font-weight: 500;';
			$body .= 'line-height: 1.2;';
			$body .= '}';

			$body .= 'h2 {';
			$body .= 'font-size: 2rem;';
			$body .= '}';

			$body .= 'h3 {';
			$body .= 'font-size: 1.75rem;';
			$body .= '}';

			$body .= '.container {';
			$body .= 'width: 100%;';
			$body .= 'padding-right: 15px;';
			$body .= 'padding-left: 15px;';
			$body .= 'margin-right: auto;';
			$body .= 'margin-left: auto;';
			$body .= '}';

			$body .= '@media (min-width: 576px) {';
			$body .= '.container {';
			$body .= 'max-width: 540px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 768px) {';
			$body .= '.container {';
			$body .= 'max-width: 720px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 992px) {';
			$body .= '.container {';
			$body .= 'max-width: 960px;';
			$body .= '}';
			$body .= '}';

			$body .= '@media (min-width: 1200px) {';
			$body .= '.container {';
			$body .= 'max-width: 1140px;';
			$body .= '}';
			$body .= '}';

			$body .= '.was-validated .custom-control-input:valid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-valid:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #28a745;';
			$body .= '}';

			$body .= '.was-validated .custom-control-input:invalid:focus:not(:checked) ~ .custom-control-label::before, .custom-control-input.is-invalid:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #dc3545;';
			$body .= '}';

			$body .= '.btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #0062cc;';
			$body .= 'border-color: #005cbf;';
			$body .= '}';

			$body .= '.btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);';
			$body .= '}';

			$body .= '.btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #545b62;';
			$body .= 'border-color: #4e555b;';
			$body .= '}';

			$body .= '.btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(130, 138, 145, 0.5);';
			$body .= '}';

			$body .= '.btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #1e7e34;';
			$body .= 'border-color: #1c7430;';
			$body .= '}';

			$body .= '.btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(72, 180, 97, 0.5);';
			$body .= '}';

			$body .= '.btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #117a8b;';
			$body .= 'border-color: #10707f;';
			$body .= '}';

			$body .= '.btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(58, 176, 195, 0.5);';
			$body .= '}';

			$body .= '.btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #d39e00;';
			$body .= 'border-color: #c69500;';
			$body .= '}';

			$body .= '.btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(222, 170, 12, 0.5);';
			$body .= '}';

			$body .= '.btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #bd2130;';
			$body .= 'border-color: #b21f2d;';
			$body .= '}';

			$body .= '.btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(225, 83, 97, 0.5);';
			$body .= '}';

			$body .= '.btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #dae0e5;';
			$body .= 'border-color: #d3d9df;';
			$body .= '}';

			$body .= '.btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(216, 217, 219, 0.5);';
			$body .= '}';

			$body .= '.btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #1d2124;';
			$body .= 'border-color: #171a1d;';
			$body .= '}';

			$body .= '.btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(82, 88, 93, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #007bff;';
			$body .= 'border-color: #007bff;';
			$body .= '}';

			$body .= '.btn-outline-primary:not(:disabled):not(.disabled):active:focus, .btn-outline-primary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active, .btn-outline-secondary:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #6c757d;';
			$body .= 'border-color: #6c757d;';
			$body .= '}';

			$body .= '.btn-outline-secondary:not(:disabled):not(.disabled):active:focus, .btn-outline-secondary:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-success:not(:disabled):not(.disabled):active, .btn-outline-success:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #28a745;';
			$body .= 'border-color: #28a745;';
			$body .= '}';

			$body .= '.btn-outline-success:not(:disabled):not(.disabled):active:focus, .btn-outline-success:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-info:not(:disabled):not(.disabled):active, .btn-outline-info:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #17a2b8;';
			$body .= 'border-color: #17a2b8;';
			$body .= '}';

			$body .= '.btn-outline-info:not(:disabled):not(.disabled):active:focus, .btn-outline-info:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active, .btn-outline-warning:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #ffc107;';
			$body .= 'border-color: #ffc107;';
			$body .= '}';

			$body .= '.btn-outline-warning:not(:disabled):not(.disabled):active:focus, .btn-outline-warning:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active, .btn-outline-danger:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #dc3545;';
			$body .= 'border-color: #dc3545;';
			$body .= '}';

			$body .= '.btn-outline-danger:not(:disabled):not(.disabled):active:focus, .btn-outline-danger:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-light:not(:disabled):not(.disabled):active, .btn-outline-light:not(:disabled):not(.disabled).active {';
			$body .= 'color: #212529;';
			$body .= 'background-color: #f8f9fa;';
			$body .= 'border-color: #f8f9fa;';
			$body .= '}';

			$body .= '.btn-outline-light:not(:disabled):not(.disabled):active:focus, .btn-outline-light:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);';
			$body .= '}';

			$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active, .btn-outline-dark:not(:disabled):not(.disabled).active {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #343a40;';
			$body .= 'border-color: #343a40;';
			$body .= '}';

			$body .= '.btn-outline-dark:not(:disabled):not(.disabled):active:focus, .btn-outline-dark:not(:disabled):not(.disabled).active:focus {';
			$body .= 'box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);';
			$body .= '}';

			$body .= '.custom-control-input:focus:not(:checked) ~ .custom-control-label::before {';
			$body .= 'border-color: #80bdff;';
			$body .= '}';

			$body .= '.custom-control-input:not(:disabled):active ~ .custom-control-label::before {';
			$body .= 'color: #fff;';
			$body .= 'background-color: #b3d7ff;';
			$body .= 'border-color: #b3d7ff;';
			$body .= '}';

			$body .= '.close:not(:disabled):not(.disabled):hover, .close:not(:disabled):not(.disabled):focus {';
			$body .= 'opacity: .75;';
			$body .= '}';

			$body .= '.clearfix::after {';
			$body .= 'display: block;';
			$body .= 'clear: both;';
			$body .= 'content: "";';
			$body .= '}';

			$body .= '@supports ((position: -webkit-sticky) or (position: sticky)) {';
			$body .= '}';

			$body .= '.text-justify {';
			$body .= 'text-align: justify !important;';
			$body .= '}';

			$body .= '@media print {';
			$body .= '*,';
			$body .= '*::before,';
			$body .= '*::after {';
			$body .= 'text-shadow: none !important;';
			$body .= 'box-shadow: none !important;';
			$body .= '}';
			$body .= 'a:not(.btn) {';
			$body .= 'text-decoration: underline;';
			$body .= '}';
			$body .= 'p,';
			$body .= 'h2,';
			$body .= 'h3 {';
			$body .= 'orphans: 3;';
			$body .= 'widows: 3;';
			$body .= '}';
			$body .= 'h2,';
			$body .= 'h3 {';
			$body .= 'page-break-after: avoid;';
			$body .= '}';
			$body .= '@page {';
			$body .= 'size: a3;';
			$body .= '}';
			$body .= 'body {';
			$body .= 'min-width: 992px !important;';
			$body .= '}';
			$body .= '.container {';
			$body .= 'min-width: 992px !important;';
			$body .= '}';
			$body .= '}';
			$body .= '</style>';
			$body .= '<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support" style="height: 100%; color: #8d8d8d; font-family: open sans,sans-serif; font-size: 14px; line-height: 2.2; overflow-x: hidden;">';
			$body .= '<div class="container box-content content clearfix" style="text-align: center;">';
			$body .= '<p class="top-title" style="color: #707070; display: inline-block; font-family: rubik; font-size: 18px; letter-spacing: 2px; position: relative; text-transform: uppercase;">';
			$body .= 'DISC TEST</p>';
			$body .= '<h2 class="content-title" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; font-size: 45px; letter-spacing: 3px; line-height: 1; margin: 0 auto 30px; max-width: 500px; text-transform: uppercase;">';
			$body .= 'Lupa Password</h2>';
			$body .= '<h3 class="content-subtitle" style="font-weight: bold; font-family: Rubik,sans-serif; color: #000; display: block; font-size: 22px; line-height: 1; margin: 0 0 20px; position: relative; text-transform: uppercase;">Halo, Admin</h3>';
			$body .= '<p class="text-justify">Kami mendeteksi bahwa seseorang menekan lupa password pada akun anda. Maka dari itu, kami akan menginformasikan pada email yang terdaftar informasi akun anda:</p>';
			$body .= '<p class="text-justify">Email: <b><?php echo($row[email]); ?></b></p>';
			$body .= '<p class="text-justify">Email: <b>'.$row["email"].'</b></p>';
			$body .= '<p class="text-justify">Password: <b>'.$row["password"].'</b></p>';
			$body .= '<a href="disc.griyapsikologi.com/admin.php" style="color: #aaa; text-decoration: none; transition: ease .3s; -webkit-transition: ease .3s; -moz-transition: ease .3s; -o-transition: ease .3s; -ms-transition: ease .3s;"><button style="max-width: 100%; background: #e3451e none repeat scroll 0 0; border: 2px solid #e3451e; color: #fff; display: inline-block; font-family: rubik; font-weight: 500; letter-spacing: 4px; line-height: 1; padding: 14px 30px; text-transform: uppercase; width: auto; transition: ease .3s;">Login Disini</button></a>';
			$body .= '</div>';
			$body .= '</body>';
			$body .= '</html>';
			// $destination = 'admin.php';
			require 'test-mail.php';
			$email = substr_replace($row['email'], str_repeat('*', $p-2), 1, $p-2);
			$_SESSION['alert-success'] = "Informasi login akan dikirimkan pada email ".$email."";
			?>
			<script type="text/javascript">
				window.location.href = 'admin.php';
			</script>
			<?php
			
		}
		elseif(($select->num_rows) === 0){
			$_SESSION['alert-warning'] = "Username atau email tidak terdaftar";
			header("Location: admin.php");
			
		}
	}
	else{
		$_SESSION['alert-warning'] = "Username atau email tidak terdaftar";
		header("Location: admin.php");
		
	}
}

if (isset($_POST['newPassword']) && isset($_POST['confirmPassword'])) {
	$newPassword = md5(FILTER_INPUT(INPUT_POST, 'newPassword'));
	if(isset($_POST['email'])){
		$email = FILTER_INPUT(INPUT_POST, 'email');
	}
	$select = $koneksi->query("SELECT * FROM `admin` WHERE `email` = '$email'");
	$row = mysqli_fetch_array($select);
	if(($select->num_rows) === 1){
		$update = $koneksi->query("UPDATE `admin` SET `password` = '$newPassword' WHERE `email` = '$email'");
		$delete = $koneksi->query("DELETE FROM `password_reset` WHERE `email` = '$email'");
		$_SESSION['alert-success'] = "Reset Password sukses, silahkan login kembali";
		header("Location: admin.php");
	}

	elseif(($select->num_rows) === 0){
		$select = $koneksi->query("SELECT * FROM `mitra` WHERE `email` = '$email'");
		$row = mysqli_fetch_array($select);
		if(($select->num_rows) === 1){
			$update = $koneksi->query("UPDATE `mitra` SET `password` = '$newPassword' WHERE `email` = '$email'");
			$delete = $koneksi->query("DELETE FROM `password_reset` WHERE `email` = '$email'");
			$_SESSION['alert-success'] = "Reset Password sukses, silahkan login kembali";
			header("Location: admin.php");
		}
		elseif(($select->num_rows) === 0){
			$_SESSION['alert-warning'] = "Terjadi kesalahan, coba kembali";
			header("Location: admin.php");
			
		}
	}
}
?>