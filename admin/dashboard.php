<!DOCTYPE html>
<html lang="en">

<?php include 'head.php';?>

<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include 'partials/_sidebar.html'; ?>
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <?php include 'partials/_navbar.html'; ?>
    <!-- partial -->
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
      <main class="content-wrapper">
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card">
                <div class="mdc-layout-grid__inner">
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10">
                    <section class="purchase__card_section">
                      <p class="bold-text">Welcome, Admin!</p>
                    </section>
                  </div>
                  <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-2">
                    <section class="purchase__card_section d-flex align-item-center">
                      <i class="em em-wave"></i>
                    </section>
                  </div>
                </div>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-layout-grid__inner w-100">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4">
                  <div class="mdc-card py-3 pl-2 d-flex flex-row align-item-center">
                    <a href="responden.php"><div class="mdc-button mdc-button--unelevated secondary-filled-button mdc-ripple-upgraded rounded mdc--tile mdc--tile-danger rounded">
                      <i class="mdi mdi-account-settings text-white icon-md"></i>
                    </div></a>
                    <div class="text-wrapper pl-1">
                      <h3 class="mdc-typography--display1 font-weight-bold mb-1"><?= $countResponden ?></h3>
                      <p class="font-weight-normal mb-0 mt-0">Total Responden</p>
                    </div>
                  </div>
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
  </body>

  </html>