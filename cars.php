<?php
//INCLUDE SCRIPT TOP
include 'inc/scriptTop.php';
//INCLUDE HEADER
include 'inc/header.php';
//INCLUDE MENU
include 'inc/menu.php';
//CONEXÃO COM O DB
require_once('inc/db_connect.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- INCLUDE LIST USERS -->
    <?php include('pages/cars/listCars.php'); ?>
</div>
<!-- EndContent Wrapper. Contains page content -->
<?php
//INCLUDE FOOTER
include 'inc/footer.php';
//INCLUDE SCRIPT BOTTOM
include 'inc/scriptBottom.php';
?>