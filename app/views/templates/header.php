<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/bootstrap.css">
    <!-- Custom scrollbar -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/jquery-mCustomScrollbar.css">
    <!-- Connect to our style css -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/style.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>css/sidebar.css">

    <!-- Data Tabel -->
    <link rel="stylesheet" href="<?= BASEURL; ?>css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>css/buttons.bootstrap4.min.css">

    <!-- Fontawesom -->
    <script src="<?= BASEURL; ?>js/font-awesome-solid.js"></script>
    <script src="<?= BASEURL; ?>js/font-awesome.js"></script>
    <!-- Adding Chart.js -->
    <script type="text/javascript" src="<?= BASEURL; ?>js/Chart.js"></script>
    <title><?= $data['title_web'] ?></title>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <img src="<?= BASEURL; ?>img/logounud.png" alt="Logo Unud" class="logo-brand">
            <div class="sidebar-header">
                Sistem Cerdas Bantuan Kemiskinan
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="<?= BASEURL; ?>"><i class="fas fa-home"></i>&nbsp;Home</a>
                </li>
                <?php if (!empty(Session::getSession("login"))) : ?>
                    <li>
                        <a href="#dataSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-database"></i>&nbsp;Data</a>
                        <ul class="collapse list-unstyled" id="dataSubMenu">
                            <li>
                                <a href="<?= BASEURL; ?>data/data_original">Data Basis Kasus</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>data/data_transformasi">Data Hasil Transformasi</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>data/kasus_revisi">Kasus Revisi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>metode/"><i class="fas fa-file-code"></i>&nbsp;Metode</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>pengujian/"><i class="fas fa-project-diagram"></i>&nbsp;Pengujian</a>
                    </li>
                    <?php if (Session::getSession("login")['status_user'] == "Admin") : ?>
                        <li>
                            <a href="<?= BASEURL; ?>reset/"><i class="fas fa-trash-alt"></i>&nbsp;Reset Semua Data</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- End sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-transparent border-dark">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <?php
                            if (isset($data['nav_list'])) {
                                foreach ($data['nav_list'] as $nav) {
                                    echo $nav;
                                }
                            }
                            ?>
                            <?php if (!empty(Session::getSession("login"))) : ?>
                                <li class="nav-item ">
                                    <a class="nav-link" data-toggle="modal" role="button" data-target="#modalLogoutUser">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= BASEURL; ?>login/">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>