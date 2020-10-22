<?php
session_start();

require_once('connection.php');

if (isset($_POST['validate']) && isset($_POST['src'])) {
	$_SESSION['validate'] = $_POST['validate'];
	$_SESSION['src'] = $_POST['src'];
}

if(isset($_GET['id'])){
	if(isset($_SESSION['validate'])){
		unset($_SESSION['validate']);
	}
	$id = $_GET['id'];
	$view = $koneksi->query("SELECT * FROM `data_diri` WHERE md5(`id`) = '$id'");
	$row = mysqli_fetch_array($view);
	$viewmitra = $koneksi->query("SELECT * FROM `data_diri` INNER JOIN `mitra` ON `data_diri`.`id_mitra` = `mitra`.`id_mitra` WHERE md5(`id`) = '$id'");
	$rowmitra = mysqli_fetch_array($viewmitra);
	$nama = $row['nama'];
	$usia = $row['usia'];
	$jk = $row['jk'];
	$email = $row['email'];
	$ttlD = $row['ttlD'];
	$ttlI = $row['ttlI'];
	$ttlS = $row['ttlS'];
	$ttlC = $row['ttlC'];
	$ttllD = $row['ttllD'];
	$ttllI = $row['ttllI'];
	$ttllS = $row['ttllS'];
	$ttllC = $row['ttllC'];
	$pD = $row['pD'];
	$pI = $row['pI'];
	$pS = $row['pS'];
	$pC = $row['pC'];
	$kD = $row['kD'];
	$kI = $row['kI'];
	$kS = $row['kS'];
	$kC = $row['sC'];
	$ppD = $row['ppD'];
	$ppI = $row['ppI'];
	$ppS = $row['ppS'];
	$ppC = $row['ppC'];
	$kkD = $row['kkD'];
	$kkI = $row['kkI'];
	$kkS = $row['kkS'];
	$kkC = $row['kkC'];
	$pStar = $row['pStar'];
	$kStar = $row['kStar'];
	$infop = $row['infop'];
	$infok = $row['infok'];
	$infottl = $row['infottl'];
	if(empty($row['id'])){
		header("Location: 404.php");
	}
}
else{
	if(isset($_SESSION['id_mitra']) && isset($_SESSION['username']) && isset($_SESSION['password'])){
		header("Location: mitra/responden.php");
		die();
	}
	elseif (isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])) {
		header("Location: admin/responden.php");
		die();
	}
	else{
		header("Location: index.php");
		die();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hasil Tes | Admin DISC Test Griya Psikologi</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="//min.gitcdn.xyz/repo/wintercounter/Protip/master/protip.min.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//min.gitcdn.xyz/repo/wintercounter/Protip/master/protip.min.js"></script>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
	<link rel="stylesheet" type="text/css" href="css/benten.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<body class="home page-template page-template-homepage-slider page-template-homepage-slider-php page page-id-93 logged-in admin-bar elementor-default elementor-page elementor-page-93 customize-support">
	<?php
	if(isset($_SESSION['username_admin']) || isset($_SESSION['username'])){
		if($_SESSION['src'] === "admin"){
			echo
			'<nav class="navbar navbar-expand-lg bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			<ul class="navbar nav">
			<li class="nav-item">
			<a class="nav-link active" href="admin/responden.php"><i class="fas fa-chevron-left"></i> Kembali ke Menu Utama</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" href="disc-test.php?id='.$id.'"><i class="fas fa-clipboard-list"></i> Lihat Jawaban</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" href="#" onclick="printDoc()"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" href="#" onclick="deleteDoc()"><i class="fas fa-trash"></i> Hapus</a>
			</li>';			
			echo '</ul>
			</nav>';
		}
		elseif($_SESSION['src'] === "mitra"){
			echo
			'<nav class="navbar navbar-expand-lg bg-light">
			<ul class="navbar nav">
			<li class="nav-item">
			<a class="nav-link active" href="mitra/responden.php"><i class="fas fa-chevron-left"></i> Kembali ke Menu Utama</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" href="#" onclick="printDoc()"><i class="fas fa-cloud-download-alt"></i> Unduh</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" href="#" onclick="deleteDoc()"><i class="fas fa-trash"></i> Hapus</a>
			</li>';
			echo '</ul>
			</nav>';
		}
	}
	?>
	<?php
	if($row['id_mitra'] == NULL || isset($_SESSION['src'])){
		?>
		<div class="box-content mt-5 clearfix">
			<p class="top-title">
			DISC TEST</p>
			<h2 class="content-title">
			Hasil Tes</h2>
		</div>
		<table class="table table-borderless mx-auto w-75">
			<tbody>
				<th>
					<?php echo "<td>Nama: ".$nama."</td>";?>
					<?php echo "<td>Usia: ".$usia." th</td>";?>
					<?php echo "<td>Jenis Kelamin: ".$jk."</td>";?>
					<?php echo "<td>Email: ".$email."</td>";?>
				</th>
			</tbody>
		</table>
		<div class="container">
			<div class="row">
				<div class="clearfix mx-auto w-75 col-12">
					<table id="wp-calendar">
						<thead>
							<tr>
								<th scope="col">Kepribadian</th>
								<th scope="col">D</th>
								<th scope="col">I</th>
								<th scope="col">S</th>
								<th scope="col">C</th>
								<th scope="col">*</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td scope="row">MASK/PUBLIC SELF</td>
								<?php echo "<td>".$pD."</td>";?>
								<?php echo "<td>".$pI."</td>";?>
								<?php echo "<td>".$pS."</td>";?>
								<?php echo "<td>".$pC."</td>";?>
								<?php echo "<td>".$pStar."</td>";?>
							</tr>
							<tr>
								<td scope="row">CORE/PRIVATE SELF</td>
								<?php echo "<td>".$kD."</td>";?>
								<?php echo "<td>".$kI."</td>";?>
								<?php echo "<td>".$kS."</td>";?>
								<?php echo "<td>".$kC."</td>";?>
								<?php echo "<td>".$kStar."</td>";?>
							</tr>
							<tr>
								<td scope="row">MIRROR/PERCEIVED SELF</td>
								<?php echo "<td>".$ttlD."</td>";?>
								<?php echo "<td>".$ttlI."</td>";?>
								<?php echo "<td>".$ttlS."</td>";?>
								<?php echo "<td>".$ttlC."</td>";?>
								<?php echo "<td style='background-color:#eeee'></td>";?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div id="answer" class="my-3 clearfix mt-4 card-deck row">
				<?php
				$checkp = $koneksi->query("SELECT `id`, `title`, `list1`, `list2`, `list3`, `list4`, `list5`, `list6`, `list7`, `list8`, `list9`, `list10`, `list11`, `list12`, `jobs`, `paragraph` FROM `results` WHERE id = '$infop'");
				$checkk = $koneksi->query("SELECT `id`, `title`, `list1`, `list2`, `list3`, `list4`, `list5`, `list6`, `list7`, `list8`, `list9`, `list10`, `list11`, `list12`, `jobs`, `paragraph` FROM `results` WHERE id = '$infok'");
				$checkttl = $koneksi->query("SELECT `id`, `title`, `list1`, `list2`, `list3`, `list4`, `list5`, `list6`, `list7`, `list8`, `list9`, `list10`, `list11`, `list12`, `jobs`, `paragraph` FROM `results` WHERE id = '$infottl'");
				$rowp = mysqli_fetch_array($checkp);
				$rowk = mysqli_fetch_array($checkk);
				$rowttl = mysqli_fetch_array($checkttl);
				?>
				<div class="col-md-4">
					<canvas id="MaskPublicSelf"></canvas>
					<script>
						var ctx = document.getElementById('MaskPublicSelf').getContext('2d');
						var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'line',

	// The data for our dataset
	data: {
		labels: ["D", "I", "S", "C"],
		datasets: [{
			label: "Mask/Public Self",
			backgroundColor: 'transparent',
			borderColor: '#7CB7F2',
			fill: 'false',
			<?php echo "data: [".$ppD.", ".$ppI.", ".$ppS.", ".$ppC."],"; ?>
		}]
	},
	options: {
		legend: {
			display: false
		}
	}
});
</script>
<p id="graph3" class="line-subtext">Mask/Public Self <i class="fas fa-info-circle protip" data-pt-title="Kepribadian di muka umum" data-pt-scheme='leaf' data-pt-size='small'></i></p>
<?php
echo "<h3 class= 'content-subtitle'>".$rowp['title']."</h3>";
echo "<ul class= 'list'>";
for ($list = 1; $list < 13 ; $list++) { 
	if (strlen(trim($rowp['list'.$list.''])) != 0){
		echo "<li>".$rowp['list'.$list.'']."</li>";
	}
}
echo "</ul>";
?>
</div>
<div class="col-md-4">
	<canvas id="CorePrivateSelf"></canvas>
	<script>
		var ctx = document.getElementById('CorePrivateSelf').getContext('2d');
		var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'line',

	// The data for our dataset
	data: {
		labels: ["D", "I", "S", "C"],
		datasets: [{
			label: "Core/Private Self",
			backgroundColor: 'transparent',
			borderColor: '#E3451E',
			fill: 'false',
			// data: [0, 10, 5, 2, 20, 30, 45],
			<?php echo "data: [".$kkD.", ".$kkI.", ".$kkS.", ".$kkC."],"; ?>
		}]
	},
	options: {
		legend: {
			display: false
		}
	}
});
</script>
<p id="graph1" class="line-subtext">Core/Private Self <i class="fas fa-info-circle protip" data-pt-title="Kepribadian saat mendapat tekanan" data-pt-scheme='leaf' data-pt-size='small'></i></p>
<?php
echo "<h3 class= 'content-subtitle'>".$rowk['title']."</h3>";
echo "<ul class= 'list'>";
for ($list = 1; $list < 13 ; $list++) { 
	if (strlen(trim($rowk['list'.$list.''])) != 0){
		echo "<li>".$rowk['list'.$list.'']."</li>";
	}
}
echo "</ul>";
?>
</div>
<div class="col-md-4">
	<canvas id="MirrorPerceivedSelf"></canvas>
	<script>
		var ctx = document.getElementById('MirrorPerceivedSelf').getContext('2d');
		var chart = new Chart(ctx, {
	// The type of chart we want to create
	type: 'line',

	// The data for our dataset
	data: {
		labels: ["D", "I", "S", "C"],
		datasets: [{
			label: "Mirror/Perceived Self",
			backgroundColor: 'transparent',
			borderColor: '#0DC143',
			fill: 'false',
			// data: [0, 10, 5, 2, 20, 30, 45],
			<?php echo "data: [".$ttllD.", ".$ttllI.", ".$ttllS.", ".$ttllC."],"; ?>
		}]
	},
	options: {
		legend: {
			display: false
		}
	}
});
</script>
<p id="graph2" class="line-subtext">Mirror/Perceived Self <i class="fas fa-info-circle protip" data-pt-title="Kepribadian asli yang tersembunyi" data-pt-scheme='leaf' data-pt-size='small'></i></p>
<?php
echo "<h3 class= 'content-subtitle'>".$rowttl['title']."</h3>";
echo "<ul class= 'list'>";
for ($list = 1; $list < 13 ; $list++) { 
	if (strlen(trim($rowttl['list'.$list.''])) != 0){
		echo "<li>".$rowttl['list'.$list.'']."</li>";
	}
}
echo "</ul>";
?>
</div>
</div>
<?php
}
?>
<?php
if(isset($_SESSION['username']) || isset($_SESSION['username_admin']) || $row['premium'] == 1 || $row['premium'] == 0){
	echo '<div class="row clearfix" id="kepribadian">
	<div id="paragraph" class="col-md-8">
	<h3 class="content-subtitle">Deskripsi Kepribadian</h3>'
	?>
	<?php
			// $scriptttl = $rowttl['paragraph'];
	echo "<p class='text-justify'>".$rowttl['paragraph']."</p>";
	echo '</div>';
	echo '<div id="paragraph" class="col-md-4">';
	echo '<h3 class="content-subtitle">Job Match</h3>';
	?>
	<?php
	echo "<p>".$rowttl['jobs']."</p>";

	echo '</div>';
	echo '</div>';
}

?>
<?php
if(!isset($_SESSION['username_admin'])){
	?>
	<button class="mb-4" onclick="printDoc()"><i class="fas fa-cloud-download-alt"></i> UNDUH</button>
	<?php
}
if (!isset($_SESSION['username_admin']) && $row['premium'] == 1) {
	?>
	<div class="card mb-4 p-4" id="premium">
		<div class="box-content">
			<p class="top-title">
			PREMIUM</p>
			<h3 class="content-subtitle">HASIL ANDA PREMIUM</h3>
			<p><i class="fas fa-check-circle" style="color: #56DB28; cursor: default; font-size: 8em;"></i></p>
			<p>Terimakasih telah melakukan pembayaran untuk DISC Test di Griya Psikologi RSF.</p><p>Anda dapat unduh hasil tes anda disini.</p>
			<button class="mb-4" onclick="printDoc()"><i class="fas fa-cloud-download-alt"></i> UNDUH</button>
		</div>
	</div>
	<?php
}
?>
</div>
<?php
echo "<script>";
echo "function printDoc(){
	$('button,#premium').addClass('d-none');
	$('.box-content').removeClass('mt-5');
	if($('body').css('color','#8d8d8d')){
		$(this).css('color','black');
	}
	window.print();
	$('button,#premium').removeClass('d-none');
	$('.box-content').addClass('mt-5');
}";

echo 'function premium(){
	var x = confirm("Pastikan pengguna sudah membayar, lanjutkan?");
	if (x == true) {';
	$id = $_GET['id'];
	echo 'location.replace("update-premium.php?id='.$id.'")
}
}';

echo "function deleteDoc(){";
echo 'var x = confirm("Anda akan menghapus jawaban responden, lanjutkan?");';
echo 'if (x == true) {';
$id = $_GET['id'];
echo 'location.replace("delete.php?id='.$id.'");';
echo '}';
echo '}';
echo '</script>';
?>
<script>
	window.onload = function(){
		var string = $("p.text-justify").text();
		$("p.text-justify").html(string.replace(/[?]/gi,''));
		$.protip();
	}
	$(document).on('contextmenu', 'img', function() {
		return false;
	})

</script>
</body>
</html>