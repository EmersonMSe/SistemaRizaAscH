<?php
session_start();
if ($_SESSION['us_tipo'] == 1 || $_SESSION['us_tipo'] == 3) {
    ?>
    <title>Adm | Catalago</title>

    <?php
    include_once "assets/views/navbar.php";
    ?>
    <br>
    <br>
    <section class="home" id="home">
        <div id="particles-js"></div>
        <div class="content">
            <h2>RIZABAL & ASOCIADOS<br><span>Ingenieros Estructurales</span></h2>
            <p>Realizamos <span class="typing-text"></span></p>
            <div class="socials">
                <ul class="social-icons">
                    <li><a class="Facebook" aria-label="LinkedIn" href="https://www.facebook.com" target="_blank"><i
                                class="ri-facebook-circle-fill"></i></a></li>
                    <li><a class="Instagram" aria-label="GitHub" href="https://www.instagram.com" target="_blank"><i
                                class="ri-instagram-line"></i></a></li>
                    <li><a class="Twitter" aria-label="Twitter" href="https://twitter.com/?lang=es" target="_blank"><i
                                class="ri-twitter-line"></i></a>
                    </li>
                    <li><a class="telegram" aria-label="Telegram" href="https://web.telegram.org" target="_blank"><i
                                class="ri-telegram-line"></i></i></a></li>
                </ul>
            </div>
        </div>
        <div class="image">
            <img draggable="false" class="tilt" src="../img/home.jpg" alt="">
        </div>
    </section>
    <!-- about section starts -->
    <section class="about" id="about">
        <h2 class="heading"><i class="fas fa-user-alt"></i> ACERCA DE NOSOTROS </h2>

        <div class="row">

            <div class="image">
                <img draggable="false" class="tilt" src="../img/hom1.jpg" alt="">
            </div>
            <div class="content">
                <h3>RIZABAL & ASOCIADOS</h3>
                <span class="tag">DISEÑO Y DIBUJO</span>

                <p>Contamos con un grupo de ingenieros experimentados en el diseño estructural y sismoresistente de
                    edificaciones para viviendas, hoteles y oficinas, centros comerciales, centros empresariales,
                    estructuras industriales, estructuras mineras, infraestructura, etc. </p>

                <div class="box-container">
                    <div class="box">
                        <p><span> Celular : </span> +51 953-992-277</p>
                        <p><span> Telefono: </span>062 616137</p>
                        <p><span> email : </span> rizabalsociados.estructurales@gmail.com</p>
                        <p><span> ubicacion : </span> Av. Javier Heraud 110 Amarilis-Huánuco</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section ends -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/particles.min.js"></script>

    <?php
    include_once "assets/views/footer.php";
} else {
    header('Location: ../login.php');
}
?>