<?php
include "header.php"
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../adm_principal.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../adm_principal.php#about" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->

    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../adm_principal.php" class="brand-link text-center">
        <img src="assets/img/LogoPrin.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">RIZABAL & ASOCIADOS <br> Ingenieros Estructurales</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $_SESSION['nombre_us']; ?>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">DISEÑOS</li>
                <li class="nav-item">
                    <a href="Vigas.php" class="nav-link">
                        <i class="ri-crop-line"></i>
                        <p>
                            DISEÑO POR FLEXION EN VIGAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="LosaAligerada.php" class="nav-link">
                        <i class="ri-stack-fill"></i>
                        <p>
                            DISEÑO DE LOSA ALIGERADA
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Col_flexo_Compresion.php" class="nav-link">
                        <i class="ri-ruler-2-line"></i>
                        <p>
                            DISEÑO DE COLUMNAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="DZapata.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            DISEÑO DE ZAPATAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Dmueros_alba.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            DISEÑO MUROS DE ALBAÑERIA
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="DZapata.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            ANALISIS POR VIENTO
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="adm_murocontencion.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            MURO DE CONTENCION
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="memoriaCalculos.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            Memoria de Calculos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Vistairregularidades.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            VERIFICACION DE IRREGULARIDADES
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="adm_cimiento.php" class="nav-link">
                        <i class="ri-artboard-2-line"></i>
                        <p>
                            DISEÑO DE CIMIENTO CORRIDO
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            DISEÑO DE COLUMNAS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="DColumnas.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p> DISEÑO DE COLUMNAS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="Col_flexo_Compresion.php" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>DISEÑO POR FLEXO-COMPRESION</p>
                            </a>
                        </li>
                    </ul>
                </li> -->

                <!-- <li class="nav-item">
                    <a href="MAjax.php" class="nav-link">
                        <i class="ri-shape-2-line"></i>
                        <p>
                            M Ajax
                        </p>
                    </a>
                </li> -->
                <!-- 
                <li class="nav-header">PLACAS</li>
                <li class="nav-item">
                    <a href="PlacaEnC.php" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            PLACAS EN C
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="PlacaEnL.php" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            PLACAS EN L
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="PlacaEnT.php" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            PLACAS EN T
                        </p>
                    </a>
                </li>
                <li class="nav-item"> -->
                <!-- <a href="Placas.php" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            PLACAS TOTALES
                        </p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>