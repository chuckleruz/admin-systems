<?php
session_start();
include("globals/condb.php");
$file = fopen("utils/idstudent.txt","r") or die ("Error Fatal 1");

while(!feof($file)){

    $enrolm = fgets($file);
}

$file1 = fopen("utils/typepay.txt","r") or die ("Error Fatal 2");

while(!feof($file1)){

    $type = fgets($file1);
}
if(empty($type) || $type === "Todos"){
    $sql = "SELECT st.id_enrolment,st.firstname,st.lastname,payments.folio,payments.dateofpay,payments.metpay, 
          payments.whopay,payments.formpay FROM payments 
          JOIN students_payments as stmt on stmt.id_paymtst=payments.id_payment 
          JOIN students_data as st on st.id_students=stmt.id_stupay 
          WHERE st.id_enrolment='$enrolm'";

}else{
    $sql = "SELECT st.id_enrolment,st.firstname,st.lastname,payments.folio,payments.dateofpay,payments.metpay, 
          payments.whopay,payments.formpay FROM payments 
          JOIN students_payments as stmt on stmt.id_paymtst=payments.id_payment 
          JOIN students_data as st on st.id_students=stmt.id_stupay 
          WHERE st.id_enrolment='$enrolm' and payments.formpay = '$type'";
}

$result = mysqli_query($con,$sql) or die("Error");
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
    <!-- Outer wrapper -->
    <div class="outer-wrapper">
        <!-- Block Paycash -->
        <section class="block paycash">
            <div class="holder">
                <div class="container-fluid">
                    <div class="header">
                        <h2 class="title">Resutaldo de pagos</h2>
                    </div>
                    <div class="content">

                        <form class="consulted" action="../html/pdf/printcons.php" target="_blank" method="post">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">ID Alumno</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Apellido Paterno</th>
                                    <th class="text-center">Folio</th>
                                    <th class="text-center">Fecha de Pago</th>
                                    <th class="text-center">Metodo de pago</th>
                                    <th class="text-center">Quien Pago</th>
                                    <th class="text-center">Tipo de Pago</th>
                                    <th class="text-center">Descargalo / Imprimelo</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if($result->num_rows > 0){ $n=0; while($row = mysqli_fetch_array($result)){ $n++;?>
                                    <tr>
                                        <td class="text-center"><?php echo $n; ?></td>
                                        <td class="text-center"><?php echo $row['id_enrolment']; ?></td>
                                        <td class="text-center"><?php echo $row['firstname']; ?></td>
                                        <td class="text-center"><?php echo $row['lastname']; ?></td>
                                        <td class="text-center"><?php echo $row['folio']; ?></td>
                                        <td class="text-center"><?php echo $row['dateofpay']; ?></td>
                                        <td class="text-center"><?php echo $row['metpay']; ?></td>
                                        <td class="text-center"><?php echo $row['whopay']; ?></td>
                                        <td class="text-center"><?php echo $row['formpay']; ?></td>
                                        <td class="text-center img-print"><span><img src="../html/design/imgs/pdf.png" alt="PDF"></span><input type="submit" name="prints" value="<?php echo $row['folio'];?>"></td>
                                    </tr>
                                <?php } }?>
                                </tbody>
                            </table>
                        </form>
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
<script src="design/js/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var items = <?= json_encode($array) ?>;
        var items1 = <?= json_encode($arapay) ?>;
        $("#idal").autocomplete({
            source: items,
            select: function (event, item) {
                var params = {
                    matri: item.item.value
                };
                $.get("globals/check.php", params, function (response) {
                    console.log(response);
                    var json = JSON.parse(response);
                    if(json.status == 200){
                        $('#name').val(json.nombre);
                        $('#firstname').val(json.apellido_paterno);
                        $('#lastname').val(json.apellido_materno);
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
