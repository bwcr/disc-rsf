<?php
require_once 'connection.php';

session_start();

if(isset($_SESSION) && isset($_POST) && !isset($_GET['id'])){
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['username_admin']);
	unset($_SESSION['password_password']);
	session_destroy();
}

if(!isset($_SESSION['username']) || !isset($_SESSION['username_admin'])){
	if(!isset($_POST)){
		$_SESSION['error_code'] = '40004';
		header('Location: 404.php');
	}
}

if(isset($_POST)){
	if (!isset($_POST['namaDepan']) && !isset($_GET['id'])){
		$_SESSION['error_code'] = '40005';
		header('Location: 404.php');
	}
}

if(isset($_GET['id'])){
	if (isset($_SESSION['username']) || isset($_SESSION['username_admin'])) {
		$id = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
		$view = $koneksi->query("SELECT * FROM `data_diri` WHERE md5(`id`) = '$id'");
		$rowview = mysqli_fetch_array($view);
	}
}

elseif(isset($_GET['id']) && !isset($_POST[''])){
	if (!isset($_SESSION['username']) || !isset($_SESSION['username_admin'])) {
		$_SESSION['error_code'] = '40004';
		header('Location: 404.php');
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Soal | DISC Test Griya Psikologi</title>
	<link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/benten.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>
		.table {
			height: 100%;
		}

		<blade media|%20(max-width%3A%20350px)%7B%0D>#span {
			display: none
		}
		}

		<blade media|%20(max-width%3A%20992px)%7B%0D>.col-lg:nth-child(1) {
			padding-bottom: 1.5em !important;
		}
		}
	</style>
	<script>
		(function ($) {
			$.fn.shuffle = function () {
				return this.each(function () {
					var items = $(this).children();
					return (items.length) ?
						$(this).html($.shuffle(items)) :
						this;
				});
			}

			$.shuffle = function (arr) {
				for (
					var j, x, i = arr.length; i; j = parseInt(Math.random() * i),
					x = arr[--i], arr[i] = arr[j], arr[j] = x
				);
				return arr;
			}
			//Shuffle all rows, don't tpuch first column
			//Requires: Shuffle
			$.fn.shuffleRows = function () {
				return this.each(function () {
					var main = $(/table/i.test(this.tagName) ? this.tBodies[0] : this);
					var firstElem = [],
						counter = 0;
					main.children().each(function () {
						firstElem.push(this.firstChild);
					});
					main.shuffle();
					main.children().each(function () {
						this.insertBefore(firstElem[counter++], this.firstChild);
					});
				});
			}
		})(jQuery)
	</script>
	<script>
		$(document).ready(function () {
			//Form Shuffle
			$("form").shuffle();
			$("tbody>tr>th").each(function () {
				var i = 1;
				// console.log($("tbody>tr>th").length);
				// console.log($("input:radio").length);
				$("tbody>tr>th").html(function (i, text) {
					return (i + 1);
				});
			});
			//Radio Button
			<?php
			for ($i = 1; $i < 25; $i++) {
				?>
				//Button Kanan
				$(".soal-<?= $i ?> tr:nth-child(2) > td:nth-child(2) > label > input").click(function () {
					$(".soal-<?= $i ?> tr:nth-child(2) > td:first-child > label > input").prop("checked", false);
				});
				$(".soal-<?= $i ?> tr:nth-child(3) > td:nth-child(2) > label > input").click(function () {
					$(".soal-<?= $i ?> tr:nth-child(3) > td:first-child > label > input").prop("checked", false);
				});
				$(".soal-<?= $i ?> tr:nth-child(4) > td:nth-child(2) > label > input").click(function () {
					$(".soal-<?= $i ?> tr:nth-child(4) > td:first-child > label > input").prop("checked", false);
				});
				$(".soal-<?= $i ?> tr:nth-child(5) > td:nth-child(2) > label > input").click(function () {
					$(".soal-<?= $i ?> tr:nth-child(5) > td:first-child > label > input").prop("checked", false);
				});
				//Button Kiri
				<?php
				for ($j = 2; $j < 6; $j++) {
					?>
					$(".soal-<?= $i ?> tr:nth-child(<?= $j ?>) > td:first-child > label > input").click(function () {
						$(".soal-<?= $i ?> tr:nth-child(<?= $j ?>) > td:nth-child(2) > label > input").prop( "checked", false);
					}); <?php
				}
			}; ?>
			//Validasi Jawaban
			$(".button").click(function (e) {
				if ($("input:checked:not('#instruksi')").length != 48) {
					alert("Lengkapi yang kosong");
					e.preventDefault(e);
				} else {
					$("form").submit();
				}
			})
			$("input:radio").click(function () {
				var length = $('input:checked:not("#instruksi")').length;
				lengthDiv = length / 2;
				lengthMod = length % 2;
				if (lengthMod === 0) {
					$("#span").html(function (i, text) {
						return (lengthDiv) + "/24 Soal Terjawab";
					})
				}
				console.log($('input:checked').length)
				if ($("input:checked:not('#instruksi')").length != 48) {
					$(".button").prop("disabled", true);
				} else {
					$(".button").prop("disabled", false);
				}
			})
		});
		//Button
	</script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("input:radio").click(function () {
				for (var i = 0; i < $("input:radio").length; i++) {
					if ($("#radio-" + i + "").is(":checked")) {
						$("#hidden-" + i + "").val("1");
					} else {
						$("#hidden-" + i + "").val("0");
					}
				}
			});
		})
	</script>
</head>

<body style="background-color: #EEEEEE">
	<?php
	if(isset($_SESSION['username']) || isset($_SESSION['username_admin'])){ ?>
	<nav class="navbar navbar-expand-lg bg-light">
		<ul class="navbar nav">
			<li class="nav-item">
				<a class="nav-link active" href="results.php?id=<?= $id ?>"><i class="fas fa-chevron-left"></i> Kembali
					ke Hasil Tes</a>
			</li>
		</ul>
	</nav>
	<?php
	}
	else{
	?>
	<!-- Modal -->
	<div class="modal fade" id="tutorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content border-light shadow-sm">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTutorial">Tutorial DISC Test</h5>
				</div>
				<div class="modal-body">
					<!-- <h2>DISC personality test instruction</h2> -->
					<p>Tes ini terdiri dari 24 Soal dan 2 jawaban setiap soal. Jawab secara jujur dan spontan. Estimasi
						waktu pengerjaan adalah 5-10 menit</p>
					<ul>
						<li>Pelajari semua jawaban pada setiap pilihan</li>
						<li>Pilih satu jawaban yang <strong>paling mendekati diri kamu</strong> (<i
								style="color:#56DB28" class="fas fa-thumbs-up"></i>)</li>
						<li>Pilih satu jawaban yang <strong>paling tidak mendekati diri kamu</strong> (<i
								style="color:#E3451E" class="fas fa-thumbs-down"></i>)</li>
					</ul><br>
					<p>Pada setiap soal harus memiliki jawaban <ins>satu</ins> <strong>paling mendekati diri
							kamu</strong> dan hanya <ins>satu</ins> <strong>paling tidak mendekati diri kamu</strong>.
					</p>
					<p>Terkadang akan sedikit sulit untuk memutuskan jawaban yang terbaik. Ingat, tidak ada jawaban yang
						benar atau salah dalam tes ini.</p>
				</div>
				<div class="modal-footer">
					<div class="text-left">
						<input type="checkbox" id="instruksi">
						<label class="small">Saya telah memahami instruksi dan siap mengerjakan tes</label>
					</div>
					<button type="button" id="mengerti" class="small px-2" disabled
						data-dismiss="modal">Mengerti</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	?>
	<div class="container clearfix card p-4 mb-5 my-md-5" style="background-color: #f9f9f9">
		<div class="box-content">
			<?php
			if (isset($_GET['id'])) { ?>
			<p class='top-title'>
				JAWABAN</p>
			<?php
			}
			else { ?>
			<p class='top-title'>
				SOAL</p>
			<h2 class='content-title'>
				DISC TEST</h2>
			<?php
			}
			?>
		</div>
		<form action="calculate.php" method="POST">
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-1">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-1" name="h-1" value="0">
										<input type="radio" id="radio-1" name="p[1]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-2" name="h-2" value="0">
										<input type="radio" id="radio-2" name="k[1]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mudah Bergaul, Ramah, Mudah Setuju</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-3" name="h-3" value="0">
										<input type="radio" id="radio-3" name="p[1]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-4" name="h-4" value="0">
										<input type="radio" id="radio-4" name="k[1]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mempercayai, Percaya Pada Orang Lain</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-5" name="h-5" value="0">
										<input type="radio" id="radio-5" name="p[1]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-6" name="h-6" value="0">
										<input type="radio" id="radio-6" name="k[1]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Petualang, Suka Mengambil Resiko</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-7" name="h-7" value="0">
										<input type="radio" id="radio-7" name="p[1]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-8" name="h-8" value="0">
										<input type="radio" id="radio-8" name="k[1]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Penuh Toleransi, Menghormati Orang Lain</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-2">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-9" name="h-9" value="0">
										<input type="radio" id="radio-9" name="p[2]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-10" name="h-10" value="0">
										<input type="radio" id="radio-10" name="k[2]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Yang Penting Adalah Hasil</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-11" name="h-11" value="0">
										<input type="radio" id="radio-11" name="p[2]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-12" name="h-12" value="0">
										<input type="radio" id="radio-12" name="k[2]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Kerjakan Dengan Benar, Ketepatan Sangat Penting</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-13" name="h-13" value="0">
										<input type="radio" id="radio-13" name="p[2]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-14" name="h-14" value="0">
										<input type="radio" id="radio-14" name="k[2]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Buat Agar Menyenangkan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-15" name="h-15" value="0">
										<input type="radio" id="radio-15" name="p[2]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-16" name="h-16" value="0">
										<input type="radio" id="radio-16" name="k[2]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Kerjakan Bersama-sama</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-3">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-17" name="h-17" value="0">
										<input type="radio" id="radio-17" name="p[3]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-18" name="h-18" value="0">
										<input type="radio" id="radio-18" name="k[3]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pendidikan, Kebudayaan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-19" name="h-19" value="0">
										<input type="radio" id="radio-19" name="p[3]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-20" name="h-20" value="0">
										<input type="radio" id="radio-20" name="k[3]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Prestasi, Penghargaan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-21" name="h-21" value="0">
										<input type="radio" id="radio-21" name="p[3]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-22" name="h-22" value="0">
										<input type="radio" id="radio-22" name="k[3]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Keselamatan, Keamanan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-23" name="h-23" value="0">
										<input type="radio" id="radio-23" name="p[3]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-24" name="h-24" value="0">
										<input type="radio" id="radio-24" name="k[3]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Sosial, Pertemuan, Kelompok</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-4">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-25" name="h-25" value="0">
										<input type="radio" id="radio-25" name="p[4]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-26" name="h-26" value="0">
										<input type="radio" id="radio-26" name="k[4]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Lembut Tertutup</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-27" name="h-27" value="0">
										<input type="radio" id="radio-27" name="p[4]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-28" name="h-28" value="0">
										<input type="radio" id="radio-28" name="k[4]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Visionary / Pandangan Ke Masa Depan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-29" name="h-29" value="0">
										<input type="radio" id="radio-29" name="p[4]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-30" name="h-30" value="0">
										<input type="radio" id="radio-30" name="k[4]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pusat Perhatian, Suka Bersosialisasi</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-31" name="h-31" value="0">
										<input type="radio" id="radio-31" name="p[4]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-32" name="h-32" value="0">
										<input type="radio" id="radio-32" name="k[4]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pendamai, Membawa Ketenangan</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-5">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-33" name="h-33" value="0">
										<input type="radio" id="radio-33" name="p[5]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-34" name="h-34" value="0">
										<input type="radio" id="radio-34" name="k[5]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menahan Diri, Bisa Hidup Tanpa Memiliki</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-35" name="h-35" value="0">
										<input type="radio" id="radio-35" name="p[5]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-36" name="h-36" value="0">
										<input type="radio" id="radio-36" name="k[5]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Membeli Karena Dorongan Hasrat / Impulse</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-37" name="h-37" value="0">
										<input type="radio" id="radio-37" name="p[5]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-38" name="h-38" value="0">
										<input type="radio" id="radio-38" name="k[5]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Akan Menunggu, Tanpa Tekanan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-39" name="h-39" value="0">
										<input type="radio" id="radio-39" name="p[5]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-40" name="h-40" value="0">
										<input type="radio" id="radio-40" name="k[5]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Akan Membeli Apa Yang Diinginkan</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-6">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-41" name="h-41" value="0">
										<input type="radio" id="radio-41" name="p[6]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-42" name="h-42" value="0">
										<input type="radio" id="radio-42" name="k[6]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mengambil Kendali, Bersikap Langsung / Direct</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-43" name="h-43" value="0">
										<input type="radio" id="radio-43" name="p[6]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-44" name="h-44" value="0">
										<input type="radio" id="radio-44" name="k[6]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Suka Bergaul, Antusias</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-45" name="h-45" value="0">
										<input type="radio" id="radio-45" name="p[6]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-46" name="h-46" value="0">
										<input type="radio" id="radio-46" name="k[6]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mudah Ditebak, Konsisten</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-47" name="h-47" value="0">
										<input type="radio" id="radio-47" name="p[6]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-48" name="h-48" value="0">
										<input type="radio" id="radio-48" name="k[6]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Waspada, Berhati-hati</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-7">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-49" name="h-49" value="0">
										<input type="radio" id="radio-49" name="p[7]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-50" name="h-50" value="0">
										<input type="radio" id="radio-50" name="k[7]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyemangati Orang Lain</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-51" name="h-51" value="0">
										<input type="radio" id="radio-51" name="p[7]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-52" name="h-52" value="0">
										<input type="radio" id="radio-52" name="k[7]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berusaha Mencapai Kesempurnaan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-53" name="h-53" value="0">
										<input type="radio" id="radio-53" name="p[7]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-54" name="h-54" value="0">
										<input type="radio" id="radio-54" name="k[7]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Bagian Dari Tim / Kelompok</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-55" name="h-55" value="0">
										<input type="radio" id="radio-55" name="p[7]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-56" name="h-56" value="0">
										<input type="radio" id="radio-56" name="k[7]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Menetapkan Goal / Tujuan</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-8">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-57" name="h-57" value="0">
										<input type="radio" id="radio-57" name="p[8]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-58" name="h-58" value="0">
										<input type="radio" id="radio-58" name="k[8]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Bersahabat, Mudah Bergaul</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-59" name="h-59" value="0">
										<input type="radio" id="radio-59" name="p[8]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-60" name="h-60" value="0">
										<input type="radio" id="radio-60" name="k[8]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Unik, Bosan Terhadap Rutinitas</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-61" name="h-61" value="0">
										<input type="radio" id="radio-61" name="p[8]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-62" name="h-62" value="0">
										<input type="radio" id="radio-62" name="k[8]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Aktif Melakukan Perubahan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-63" name="h-63" value="0">
										<input type="radio" id="radio-63" name="p[8]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-64" name="h-64" value="0">
										<input type="radio" id="radio-64" name="k[8]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Segala Sesuatu Akurat dan Pasti</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-9">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5"></th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-65" name="h-65" value="0">
										<input type="radio" id="radio-65" name="p[9]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-66" name="h-66" value="0">
										<input type="radio" id="radio-66" name="k[9]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Sulit Dikalahkan / Ditundukkan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-67" name="h-67" value="0">
										<input type="radio" id="radio-67" name="p[9]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-68" name="h-68" value="0">
										<input type="radio" id="radio-68" name="k[9]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Melaksanakan Sesuai Perintah</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-69" name="h-69" value="0">
										<input type="radio" id="radio-69" name="p[9]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-70" name="h-70" value="0">
										<input type="radio" id="radio-70" name="k[9]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Bersemangat, Riang</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-71" name="h-71" value="0">
										<input type="radio" id="radio-71" name="p[9]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-72" name="h-72" value="0">
										<input type="radio" id="radio-72" name="k[9]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Keteraturan, Rapi</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-10">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">10</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-73" name="h-73" value="0">
										<input type="radio" id="radio-73" name="p[10]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-74" name="h-74" value="0">
										<input type="radio" id="radio-74" name="k[10]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menjadi Frustasi</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-75" name="h-75" value="0">
										<input type="radio" id="radio-75" name="p[10]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-76" name="h-76" value="0">
										<input type="radio" id="radio-76" name="k[10]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Memendam Perasaan Dalam Hati</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-77" name="h-77" value="0">
										<input type="radio" id="radio-77" name="p[10]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-78" name="h-78" value="0">
										<input type="radio" id="radio-78" name="k[10]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyampaikan Sudut Pandang Pribadi</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-79" name="h-79" value="0">
										<input type="radio" id="radio-79" name="p[10]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-80" name="h-80" value="0">
										<input type="radio" id="radio-80" name="k[10]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berani Menghadapi Oposisi</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-11">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">11</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-81" name="h-81" value="0">
										<input type="radio" id="radio-81" name="p[11]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-82" name="h-82" value="0">
										<input type="radio" id="radio-82" name="k[11]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mengalah, Tidak Suka Pertentangan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-83" name="h-83" value="0">
										<input type="radio" id="radio-83" name="p[11]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-84" name="h-84" value="0">
										<input type="radio" id="radio-84" name="k[11]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Penuh Dengan Hal Kecil / Detil</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-85" name="h-85" value="0">
										<input type="radio" id="radio-85" name="p[11]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-86" name="h-86" value="0">
										<input type="radio" id="radio-86" name="k[11]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berubah Pada Menit Terakhir</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-87" name="h-87" value="0">
										<input type="radio" id="radio-87" name="p[11]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-88" name="h-88" value="0">
										<input type="radio" id="radio-88" name="k[11]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mendesak / Memaksa Agak Kasar</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-12">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">12</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-89" name="h-89" value="0">
										<input type="radio" id="radio-89" name="p[12]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-90" name="h-90" value="0">
										<input type="radio" id="radio-90" name="k[12]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Saya Akan Pimpin Mereka</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-91" name="h-91" value="0">
										<input type="radio" id="radio-91" name="p[12]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-92" name="h-92" value="0">
										<input type="radio" id="radio-92" name="k[12]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Saya Akan Ikuti / Mengikuti</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-93" name="h-93" value="0">
										<input type="radio" id="radio-93" name="p[12]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-94" name="h-94" value="0">
										<input type="radio" id="radio-94" name="k[12]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Saya Akan Pengaruhi / Bujuk Mereka</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-95" name="h-95" value="0">
										<input type="radio" id="radio-95" name="p[12]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-96" name="h-96" value="0">
										<input type="radio" id="radio-96" name="k[12]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Saya Akan Mendapat Faktanya</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-13">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">13</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-97" name="h-97" value="0">
										<input type="radio" id="radio-97" name="p[13]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-98" name="h-98" value="0">
										<input type="radio" id="radio-98" name="k[13]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Hidup / Lincah Banyak Bicara</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-99" name="h-99" value="0">
										<input type="radio" id="radio-99" name="p[13]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-100" name="h-100" value="0">
										<input type="radio" id="radio-100" name="k[13]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Cepat, Penuh Keyakinan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-101" name="h-101" value="0">
										<input type="radio" id="radio-101" name="p[13]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-102" name="h-102" value="0">
										<input type="radio" id="radio-102" name="k[13]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berusaha Menjaga Keseimbangan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-103" name="h-103" value="0">
										<input type="radio" id="radio-103" name="p[13]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-104" name="h-104" value="0">
										<input type="radio" id="radio-104" name="k[13]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berusaha Patuh Pada Peraturan</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-14">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">14</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-105" name="h-105" value="0">
										<input type="radio" id="radio-105" name="p[14]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-106" name="h-106" value="0">
										<input type="radio" id="radio-106" name="k[14]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Kemajuan / Peningkatan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-107" name="h-107" value="0">
										<input type="radio" id="radio-107" name="p[14]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-108" name="h-108" value="0">
										<input type="radio" id="radio-108" name="k[14]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Puas Dengan Keadaan Tenang / Mudah Puas</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-109" name="h-109" value="0">
										<input type="radio" id="radio-109" name="p[14]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-110" name="h-110" value="0">
										<input type="radio" id="radio-110" name="k[14]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menunjukkan Perasaan Dengan Terbuka</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-111" name="h-111" value="0">
										<input type="radio" id="radio-111" name="p[14]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-112" name="h-112" value="0">
										<input type="radio" id="radio-112" name="k[14]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Rendah Hati, Sederhana</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-15">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">15</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-113" name="h-113" value="0">
										<input type="radio" id="radio-113" name="p[15]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-114" name="h-114" value="0">
										<input type="radio" id="radio-114" name="k[15]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Memikirkan Orang Lain</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-115" name="h-115" value="0">
										<input type="radio" id="radio-115" name="p[15]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-116" name="h-116" value="0">
										<input type="radio" id="radio-116" name="k[15]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Suka Bersaing / Kompetitif, Suka Tantangan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-117" name="h-117" value="0">
										<input type="radio" id="radio-117" name="p[15]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-118" name="h-118" value="0">
										<input type="radio" id="radio-118" name="k[15]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Optimis, Berpikir Positif</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-119" name="h-119" value="0">
										<input type="radio" id="radio-119" name="p[15]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-120" name="h-120" value="0">
										<input type="radio" id="radio-120" name="k[15]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Sistematis, Berpikir Logis</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-16">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">16</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-121" name="h-121" value="0">
										<input type="radio" id="radio-121" name="p[16]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-122" name="h-122" value="0">
										<input type="radio" id="radio-122" name="k[16]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mengelola waktu Dengan Efisien</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-123" name="h-123" value="0">
										<input type="radio" id="radio-123" name="p[16]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-124" name="h-124" value="0">
										<input type="radio" id="radio-124" name="k[16]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Sering Terburu-Buru, Merasa DItekan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-125" name="h-125" value="0">
										<input type="radio" id="radio-125" name="p[16]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-126" name="h-126" value="0">
										<input type="radio" id="radio-126" name="k[16]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Hal Sosial Adalah Penting</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-127" name="h-127" value="0">
										<input type="radio" id="radio-127" name="p[16]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-128" name="h-128" value="0">
										<input type="radio" id="radio-128" name="k[16]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Suka Menyelesaikan Hal Yang Sudah Dimulai</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-17">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">17</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-129" name="h-129" value="0">
										<input type="radio" id="radio-129" name="p[17]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-130" name="h-130" value="0">
										<input type="radio" id="radio-130" name="k[17]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Tenang, Pendiam, Tertutup</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-131" name="h-131" value="0">
										<input type="radio" id="radio-131" name="p[17]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-132" name="h-132" value="0">
										<input type="radio" id="radio-132" name="k[17]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Gembira, Bebas, Riang</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-133" name="h-133" value="0">
										<input type="radio" id="radio-133" name="p[17]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-134" name="h-134" value="0">
										<input type="radio" id="radio-134" name="k[17]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyenangkan, Baik Hati</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-135" name="h-135" value="0">
										<input type="radio" id="radio-135" name="p[17]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-136" name="h-136" value="0">
										<input type="radio" id="radio-136" name="k[17]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyolok, Berani</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-18">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">18</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-137" name="h-137" value="0">
										<input type="radio" id="radio-137" name="p[18]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-138" name="h-138" value="0">
										<input type="radio" id="radio-138" name="k[18]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyenangkan Orang Lain</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-139" name="h-139" value="0">
										<input type="radio" id="radio-139" name="p[18]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-140" name="h-140" value="0">
										<input type="radio" id="radio-140" name="k[18]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Tertawa Lepas, Hidup</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-141" name="h-141" value="0">
										<input type="radio" id="radio-141" name="p[18]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-142" name="h-142" value="0">
										<input type="radio" id="radio-142" name="k[18]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pemberani, Tegas</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-143" name="h-143" value="0">
										<input type="radio" id="radio-143" name="p[18]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-144" name="h-144" value="0">
										<input type="radio" id="radio-144" name="k[18]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pendiam, Tertutup, Tenang</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-19">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">19</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-145" name="h-145" value="0">
										<input type="radio" id="radio-145" name="p[19]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-146" name="h-146" value="0">
										<input type="radio" id="radio-146" name="k[19]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menolak Perubahan Yang Mendadak</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-147" name="h-147" value="0">
										<input type="radio" id="radio-147" name="p[19]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-148" name="h-148" value="0">
										<input type="radio" id="radio-148" name="k[19]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Cenderung Terlalu Banyak Berjanji</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-149" name="h-149" value="0">
										<input type="radio" id="radio-149" name="p[19]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-150" name="h-150" value="0">
										<input type="radio" id="radio-150" name="k[19]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Mundur Apabila Berada Dibawah Tekanan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-151" name="h-151" value="0">
										<input type="radio" id="radio-151" name="p[19]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-152" name="h-152" value="0">
										<input type="radio" id="radio-152" name="k[19]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Tidak Takut Untuk Berkelahi</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-20">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">20</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-153" name="h-153" value="0">
										<input type="radio" id="radio-153" name="p[20]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-154" name="h-154" value="0">
										<input type="radio" id="radio-154" name="k[20]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menyediakan Waktu Untuk Orang Lain</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-155" name="h-155" value="0">
										<input type="radio" id="radio-155" name="p[20]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-156" name="h-156" value="0">
										<input type="radio" id="radio-156" name="k[20]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Rencanakan Masa Depan, Bersiap</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-157" name="h-157" value="0">
										<input type="radio" id="radio-157" name="p[20]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-158" name="h-158" value="0">
										<input type="radio" id="radio-158" name="k[20]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menuju Petualang Baru</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-159" name="h-159" value="0">
										<input type="radio" id="radio-159" name="p[20]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-160" name="h-160" value="0">
										<input type="radio" id="radio-160" name="k[20]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menerima Penghargaan Atas Pencapaian Target</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-21">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">21</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-161" name="h-161" value="0">
										<input type="radio" id="radio-161" name="p[21]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-162" name="h-162" value="0">
										<input type="radio" id="radio-162" name="k[21]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Wewenang / Kekuasaan Lebih</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-163" name="h-163" value="0">
										<input type="radio" id="radio-163" name="p[21]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-164" name="h-164" value="0">
										<input type="radio" id="radio-164" name="k[21]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Kesempatan Baru</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-165" name="h-165" value="0">
										<input type="radio" id="radio-165" name="p[21]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-166" name="h-166" value="0">
										<input type="radio" id="radio-166" name="k[21]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Menghindari Perselisihan / Konflik Apapun</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-167" name="h-167" value="0">
										<input type="radio" id="radio-167" name="p[21]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-168" name="h-168" value="0">
										<input type="radio" id="radio-168" name="k[21]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Ingin Arahan Yang Jelas</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-22">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">22</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-169" name="h-169" value="0">
										<input type="radio" id="radio-169" name="p[22]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-170" name="h-170" value="0">
										<input type="radio" id="radio-170" name="k[22]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Penyemangat / Pendukung Yang Baik</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-171" name="h-171" value="0">
										<input type="radio" id="radio-171" name="p[22]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-172" name="h-172" value="0">
										<input type="radio" id="radio-172" name="k[22]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pendengar Yang Baik</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-173" name="h-173" value="0">
										<input type="radio" id="radio-173" name="p[22]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-174" name="h-174" value="0">
										<input type="radio" id="radio-174" name="k[22]" value="C">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Penganalisa Yang Baik</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-175" name="h-175" value="0">
										<input type="radio" id="radio-175" name="p[22]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-176" name="h-176" value="0">
										<input type="radio" id="radio-176" name="k[22]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Pendelegasian Yang Baik / Pandai Membagi Tugas</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-23">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">23</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-177" name="h-177" value="0">
										<input type="radio" id="radio-177" name="p[23]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-178" name="h-178" value="0">
										<input type="radio" id="radio-178" name="k[23]" value="D">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Peraturan Perlu Diuji</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-179" name="h-179" value="0">
										<input type="radio" id="radio-179" name="p[23]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-180" name="h-180" value="0">
										<input type="radio" id="radio-180" name="k[23]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Peraturan Membuat Menjadi Adil</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-181" name="h-181" value="0">
										<input type="radio" id="radio-181" name="p[23]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-182" name="h-182" value="0">
										<input type="radio" id="radio-182" name="k[23]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Peraturan Membuat Menjadi Membosankan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-183" name="h-183" value="0">
										<input type="radio" id="radio-183" name="p[23]" value="S">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-184" name="h-184" value="0">
										<input type="radio" id="radio-184" name="k[23]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Peraturan Membuat Menjadi Aman</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-lg">
					<table class="table table-borderless shadow-sm soal-24">
						<thead>
							<tr>
								<th scope="col"></th>
								<th scope="col"><i style="color:#56DB28" class="fas fa-thumbs-up"></i></th>
								<th><i style="color:#E3451E" class="fas fa-thumbs-down"></i></th>
								<th scope="col">Gambaran Diri</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="5">24</th>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-185" name="h-185" value="0">
										<input type="radio" id="radio-185" name="p[24]" value="*">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-186" name="h-186" value="0">
										<input type="radio" id="radio-186" name="k[24]" value="S">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Dapat Dipercaya dan Diandalkan</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-187" name="h-187" value="0">
										<input type="radio" id="radio-187" name="p[24]" value="I">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-188" name="h-188" value="0">
										<input type="radio" id="radio-188" name="k[24]" value="I">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Kreatif, Unik</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-189" name="h-189" value="0">
										<input type="radio" id="radio-189" name="p[24]" value="D">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-190" name="h-190" value="0">
										<input type="radio" id="radio-190" name="k[24]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Berorientasi Pada Hasil / Profit / Untung</td>
							</tr>
							<tr>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-191" name="h-191" value="0">
										<input type="radio" id="radio-191" name="p[24]" value="C">
										<span class="checkmark"></span>
									</label>
								</td>
								<td id="test"><label class="container-checkmark">
										<input type="hidden" id="hidden-192" name="h-192" value="0">
										<input type="radio" id="radio-192" name="k[24]" value="*">
										<span class="checkmark"></span>
									</label></td>
								<td id="test">Memegang Teguh Standar Yang tinggi, Akurat</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- <button type="submit">SUBMIT</button> -->
	</div>
	<?php
if (isset($_POST) && !isset($_GET['id'])) { ?>
	<input type="hidden" name="nama" value="<?= $_POST["namaDepan"] ?><?= $_POST["namaBelakang"] ?>">
	<input type="hidden" name="usia" value="<?= $_POST["usia"] ?>">
	<input type="hidden" name="gender" value="<?= $_POST["gender"] ?>">
	<input type="hidden" name="email" value="<?= $_POST["email"] ?>">
	<?php
	if(isset($_POST['id_mitra'])){ ?>
		<input type="hidden" name="id_mitra" value="<?= $_POST["id_mitra"] ?>">
	<?php
	}
}
?>
	</form>
	<nav id="submit" class="navbar navbar-expand-lg bg-light">
	<?php 
	if(!isset($_GET['id'])){ ?>
		<ul class="navbar nav ml-auto">
			<li class="nav-item">
				<span id="span"></span>
			</li>
			<li class="nav-item ml-3">
				<a style="font-size: 1.5em; cursor: help;" data-toggle="modal" data-target="#tutorial"><i
						class="fas fa-question-circle"></i></a>
			</li>
			<li class="nav-item ml-3">
				<input value="Submit" type="submit" disabled="disabled" class="button" name="button">
			</li>
		</ul>
	<?php 
	}
	?>
	</nav>
	</div>
</body>
<?php
if(isset($_SESSION['username']) || isset($_SESSION['username_admin'])){
	$_SESSION['validate'] = 1;
	if(isset($_GET["id"])){ ?>
		<script>
		$('input:radio').attr('disabled','disabled');
		<?php
		for ($i=1; $i < 193 ; $i++) { 
			$ans = $rowview['answer-'.$i];
			if ($ans == "1") {
				?>
				$('#radio-'+<?= $i ?>+'').attr({
					checked: 'true'
				});
			<?php
			}
		} 
		?>
		</script>
	<?php
	}
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.2/jquery.twbsPagination.js"></script>
<script>
	$(document).ready(function () {
		var page = 1;
		$("div.row").each(function () {
			$(this).attr('id', 'page' + page);
			$(this).addClass('page');
			page++;
		});

		$("#tutorial").modal({
			backdrop: 'static',
			keyboard: false
		});

		$('form').twbsPagination({
			totalPages: $(".page").length,
			visiblePages: 0,
			prev: '<a href="#"><i class="fas fa-chevron-left"></i></a>',
			next: '<a href="#"><i class="fas fa-chevron-right"></i></a>',
			first: '<a href="#"><i class="fas fa-step-backward"></i></a>',
			last: '<a href="#"><i class="fas fa-step-forward"></i></a>',
			onPageClick: function (event, page) {
				$('.page-active').removeClass('page-active');
				$('#page' + page).addClass('page-active');
				$(".page-item").addClass('nav-item w-100');
				$(".page-link").addClass('px-3 text-center');
			}
		});

		$(".pagination").addClass('shadow-sm mx-auto mb-sm-0 mb-4 col-12 col-sm-5 p-0');
		$(".page-item").addClass('nav-item w-100');
		$(".page-link").addClass('px-3 text-center');

		$("#tutorial").modal("toggle");
		for (var i = 0; i <= $(".table.table-borderless.shadow-sm").length; i++) {

		}
		$("#instruksi").click(function () {
			if ($("#instruksi").is(":checked")) {
				$("#mengerti").removeAttr('disabled');
			} else {
				$("#mengerti").attr('disabled', 'disabled');
			}
		});
	});
</script>

</html>