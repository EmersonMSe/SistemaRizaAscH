<?php
include_once "assets/views/header.php";
?>
<!--=============== HEADER ===============-->
<section>
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="#" class="nav__logo">
                    <i class="ri-building-2-line"></i> RIZABAL & ASOCIADOS <br> Ingenieros Estructurales
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__toggle-menu"></i>
                    <i class="ri-close-line nav__toggle-close"></i>
                </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="Vistas/adm_principal.php" class="nav__link">INICIO</a>
                    </li>

                    <!--=============== DROPDOWN 1 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            COLUMNAS Y PLACAS <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-pencil-ruler-line"></i>
                                    </div>

                                    <span class="dropdown__title">COLUMNAS</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Columa Cuadrada Rectangular</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Columna Circular</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Columna en T</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Columna en L</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-artboard-2-fill"></i>
                                    </div>

                                    <span class="dropdown__title">PLACAS</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">PLACAS EN C</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">PLACAS EN L</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">PLACAS EN T</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-book-mark-line"></i>
                                </div>

                                <span class="dropdown__title">Careers</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="#" class="dropdown__link">Web development</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown__link">Applications development</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown__link">UI/UX design</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown__link">Informatic security</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-file-paper-2-line"></i>
                                </div>

                                <span class="dropdown__title">Certifications</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="#" class="dropdown__link">Course certificates</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown__link">Free certifications</a>
                                    </li>
                                </ul>
                            </div> -->
                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 2 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            DISEÑO <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-crop-line"></i>
                                    </div>

                                    <span class="dropdown__title">DISEÑO DE VIGAS</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="../Vistas/DECA/Vigas.php" class="dropdown__link">Diseño de
                                                VIGAS</a>
                                        </li>
                                        <!-- <li>
                                            <a href="../Vistas/DECA/LosaAligerada.php" class="dropdown__link">DISEÑO DE
                                                LOSA ALIGERADA</a>
                                        </li> -->
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-stack-fill"></i>
                                    </div>

                                    <span class="dropdown__title">DISEÑO DE LOSA ALIGERADA</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="../Vistas/DECA/LosaAligerada.php" class="dropdown__link">DISEÑO DE
                                                LOSA ALIGERADA</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#" class="dropdown__link">App designs</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Component design</a>
                                        </li> -->
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-ruler-2-line"></i>
                                    </div>

                                    <span class="dropdown__title">DISEÑO DE COLUMNAS</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="../Vistas/DECA/Col_flexo_Compresion.php"
                                                class="dropdown__link">Diseño de Columnas</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#" class="dropdown__link">Tutorial videos</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Webinar</a>
                                        </li> -->
                                    </ul>
                                </div>

                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-artboard-2-line"></i>
                                    </div>

                                    <span class="dropdown__title">DISEÑO DE ZAPATAS</span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="../Vistas/DECA/DZapata.php" class="dropdown__link">Diseño de Zapata
                                                Aislada</a>
                                        </li>
                                        <!-- <li>
                                            <a href="#" class="dropdown__link">Tutorial videos</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Webinar</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!--=============== DROPDOWN 3 ===============-->
                    <li class="dropdown__item">
                        <div class="nav__link dropdown__button">
                            <i class="ri-user-line"></i>
                            <?php
                            echo $_SESSION['nombre_us'];
                            ?>
                        </div>

                        <div class="dropdown__container">
                            <div class="dropdown__content">
                                <div class="dropdown__group">
                                    <div class="dropdown__icon">
                                        <i class="ri-user-2-line"></i>
                                    </div>

                                    <span class="dropdown__title">
                                        <?php echo $_SESSION['nombre_us']; //echo $_SESSION['apellidos_us']; ?>
                                    </span>

                                    <ul class="dropdown__list">
                                        <li>
                                            <a href="#" class="dropdown__link">Avatar</a>
                                        </li>
                                        <li>
                                            <a href="#" class="dropdown__link">Email</a>
                                        </li>
                                        <li>
                                            <a href="../Logout.php" class="dropdown__link">cerrar
                                                Session</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- <div class="dropdown__group">
                                <div class="dropdown__icon">
                                    <i class="ri-shield-line"></i>
                                </div>

                                <span class="dropdown__title">Safety and quality</span>

                                <ul class="dropdown__list">
                                    <li>
                                        <a href="#" class="dropdown__link">Cookie settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown__link">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</section>