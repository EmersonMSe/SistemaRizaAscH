<!DOCTYPE html>
<html>

<head>
    <title>Adm|Login</title>
    <!-- Site favicon -->
    <link rel="shortcut icon" href="assets/Login/images/favicon.ico">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet">
    <!-- Icon Font -->
    <link rel="stylesheet" href="assets/Login/fonts/ionicons/css/ionicons.min.css">
    <!-- Text Font -->
    <link rel="stylesheet" href="assets/Login/fonts/font.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/Login/css/bootstrap.css">
    <!-- Normal style CSS -->
    <link rel="stylesheet" href="assets/Login/css/style.css">
    <!-- Normal media CSS -->
    <link rel="stylesheet" href="assets/Login/css/media.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<?php
session_start();
if (!empty($_SESSION['us_tipo'])) {
    header('Location: Controlador/usuarioControlador.php');
} else {
    session_destroy();
    ?>

    <body>
        <main class="cd-main">
            <section class="cd-section index visible ">
                <div class="cd-content style1">
                    <div class="login-box d-md-flex align-items-center">
                        <h1 class="title">BIENVENIDO</h1>
                        <h3 class="subtitle">Diseña,Crea e innova</h3>
                        <div class="login-form-box">
                            <div class="login-form-slider">
                                <!-- login slide start -->
                                <div class="login-slide slide login-style1">
                                    <form action="Controlador/usuarioControlador.php" method="POST">
                                        <div class="form-group">
                                            <label class="label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label class="label">Contraseña</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                    name="remember">
                                                <label class="custom-control-label" for="customCheck1">Recordarme?</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <button type="submit">Login</button> -->
                                            <input type="submit" class="submit" value="Sign In" name="login">
                                        </div>
                                    </form>

                                    <div class="sign-up-txt">
                                        No tienes Cuenta? <a href="javascript:;" class="sign-up-click">Solicita tu
                                            Cuenta</a>
                                    </div>
                                    <!-- <div class="forgot-txt">
                                        <a href="javascript:;" class="forgot-password-click">Olvidaste tu Contrasela</a>
                                    </div> -->
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
                                <!-- login slide end -->
                                <!-- signup slide start -->
                                <div class="signup-slide slide login-style1">
                                    <div class="d-flex height-100-percentage">
                                        <div class="align-self-center width-100-percentage">
                                            <form method="post" action="Controlador/Email.php">
                                                <div class="form-group">
                                                    <label class="label">Nombre Apellidos</label>
                                                    <input type="text" class="form-control" name="nombreApellidos">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">DNI</label>
                                                    <input type="number" class="form-control" name="dni" max="8" min="0">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Asunto</label>
                                                    <input type="text" class="form-control" name="asunto">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label">Email</label>
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group padding-top-15px">
                                                    <input type="submit" class="submit" value="Solicitar">
                                                </div>
                                            </form>

                                            <div class="sign-up-txt">
                                                Tienes Cuenta? <a href="javascript:;" class="login-click">INGRESA TUS DATOS
                                                    AQUI</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- signup slide end -->
                                <!-- forgot password slide start -->
                                <!-- <div class="forgot-password-slide slide login-style1">
                                    <div class="d-flex height-100-percentage">
                                        <div class="align-self-center width-100-percentage">
                                            <form>
                                                <div class="form-group">
                                                    <label class="label">Enter your email address to reset your
                                                        password</label>
                                                    <input type="email" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="submit" value="Submit">
                                                </div>
                                            </form>
                                            <div class="sign-up-txt">
                                                if you remember your password? <a href="javascript:;"
                                                    class="login-click">login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- forgot password slide end -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <div id="cd-loading-bar" data-scale="1"></div>
        <!-- JS File -->
        <script src="assets/Login/js/modernizr.js"></script>
        <script type="text/javascript" src="assets/Login/js/jquery.js"></script>
        <script type="text/javascript" src="assets/Login/js/popper.min.js"></script>
        <script type="text/javascript" src="assets/Login/js/bootstrap.js"></script>
        <script src="assets/Login/js/velocity.min.js"></script>
        <script type="text/javascript" src="assets/Login/js/script.js"></script>
        <script src="assets/js/login.js"></script>
    </body>

    </html>
    <?php
}
?>