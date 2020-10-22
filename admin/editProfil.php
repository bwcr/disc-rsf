<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<style type="text/css">
  .content-wrapper{
    padding-top: 0px;
  }
</style>

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
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
              <div class="mdc-card">
                <section class="mdc-card__primary">
                  <h1 class="mdc-card__title mdc-card__title--large">Edit Profil</h1>
                  <form id="formUpdateAdmin" method="POST" action="updateAdmin.php" novalidate="novalidate">
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                      <label class="mdc-text-field w-100">
                        <h2 class="mdc-typography--subheading1">Username</h2>
                        <input name="username" type="text" placeholder="Username..." required="required" class="mdc-text-field__input" value="<?= $_SESSION['username_admin'] ?>">
                        <div class="mdc-text-field__bottom-line"></div>
                      </label>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                      <label class="mdc-text-field w-100">
                        <h2 class="mdc-typography--subheading1">Email</h2>
                        <input name="email" type="email" placeholder="email..." required="required" class="mdc-text-field__input" value="<?= $_SESSION["email"] ?>">
                        <div class="mdc-text-field__bottom-line"></div>
                      </label>
                    </div>
                    <button type="submit" id="buttonUpdateAdmin" class="mdc-button mdc-button--raised mdc-button--compact mdc-ripple-upgraded" data-mdc-auto-init="MDCRipple" style="--mdc-ripple-fg-size:42.6094px; --mdc-ripple-fg-scale:2.10327;">
                      Simpan
                    </button>
                  </form>
                </section>
              </div>
            </div>
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
              <div class="mdc-card">
                <section class="mdc-card__primary">
                  <h1 class="mdc-card__title mdc-card__title--large">Update Password</h1>
                  <form id="formUpdatePassword" method="POST" action="updateAdmin.php">
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                      <label class="mdc-text-field w-100">
                        <h2 class="mdc-typography--subheading1">Password Lama</h2>
                        <input name="password" type="password" placeholder="Password Lama..." required="required" class="mdc-text-field__input">
                        <div class="mdc-text-field__bottom-line"></div>
                      </label>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                      <label class="mdc-text-field w-100">
                        <h2 class="mdc-typography--subheading1">Password Baru</h2>
                        <input id="newPassword" name="newPassword" type="password" placeholder="Password Baru..." required="required" class="mdc-text-field__input">
                        <div class="mdc-text-field__bottom-line"></div>
                      </label>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                      <label class="mdc-text-field w-100">
                        <h2 class="mdc-typography--subheading1">Konfirmasi Password Baru</h2>
                        <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Konfirmasi Password Baru..." required="required" class="mdc-text-field__input">
                        <div class="mdc-text-field__bottom-line"></div>
                      </label>
                    </div>
                    <button type="submit" id="buttonUpdatePassword" class="mdc-button mdc-button--raised mdc-button--compact mdc-ripple-upgraded" data-mdc-auto-init="MDCRipple">
                      Simpan
                    </button>
                  </form>
                </section>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <?php
    if(isset($_SESSION['alert-success']) || isset($_SESSION['alert-failure'])){
      ?>
      <div id="alertModal" class="modal">
        <?php 
        if (isset($_SESSION['alert-success'])) { ?>
          <p><?= $_SESSION['alert-success'] ?></p>
        <?php
          unset($_SESSION['alert-success']);
        }
        elseif (isset($_SESSION['alert-failure'])) { ?>
          <p><?= $_SESSION['alert-failure'] ?></p>
        <?php
          unset($_SESSION['alert-failure']);
        }}
        ?>
        <a href="#" rel="modal:close">Dismiss</a>
      </div>
    <!-- partial:partials/_footer.php -->
    <?php
    include 'partials/_footer.php';
    ?>
    <!-- partial -->
  </div>
</body>
</html>