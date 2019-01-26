<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" itemscope itemtype="http://schema.org/Thing"
      lang="es-MX">
<?php include('partial/head.php') ?>
<body class="no-scroll">

<div class="upload"></div>
<!-- Outer wrapper -->
<div class="outer-wrapper main">
    <!-- Block Paycash -->
    <section class="block main">
        <div class="header">
            <h2 class="title">lEVDATA</h2>
            <h2 class="title mini">SISTEMA DE ADMINISTRACIÓN</h2>
        </div>
        <div class="holder">
            <div class="container-fluid">
                <div class="content">
                    <div class="description">Ingresa tus datos de acceso</div>
                    <!-- Form -->
                    <form class="login-user">
                        <div class="container-user">
                            <input name="user" placeholder="Usuario" type="text" autocomplete="off">
                            <span class="iuser"><img src="design/imgs/user.png" alt="UserKumon"></span>
                        </div>
                        <div class="container-pass">
                            <input name="password" type="password" placeholder="Contraseña" autocomplete="off">
                            <span class="ipass"><img src="design/imgs/key.png" alt="PassKumon"></span>
                            <input type="submit" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Paycash -->
</div>
<?php include('partial/scripts.php') ?>
</body>
</html>
