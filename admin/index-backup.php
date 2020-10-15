<?php
session_start();

require_once('../connection.php');

// if(!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])){
//   header("Location: admin.php");
// }

$responden = $koneksi->query("SELECT * FROM `data_diri` WHERE 1");
$rowresponden = mysqli_fetch_array($responden);

//Count

$countResponden = count($rowresponden);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Material Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <?php
    include 'partials/_sidebar.html';
    include 'partials/_navbar.html';
    ?>
    <!-- partial -->
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card">
                <div class="mdc-layout-grid__inner">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-7">
                    <section class="purchase__card_section">
                      <p>Like what you see? Check out our premium version for more.</p>
                    </section>
                  </div>
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-5">
                    <section class="purchase__card_section d-flex align-item-center">
                      <a href="https://github.com/BootstrapDash/Material-Admin" target="_blank" class="mdc-button mdc-button--stroked mdc-button--dense" data-mdc-auto-init="MDCRipple">
                        download free version
                      </a>
                      <a href="https://www.bootstrapdash.com/product/material-admin/" target="_blank" class="mdc-button mdc-button--raised mdc-button--dense" data-mdc-auto-init="MDCRipple">
                        purchase
                      </a>
                    </section>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-8">
              <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-danger rounded">
                      <i class="mdi mdi-account-settings text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <?php

                      echo '<h3 class="mdc-typography--display1 font-weight-bold mb-1">'.$countResponden.'</h3>'
                      ?>
                      <p class="font-weight-normal mb-0 mt-0">Total Responden</p>
                    </div>
                  </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <div class="mdc--tile mdc--tile-success rounded">
                      <i class="mdi mdi-basket text-white icon-md"></i>
                    </div>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1">16</h3>
                      <p class="font-weight-normal mb-0 mt-0">Mitra</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Data Responden</h1>
                </div>
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th class="text-left">Product</th>
                      <th>Cost</th>
                      <th>Sales amount</th>
                      <th>Shipping cost</th>
                      <th>Units sold</th>
                      <th>Profit generated</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    while ($rowresponden = mysqli_fetch_array($responden)) {
                      echo '<tr>';
              // echo "<th scope='row'>".$i."</th>";
                      echo "<td>".$rowresponden['nama']."</td>";
                      echo "<td>".$rowresponden['usia']."</td>";
                      echo "<td>".$rowresponden['jk']."</td>";
                      echo "<td>".$rowresponden['email']."</td>";
                      echo "<td>".$rowresponden['tanggal']."</td>";
                      echo '<td><a href="../results.php?id='.$rowresponden['id'].'"><button class="btn-sm btn">VIEW</button></a></td>';
                      echo "</tr>";
                      $i = $i + 1;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- partial:partials/_footer.php -->
      <?php
      include 'partials/_footer.php';
      ?>
      <!-- partial -->
    </div>
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->
  <script src="node_modules/material-components-web/dist/material-components-web.min.js"></script>
  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/progressbar.js/dist/progressbar.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function(){
      $('#table').DataTable();
      $('#DataTables_Table_0_length').css("text-align","left");
      $('#DataTables_Table_0_info').css({"text-align":"left","padding-top":"unset"});
  </script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/misc.js"></script>
  <script src="js/material.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>