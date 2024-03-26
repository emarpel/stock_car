<?php
    if (!isset($_GET['action'])) {
        $action = "start";
    } else {
        $action = $_GET['action'];
    }

    include 'connection/security.php';
    include 'inc/functions.php';
    protectPage();
?>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home.php" class="nav-link" style="color: black; font-weight:bold;">BUDAWEB SYSTEMS</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->