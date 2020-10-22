<?php
session_start();

if(!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])){
  header("Location: ../admin.php");
}

require_once('../connection.php');

// if(!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])){
//   header("Location: admin.php");
// }

$responden = $koneksi->query("SELECT * FROM `data_diri` LEFT JOIN `mitra` ON `data_diri`.`id_mitra` = `mitra`.`id_mitra` ORDER BY `id` DESC");
$hitResponden = $koneksi->query("SELECT count(*) as 'total' FROM `data_diri`");
$dataResponden = mysqli_fetch_assoc($hitResponden);

$mitra = $koneksi->query("SELECT * FROM `mitra`");
$hitMitra = $koneksi->query("SELECT count(*) as 'total' FROM `mitra`");
$dataMitra = mysqli_fetch_assoc($hitMitra);

$respondenMitra = $koneksi->query("SELECT * FROM `data_diri` WHERE `id_mitra` != ''");
$hitRespondenMitra = $koneksi->query("SELECT count(*) as 'total' FROM `data_diri` WHERE `id_mitra` != ''");
$dataRespondenMitra = mysqli_fetch_assoc($hitRespondenMitra);

$countResponden = $dataResponden['total'];
$countMitra = $dataMitra['total'];
$countRespondenMitra = $dataRespondenMitra['total'];
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="https://griyapsikologi.com/wp-content/uploads/2018/12/logo-rsf-favicon.jpg">
  <title>Admin | DISC Test Griya Psikologi</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
<!--   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
 -->  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- DataTables -->
  <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/fc-3.2.5/sc-2.0.0/datatables.min.css"/>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- Emoji -->
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>