<!DOCTYPE html>
<html lang="en">

<?php include 'head.php';?>
<style type="text/css">
  .content-wrapper{
    padding-top: 0px;
  }
  button[type="submit"]{
    position: absolute;
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
                  <h1 class="mdc-card__title mdc-card__title--large">Data Responden</h1>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>Jenis Kelamin</th>
                      <th>Email</th>
                      <th>Tanggal Tes</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
            <?php
            $i = 1;
            while ($rowresponden = mysqli_fetch_array($responden)) { ?>
              <tr>
              <td><?= $i ?></td>
              <td><?= $rowresponden['nama'] ?></td>
              <td><?= $rowresponden['usia'] ?></td>
              <td><?= $rowresponden['jk'] ?></td>
              <td><?= $rowresponden[4] ?></td>
              <td><?= $rowresponden['tanggal'] ?></td>
              <td><form method="POST" action="../results.php?id=<?= md5($rowresponden['id']) ?>"><input type="hidden" name="validate"><input type="hidden" name="src" value="admin"><button type="submit" class="mdc-button mdc-button--unelevated" data-mdc-auto-init="MDCRipple"><i class="fas fa-external-link-alt"></i></button></form>
              <a href="../delete.php?id=<?= md5($rowresponden['id']) ?>" class="deleteResponden" id="deleteResponden"><button style="margin-right: 0.2em;" class="mdc-button mdc-button--unelevated secondary-filled-button" data-mdc-auto-init="MDCRipple"><i class="fas fa-trash"></i></button></a>
              </td>
              </tr>
            <?php
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
</body>
</html>