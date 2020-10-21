<?php
session_start();

require_once 'connection.php';

if (session_get('username') && session_get('password') || session_get('username_admin')) && session_get('password_admin')) {
	session_destroy();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Admin DISC Test Griya Psikologi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="
	sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
	<link rel="stylesheet" type="text/css" href="css/benten.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-color: #eeee" class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support">
	<div class="box-content content clearfix row justify-content-center">
		<div class="border bg-white border-light shadow-sm p-5">
			<p class="top-title">
			ADMIN</p>
			<h2 class="content-title">
			LOG IN</h2>
			<form action="validation.php" method="POST">
				<div class="mb-3">
					<input type="text" name="username" placeholder="Username..." required="required"> 
					<input type="password" name="password" placeholder="Password..." required="required">
				</div>
				<?php
				if(session_get('alert-warning')){
					?>
					<div class="alert alert-warning" role="alert">
						<?= session_get('alert-warning') ?>
					</div>
					<?php
					session_remove('alert-warning');
				}
				elseif(session_get('alert-success')){
					?>
					<div class="alert alert-success" role="alert">
						<?= session_get('alert-success') ?>
					</div>
					<?php
					session_remove('alert-success');
				}
				?>
				<!-- Modal -->
				<br>
				<button type="submit">SUBMIT</button>
			</form>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="validation.php" method="POST">
								<label>Masukkan Email atau Username</label>
								<input type="text" name="forgot" placeholder="Email atau Username..." required="required">
							</div>
							<div class="modal-footer">
								<button type="submit">SUBMIT</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>