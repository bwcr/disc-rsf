<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<style type="text/css">
  .content-wrapper {
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
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
              <div class="mdc-card table-responsive">
                <div class="table-heading px-2 px-1 border-bottom">
                  <h1 class="mdc-card__title mdc-card__title--large">Mitra</h1>
                  <a id="toggleModalMitra" href="#addMitra"><button
                      class="mdc-button mdc-button--raised mdc-button--dense" data-mdc-auto-init="MDCRipple">
                      + Tambah Mitra
                    </button></a>
                  <div id="addMitra" class="modal">
                    <div class="modal-header">
                      <h1 class="mdc-card__title mdc-card__title--large">Tambah Mitra</h1>
                    </div>
                    <section class="mdc-card__primary bg-white">
                      <form id="formAddMitra" method="POST" action="addMitra.php">
                        <div class="mdc-layout-grid">
                          <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Nama Mitra</h2>
                                <input name="mitra" type="text" placeholder="Nama Mitra..." required="required"
                                  class="mdc-text-field__input">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Username</h2>
                                <input name="username" type="text" placeholder="Username..." required="required"
                                  class="mdc-text-field__input">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Email</h2>
                                <input name="email" type="email" placeholder="Email..." required="required"
                                  class="mdc-text-field__input">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Password</h2>
                                <input name="password" type="text" placeholder="Password..." required="required"
                                  class="mdc-text-field__input" value="123">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                              <h2 class="mdc-typography--subheading1" style="color: #cccc;"><i>Password dapat diganti
                                  oleh pihak mitra setelah login</i></h2>
                            </div>
                          </div>
                        </div>
                        <button type="submit" id="buttonAddMitra" class="mdc-button mdc-button--stroked"
                          data-mdc-auto-init="MDCRipple">
                          Simpan
                        </button>
                        <button class="mdc-button secondary-text-button" data-mdc-auto-init="MDCRipple">
                          <a href="#" rel="modal:close" style="color: inherit;">Cancel</a>
                        </button>
                      </form>
                    </section>
                  </div>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Mitra</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Logo</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    while ($rowmitra = mysqli_fetch_array($mitra)) { ?>
                    <tr>
                      <?php $id_mitra = md5($rowmitra['id_mitra']); ?>
                      <td><?= htmlentities($i, ENT_QUOTES, 'UTF-8') ?></td>
                      <td><?= htmlentities($rowmitra['mitra'], ENT_QUOTES, 'UTF-8') ?></td>
                      <td><?= htmlentities($rowmitra['username'], ENT_QUOTES, 'UTF-8') ?></td>
                      <td><?= htmlentities($rowmitra['email'], ENT_QUOTES, 'UTF-8') ?></td>
                      <td><img style="max-width:200px;max-height:50px" class="shadow-sm"
                          src="../image/logo/<?= htmlentities($rowmitra["logo"]) ?>"></td>
                      <td><a rel="modal:open" id="toggleModal<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"
                          href="#edit<?= htmlentities($rowmitra["username"]) ?>"><button class="mdc-button mdc-button--unelevated"
                            data-mdc-auto-init="MDCRipple"><i class="fas fa-edit"></i></button></a>
                        <a rel=modal:open id="toggleSubModalMitra<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"
                          href="#sub-modalDelete<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"><button id="delete'.$rowmitra["
                            username"].'"
                            class="mdc-button mdc-button--unelevated secondary-filled-button mdc-ripple-upgraded"
                            data-mdc-auto-init="MDCRipple">
                            <i class="fas fa-trash"></i>
                          </button>
                        </a></td>
                    </tr>
                    <?php $i = $i + 1; ?>
                    <div id="edit<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>" class="modal">
                      <div class="modal-header">
                        <h1 class="mdc-card__title mdc-card__title--large">Update Mitra</h1>
                      </div>
                      <section class="mdc-card__primary bg-white">
                        <div class="mdc-layout-grid">
                          <div class="mdc-layout-grid__inner">
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Nama Mitra</h2>
                                <form id="formUpdateMitra" method="POST" action="updateMitra.php?id=<?= htmlentities($id_mitra, ENT_QUOTES, 'UTF-8') ?>">
                                  <input type="text" name="mitra" value="<?= htmlentities($rowmitra["mitra"], ENT_QUOTES, 'UTF-8') ?>" required="required"
                                    class="mdc-text-field__input">
                                  <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Username</h2>
                                <input type="text" name="username" value="<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"
                                  required="required" class="mdc-text-field__input">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Email</h2>
                                <input type="email" name="email" value="<?= htmlentities($rowmitra["email"], ENT_QUOTES, 'UTF-8') ?>" required="required"
                                  class="mdc-text-field__input">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                              <label class="mdc-text-field w-100">
                                <h2 class="mdc-typography--subheading1">Password</h2>
                                <input id="password<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>" type="password" name="password"
                                  placeholder="Password..." required="required" class="mdc-text-field__input w-100"
                                  value="<?= htmlentities($rowmitra["password"], ENT_QUOTES, 'UTF-8') ?>">
                                <div class="mdc-text-field__bottom-line"></div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <button type="submit" id="buttonAddMitra" class="mdc-button mdc-button--stroked"
                          data-mdc-auto-init="MDCRipple">
                          Update
                        </button>
                        </form>
                        <a rel=modal:open id="toggleSubModalMitra<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"
                          href="#sub-modalDelete<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"><button id="delete<?= htmlentities($rowmitra["
                            username"], ENT_QUOTES, 'UTF-8') ?>" class="mdc-button mdc-button--stroked secondary-stroked-button"
                            data-mdc-auto-init="MDCRipple">
                            Hapus
                          </button>
                        </a>
                        <div id="sub-modalDelete<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>" class="modal">
                          <section class="mdc-card__primary bg-white">
                            <div class="mdc-layout-grid">
                              <div class="mdc-layout-grid__inner">
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                                  <p class="mdc-typography--body1">Apakah anda ingin menghapus mitra
                                    <?= htmlentities($rowmitra["mitra"], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                              </div>
                              <a href="deleteMitra.php?id=<?= htmlentities($id_mitra, ENT_QUOTES, 'UTF-8') ?>"><button
                                  id="delete<?= htmlentities($rowmitra["username"], ENT_QUOTES, 'UTF-8') ?>"
                                  class="mdc-button mdc-button--stroked secondary-stroked-button"
                                  data-mdc-auto-init="MDCRipple">
                                  Hapus
                                </button>
                              </a>
                              <button class="mdc-button mdc-button--compact mdc-ripple-upgraded"
                                data-mdc-auto-init="MDCRipple">
                                <a href="#" rel="modal:close" style="color: inherit;">Cancel</a>
                              </button>
                            </div>
                          </section>
                        </div>
                        <button class="mdc-button secondary-text-button" data-mdc-auto-init="MDCRipple">
                          <a href="#" rel="modal:close" style="color: inherit;">Cancel</a>
                        </button>
                      </section>
                    </div>
              </div>
              <?php
              }
              ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
    </main>
    <?php
      if(isset($_SESSION['alert-success']) || isset($_SESSION['alert-failure'])){
    ?>
    <div id="alertModal" class="modal">
      <?php 
          if (isset($_SESSION['alert-success'])) { ?>
            <p><?= htmlentities($_SESSION['alert-success'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php unset($_SESSION['alert-success'], ENT_QUOTES, 'UTF-8');
          }
          elseif (isset($_SESSION['alert-failure'], ENT_QUOTES, 'UTF-8')) { ?>
            <p><?= htmlentities($_SESSION['alert-failure'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php unset($_SESSION['alert-failure'], ENT_QUOTES, 'UTF-8');
          }
          ?>
      <a href="#" rel="modal:close">Dismiss</a>
    </div>
    <?php
      }
      ?>
    <!-- partial:partials/_footer.php -->
    <?php
      include 'partials/_footer.php';
      ?>
    <!-- partial -->
  </div>
  </div>
</body>

</html>