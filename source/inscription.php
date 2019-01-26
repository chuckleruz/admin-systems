<?php
session_start();
include('globals/autocomplete.php');
$number = $_SESSION['number'];
$center = $_SESSION['center'];
$day = $_SESSION['day'];
$mon = $_SESSION['mon'];
$year = $_SESSION['year'];
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
<div class="outer-wrapper inscription">

<section class="block inscription">
    <form class="ins-form">
        <!-- Block Inscription -->
        <div class="block insc">
            <div class="holder">
                <div class="container-fluid">
                    <div class="header">
                        <h2 class="title">Ficha de Inscripción</h2>
                    </div>
                    <div class="content">
                        <!-- Form -->
                        <div class="row">
                            <div class="col-md-3">
                                <label for="ncenter">N° Centro</label>
                                <input type="text" name="numbercenter" value="<?= $number; ?>" id="ncenter" readonly="true">
                            </div>
                            <div class="col-md-3">
                                <label for="ckmn">Centro</label>
                                <input type="text" name="namecenter" id="ckmn" value="<?= $center; ?>" readonly="true">
                            </div>
                            <div class="col-md-3">
                                <div>Fecha de Ingreso(dd/mm/aa)</div>
                                <input type="text" name="date" placeholder="dd/mm/aa" autocomplete="off">
                                <!--<div class="row regdate">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <input type="text" name="day" placeholder="dd" autocomplete="off">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <input type="text" name="month" placeholder="mm" autocomplete="off">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <input type="text" name="year" placeholder="aa" autocomplete="off">
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-md-3">
                                <div class="check">
                                    <span>Nuevo ingreso</span>
                                    <input type="checkbox" name="newreg" value="Nuevo Ingreso">
                                </div>
                                <div class="check">
                                    <span>Transferencia Entrada</span>
                                    <input type="checkbox" name="trans" value="Transferencia Entrada">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Inscription-->

        <!--Block Student-->
        <div class=" block info-student">
            <div class="holder">
                <div class="container-fluid">
                    <div class="inf-student">
                        <div class="header">
                            <h2 class="title">Imformación del Alumno:</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input name="firstname" placeholder="Nombre(s)" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <input name="lastname" placeholder="Apellido Paterno" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <input name="secondname" type="text" placeholder="Apellido Materno" name="secondname" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="born">Fecha de Nacimiento</div>
                            <div class="col-md-3">
                                <div class="row regdate">
                                    <input type="text" name="dateb" placeholder="dd/mm/aaa" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input name="grade" placeholder="Grado escolar" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-3">
                                <input name="schoolname" placeholder="Nombre de la Escuela" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-3">
                                <input name="sexs" placeholder="Sexo(M/F)" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="address" placeholder="Domicilio del Alumno" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-1">
                                <input name="numext" placeholder="N° Ext." type="text" autocomplete="off">
                            </div>
                            <div class="col-md-1">
                                <input name="numint" placeholder="N° Int." type="text" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <input name="colony" placeholder="Colonia" type="text" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <input name="city" placeholder="Ciudad/Delegación/Municipio" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <input name="state" placeholder="Estado" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-2">
                                <input name="pcode" placeholder="C.P." type="text" autocomplete="off">
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-3 col-sm-3 col-xs-3">
                                    <input type="text" name="lada" placeholder="Lada" autocomplete="off">
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-9">
                                    <input type="text" name="phonehome" placeholder="Teléfono de casa" autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Entre la calle de" name="betweenst" autocomplete="off">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Y la calle de" name="andst" autocomplete="off">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                        <span>En caso de que el alumno éste bajo tratamiento médico, requiera atención especial o de algun medicamento
                        favor de mencionarlo a continuación:</span>
                            </div>
                            <div class="col-md-12">
                                <textarea name="advocacy" type="text" placeholder="Recomendaciones del Médico" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" placeholder="Clave para Español" name="keysp" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <input type="text" placeholder="Clave para Matemáticas" name="keymt" autocomplete="off">
                            </div>
                            <!--<div class="col-md-4">
                                <input type="text" placeholder="clave para Ingles" name="andst" autocomplete="off">
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Student-->
        <!--Block Tutor-->
        <div class="block info-tutor">
            <div class="holder">
                <div class="container-fluid">
                    <div class="inf-tutor">
                        <div class="header">
                            <h2 class="title">Imformación de Madre/Padre/Tutor:</h2>
                        </div>
                        <div class="tutors">
                            <div class="row">
                                <div class="col-md-4">
                                    <input name="firstnamet[]" placeholder="Nombre(s)" type="text" autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <input name="lastnamet[]" placeholder="Apellido Paterno" type="text" autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Apellido Materno" name="sltnamet[]" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="E-mail" name="email[]" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Teléfono de Oficina" name="phoneof[]" autocomplete="off">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" placeholder="Ocupación" name="ocupation[]" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="moreconcep">
                            <a id="btnmore" class="add-more-tutor" style="cursor: pointer;"><span><b>+</b> Agregar otro Tutor</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Tutor-->
        <!--Block Emergency-->
        <div class="block info-emergency">
            <div class="holder">
                <div class="container-fluid">
                    <div class="inf-emergency">
                        <div class="header">
                            <h2 class="title">En caso de Emergencia avisar a:</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="Nombre" name="firstnamemg">
                            </div>
                            <div class="col-md-3">
                                <input type="text" placeholder="Teléfono de Oficina" name="phonemg">
                            </div>
                            <div class="col-md-3">
                                <input type="text" placeholder="Celular o localizador" name="cell">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Emergency-->

        <!--Block Referent-->
        <div class="block info-refe">
            <div class="holder">
                <div class="container-fluid">
                    <div class="inf-refe">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="header">
                                    <h2>¿Como se entero de la escuela?</h2>
                                </div>
                                <div class="check">
                                    <span>Internet</span>
                                    <input type="checkbox" name="inter" value="Internet">
                                </div>
                                <div>Periódico...</div>
                                <div class="check">
                                    <input type="text" placeholder="Anuncio ¿Cuál?" name="ads">
                                    <input type="text" placeholder="Artículo ¿Cuál?" name="art">
                                    <input type="text" placeholder="Revista ¿Cuál?" name="rvw">
                                </div>
                                <div class="check">
                                    <span>Publicidad exterior del Centro</span>
                                    <input type="checkbox" name="pubext" value="Publicidad Externa a Kumon">
                                </div>
                                <div>Recomendación de...</div>
                                <div class="check">
                                    <span>Familiar</span>
                                    <input type="checkbox" name="tstfa" value="Familia Ref">
                                </div>
                                <div class="check">
                                    <span>Amigo</span>
                                    <input type="checkbox" name="tstfr" value="Amigos Ref">
                                </div>
                                <div class="check">
                                    <span>Escuela</span>
                                    <input type="checkbox" name="tstsc" value="Escuela Ref">
                                </div>
                                <div class="check">
                                    <input type="text" placeholder="Otro Medio ¿Cuál?" name="othermed">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="header">
                                    <h2>¿Cuál es la razón de su ingreso?</h2>
                                </div>
                                <div class="check">
                                    <span>Mejorar calificaciones en matemáticas</span>
                                    <input type="checkbox" name="bestcal" value="Mejorar Calificación Matemáticas">
                                </div>
                                <div class="check">
                                    <span>Preparación para grados superiores</span>
                                    <input type="checkbox" name="gradesup" value="Preparación Grados Superiores">
                                </div>
                                <div class="check">
                                    <span>Mejorar hábitos de estudio</span>
                                    <input type="checkbox" name="bestapt" value="Mejorar Hábitos de estudio">
                                </div>
                                <div>Recomendación de ...</div>
                                <div class="check">
                                    <span>Familiar</span>
                                    <input type="checkbox" name="famrea" value="Familiar Ra">
                                </div>
                                <div class="check">
                                    <span>Amigo</span>
                                    <input type="checkbox" name="frirea" value="Amigos Ra">
                                </div>
                                <div class="check">
                                    <span>Escuela</span>
                                    <input type="checkbox" name="schrea" value="Escuela Ra">
                                </div>
                                <div class="check">
                                    <input type="text" placeholder="Otra razón, ¿Cuál?" name="otherrea">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="header">
                                    <h2>¿Que resultado espera obtener?</h2>
                                </div>
                                <div class="check">
                                    <span>Mejorar calificaciones escolares</span>
                                    <input type="checkbox" name="bestcals" value="Mejorar calificación Escolar">
                                </div>
                                <div class="check">
                                    <span>Crear bases sólidad en matemáticas</span>
                                    <input type="checkbox" name="createb" value="Crear bases sólidas">
                                </div>
                                <div class="check">
                                    <span>Aumentar su concentración</span>
                                    <input type="checkbox" name="incremconc" value="Aumentar Concetración">
                                </div>
                                <div class="check">
                                    <span>Obtener agilidad de cálculo mental</span>
                                    <input type="checkbox" name="getagilcal" value="Obtener Agilidad">
                                </div>
                                <div class="check">
                                    <span>Crear hábito de estudio diario</span>
                                    <input type="checkbox" name="createapt" value="Crear Hábitos de Estudios">
                                </div>
                                <div class="check">
                                    <span>Aumentar su autoestima y seguridad en sí mismo</span>
                                    <input type="checkbox" name="incremautost" value="Aumentar Autoestima">
                                </div>
                                <div><input type="text" placeholder="Otro resultado, ¿Cuál?" name="otherresl"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Referent -->
        <input type="submit" value="Registrar">
    </form>
</section>

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
