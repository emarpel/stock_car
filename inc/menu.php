<?php
    $current_url = $_SERVER['REQUEST_URI'];
    $url_parts = explode('/', $current_url);
    $page = end($url_parts);
?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="img/arya.jpg" width="60" height="60" style="border-radius: 50px;">&nbsp;&nbsp;
            <span class="brand-text font-weight-light"><strong><?= limit_words($_SESSION['userName'], 2) ?></strong></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="users.php" class="nav-link <?= $page == 'users.php' ? "active" : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuários
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link <?= $page == 'settings.php' ? "active" : '' ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Definições do Sistema
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link <?= $page == 'logout.php' ? "active" : '' ?>">
                            <i class="nav-icon fa fa-door-open"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </aside>