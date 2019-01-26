<?php
session_start();
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
<div class="upload"></div>
<!-- Outer wrapper -->
<div class="outer-wrapper">
    <form class="inst-form">
        <section class=" block instru">
            <div class="holder">
                <div class="container-fluid">
                    <div class="inf-instr">
                        <div class="header">
                            <h2 class="title">Para uso del instructor solamente</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header">
                                    <h2>Transferido sale</h2>
                                </div>
                                <div class="row">
                                    <div class="col-md-3" style="padding-left: 15px">
                                        <input type="text" placeholder="Materia" name="">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" placeholder="Fecha de Inscripción" name="">
                                    </div>
                                    <div class="col-md-4" style="padding-right: 15px">
                                        <input type="text" placeholder="Nivel Actual" name="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-inf">Datos del Alumno en el centro que sale</div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="N° de Centro" name="">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="N° de Alumno">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <input type="submit" value="Guardar">
    </form>
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
