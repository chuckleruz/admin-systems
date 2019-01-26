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
                    <h2 class="title">Consultas de pagos</h2>
                </div>
                <div class="content">

                    <!-- Form -->
                    <form class="consultor-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input name="idenrol" class="ui-autocomplete-input" placeholder="Ingresa ID del Alumno" type="text" id="idstu" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <select name="formpay">
                                    <option value="">Selecciona que Pagos</option>
                                    <option value="Todos">Todos</option>
                                    <option value="Completo">Completo</option>
                                    <option value="Parcial">Parcial</option>
                                </select>
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
                        <input type="submit" value="Enviar">
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
<script type="text/javascript">
    $(document).ready(function () {
        var items = <?= json_encode($array) ?>;
        var items1 = <?= json_encode($arapay) ?>;
        $("#idstu").autocomplete({
            source: items,
            select: function (event, item) {
                var params = {
                    enrlm: item.item.value
                };
                $.get("globals/check.php", params, function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if(json.status == 200){
                        $('#fname').val(json.firstname);
                        $('#lname').val(json.lastname);
                        $('#folio').val(json.folio);
                    }else{

                    }
                }); // ajax
            }
        });
        $("#folio").autocomplete({
            source: items1,
            select: function (event, item) {
                var params = {
                    folio: item.item.value
                };
                $.get("globals/check.php", params, function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if(json.status == 200){
                        $('#name').val(json.nombre);
                        $('#firstname').val(json.apellido_paterno);
                        $('#lastname').val(json.apellido_materno);
                        $('#idal').val(json.matricula);
                    }else{

                    }
                }); // ajax
            }
        });

    });
</script>
</body>
</html>
