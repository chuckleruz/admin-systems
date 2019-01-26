<?php
session_start();
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
<div class="outer-wrapper menu">
    <!-- Block Paycash -->
    <section class="block menu">
        <div class="holder">
            <div class="container-fluid">
                <div class="header">
                    <h2 class="title">SISTEMA DE ADMINISTRACIÓN</h2>
                    <h2 class="title"></h2>
                </div>
                <div class="content">

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
} else {
?>
    <?php include('partial/login-user.php') ?>
<?php
}
?>
<?php include('partial/scripts.php') ?>
</body>
</html>
