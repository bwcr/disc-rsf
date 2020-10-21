<?php
require_once('connection.php');

if (isset(session_get('username')) && session_get('password')) {
	unset(session_get('username'));
	unset(session_get('password'));
	session_destroy();
}

if(isset(get('id_mitra')) && isset(get('nama')) && isset(get('email'))){
	$id = filter_var(get('id_mitra'), FILTER_SANITIZE_STRING);
	$nama = filter_var(get('nama'), FILTER_SANITIZE_STRING);
	$email = filter_var(get('email'), FILTER_SANITIZE_EMAIL);
	$viewmitra = $koneksi->query("SELECT * FROM `mitra` WHERE `id_mitra` = '$id'");
	$rowmitra = mysqli_fetch_array($viewmitra);
	$viewresponden = $koneksi->query("SELECT * FROM `data_diri_pending` WHERE `email` = '$email' AND `nama` = '$nama'");
	if ($viewresponden->num_rows == 0) {
		$message = "Data anda tidak masuk ke dalam mitra";
		?>
		<script type='text/javascript'>
		alert('<?= $message ?>');
		window.location.href = 'index.php';
		</script>";
		<?php
	}
	else{
		$rowresponden = mysqli_fetch_array($viewresponden);
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Registrasi | DISC Test Griya Psikologi</title>
	<link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
	<link rel="stylesheet" type="text/css" href="css/benten.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.row {
			margin-right: unset;
			margin-left: unset;
		}
	</style>
</head>

<body style="background-color: #EEEEEE"
	class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default p-0 elementor-page elementor-page-93 customize-support">
	<div class="container justify-content-center p-0">
		<div class="border bg-white border-light shadow-sm m-md-5 mx-auto m-0 justify-content-md-center">
			<?php
			if (isset($rowmitra['id_mitra'])) { ?>
				<div class="py-5 box-content clearfix mx-4 mx-sm-5">
				<img width="200px" class="mx-auto mb-4 d-block" src="image/logo/<?php $rowmitra["logo"] ?>">
			<?php }
			else{ ?>
				<div class="box-content py-4 clearfix mx-4 mx-sm-5">
			<?php }
			?>
			<p class="top-title">
				DISC TEST</p>
			<h2 class="content-title">
				Registrasi</h2>
			<form id="formResponden" action="disc-test.php" method="POST">
				<div>
					<div class="form-row">
						<div class="col-12 col-md-6">
							<input type="text" name="namaDepan" placeholder="Nama Depan..." required="required">
						</div>
						<div class="col-12 col-md-6">
							<input type="text" name="namaBelakang" placeholder="Nama Belakang...(optional)">
						</div>
					</div>
					<?php
					if (isset($rowresponden['nama']) && isset($rowresponden['email'])) { ?>
					<input type="hidden" name="nama" value="<?= $rowresponden["nama"] ?>"
						placeholder="Nama Lengkap..." required="required"> ';
					<table class="table table-borderless mx-auto w-75">
						<tbody>
							<th>
							<td>Nama: <?= $nama ?></td>
							<td>Email: <?= $email ?></td>
							</th>
						</tbody>
					</table>
					<input type="text" name="usia" placeholder="Usia..." required="required">
					<input type="hidden" value="<?= $rowresponden['email'] ?>" name="email" placeholder="Email..."
						required="required">
					<?php
					}
					else{
						?>
					<input type="text" name="usia" placeholder="Usia..." required="required">
					<input type="email" name="email" placeholder="Email..." required="required">
					<?php
					}
					?>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-xs-4">
						<label class="container-checkmark">Laki-Laki
							<input type="radio" name="gender" value="Laki-laki" required="required">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="col-md-6 col-xs-4">
						<label class="container-checkmark">Perempuan
							<input type="radio" name="gender" value="Perempuan" required="required">
							<span class="checkmark"></span>
						</label>
					</div>
				</div>
				<br>
				<?php
				if(isset($rowresponden['id_mitra'])){?>					
					<input type="hidden" name="id_mitra" value="<?= $idMitra ?>">
				<?php
				}
				?>
				<button type="submit">SUBMIT</button>
			</form>
		</div>
	</div>
</body>
<script>
	$(document).ready(function () {
		jQuery.validator.addMethod("lettersonly", function (value, element) {
			return this.optional(element) || /^[a-z\s]+$/i.test(value);
		}, "Gunakan alphabet");

		jQuery.validator.addMethod("noSpace", function (value, element) {
			return value.indexOf(" ") < 0 && value != "";
		}, "Hindari menggunakan spasi");

		$("#formResponden").validate({
			// lang: 'fi',
			rules: {
				namaDepan: {
					required: true,
					lettersonly: true,
					noSpace: true
				},
				namaBelakang: {
					lettersonly: true,
				},
				email: {
					required: true,
					email: true
				},
				usia: {
					required: true,
					number: true,
					max: 100
				}
			},
			message: {
				gender: ""
			}
		});
		/*
		 * Translated default messages for the jQuery validation plugin.
		 * Locale: ID (Indonesia; Indonesian)
		 */
		$.extend($.validator.messages, {
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
			maxlength: $.validator.format("Input dibatasi hanya {0} karakter."),
			minlength: $.validator.format("Input tidak kurang dari {0} karakter."),
			rangelength: $.validator.format("Panjang karakter yg diizinkan antara {0} dan {1} karakter."),
			range: $.validator.format("Harap masukkan nilai antara {0} dan {1}."),
			max: $.validator.format("Harap masukkan nilai lebih kecil atau sama dengan {0}."),
			min: $.validator.format("Harap masukkan nilai lebih besar atau sama dengan {0}.")
		});
	});
</script>

</html>