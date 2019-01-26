<?php
session_start();
include("globals/autocomplete.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" itemscope itemtype="http://schema.org/Thing"
      lang="es-MX">
<?php include('partial/head.php') ?>
<?php
if (isset($_SESSION['username'])) {
  $user = $_SESSION['username'];
?>
<body>
<?php include('partial/navigation.php') ?>
<!-- Outer wrapper -->
<div class="outer-wrapper checks">
    <!-- Block Paycash -->
    <section class="block paycash" id="paychash">
        <div class="holder">
            <div class="container-fluid">
                <div class="header">
                    <h2 class="title">Comprobante de pago</h2>
                </div>
                <div class="content">

                    <!-- Form -->
                    <form class="send-form">
                        <div class="row">
                            <div class="col-md-6">
                                <input name="enrolment" class="ui-autocomplete-input" placeholder="ID del Alumno"
                                       type="text" id="idstu" autocomplete="off">
                            </div>
                            <div class="col-md-6 readonly">
                                <input name="folio" type="text" value="<?php echo $get ?>" readonly="true" id="folio">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="firstname" placeholder="Nombre(s) del Alumno" type="text" id="fname" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <input name="lastname" placeholder="Apellido Paterno del Alumno" type="text"
                                       id="lname" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="whopay" placeholder="Quien hace el pago" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <input name="dateofpay" value="<?php echo "$day-$mon-$year"; ?>" type="text" readonly="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="metpay" id="">
                                    <option value="">Metodo de Pago</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Tarjeta de Debito">Tarjeta de Débito</option>
                                    <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                                    <option value="Depósito Bancario">Depósito Bancario</option>
                                    <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input name="amountpay" placeholder="Cantidad $" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="whoget" value="<?php echo $user; ?>" type="text" readonly="true" style="text-transform: capitalize">
                            </div>
                            <div class="col-md-6">
                                <select name="formpay" id="">
                                    <option value="">Selecciona Tipo de Pago</option>
                                    <option value="Completo">Completo</option>
                                    <option value="Parcial">Parcial</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <select name="addit[]" id="subjects">
                                    <option value="">Selecciona Conceptos Adicional</option>
                                    <option value="Carnet">Carnet</option>
                                    <option value="Uso de Biblioteca">Uso de Biblioteca</option>
                                    <option value="Libros">Libros</option>
                                    <option value="Pinturas">Pinturas</option>
                                    <option value="Papeleria">Papeleria</option>
                                    <option value="Credenciales">Credenciales</option>
                                    <option value="Micas">Micas</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="assignature" readonly="true" value="" id="assignature">
                            </div>
                        </div>
                        <div class="moreconcep">
                            <a id="btnmore" class="add-more-products" style="cursor: pointer;"><span><b>+</b> Agregar otro concepto de pago</span></a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="notes" placeholder="Comentarios"></textarea>
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
                            <div>Todos los derechos reservados. LEVDATA</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
    <div class="modal-show hidden">
        <div class="modal">
            <button class="close-button" id="buttoncl">x</button>
            <div class="header">
                <!--<h2>Comprobante enviado al correo del tutor</h2>-->
                <h2>¿Lo quieres Impreso?</h2>
                <h2>Recuerda al medio ambiente...</h2>
            </div>
            <div class="print-receipt"></div>
        </div>
    </div>
<?php
}else {
?>
<?php include('partial/login-user.php') ?>

<?php
}?>
<?php include('partial/scripts.php') ?>
<script type="text/javascript">
    $(document).ready(function () {
        var items = <?= json_encode($array) ?>;
        $("#idstu").autocomplete({
            source: items,
            select: function (event, item) {
                var params = {
                    enrol: item.item.value
                };
                $.get("globals/check.php", params, function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if (json.status == 200) {
                        $('#fname').val(json.firstname);
                        $('#lname').val(json.lastname);
                        if(json.nameassg == "Both(SP, MAT)"){
                            $('#assignature').val("Español, Matemáticas");
                        }else{
                            $('#assignature').val(json.nameassg);
                        }
                    } else {

                    }
                }); // ajax
            }
        });
    });
</script>
</body>
</html>




