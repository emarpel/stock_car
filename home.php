<?php
include 'inc/scriptTop.php';
include 'inc/header.php';
include 'inc/menu.php';
include 'inc/db_connect.php';

$queryUsers = $database->query("SELECT * FROM users");
$userRows = mysqli_num_rows($queryUsers);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"><br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $userRows ?></h3>
              <p>Usuários</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="users.php" class="small-box-footer">Acessar <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'inc/footer.php'; ?>
<?php include 'inc/scriptBottom.php'; ?>