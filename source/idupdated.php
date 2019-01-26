<?php
session_start();
include("globals/autocomplete.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" itemscope itemtype="http://schema.org/Thing" lang="es-MX">
<?php include('partial/head.php') ?>
<?php
if (isset($_SESSION['username'])){
$user = $_SESSION['username'];
?>
<body>
<?php include('partial/navigation.php') ?>
<span class="upload"></span>
<!-- Outer wrapper -->
<div class="outer-wrapper ">
    <!-- Block Paycash -->
    <section class="block paycash">
        <div class="holder">
            <div class="container-fluid">
                <div class="header">
                    <h2 class="title">Actualizar ID Alumno</h2>
                </div>
                <div class="content">

                    <!-- Form -->
                    <form class="update-form">
                        <div class="row">
                            <div class="col-md-12">
                                <input name="idenrol" class="ui-autocomplete-input" placeholder="Ingresa ID del Alumno" type="text" id="idstu" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="firstname" placeholder="Nombre(s) del Alumno" type="text" id="fname" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <input name="lastname" placeholder="Apellido Paterno del Alumno" type="text" id="lname" autocomplete="off">
                            </div>
                        </div>
                        <input type="submit" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Paycash -->
    <footer class="footer">
        <div class="holder">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="copyright">
                            <div>Todos los derechos reservados.LEVDATA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<?php
}else{
    ?>
    <?php include('partial/login-user.php') ?>
    <?php
}
?>
<?php include('partial/scripts.php') ?>
</body>
</html>
