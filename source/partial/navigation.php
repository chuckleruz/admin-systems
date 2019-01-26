<?php
/**
 * Created by PhpStorm.
 * User: jesuslevien
 * Date: 24/01/19
 * Time: 11:27 AM
 */

?>
<div class="img-nav"><div class="img"><img src="design/imgs/levdata.jpg" class="img-responsive" alt="Logo kumon"></div></div>
<nav class="navigation">
    <ul>
        <li>
            <a href="menu">
                <span class="des">Home</span>
                <div class="img-li">
                    <img src="design/imgs/home.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li>
            <a href="inscripcion">
                <span class="des">Inscripción</span>
                <div class="img-li">
                    <img src="design/imgs/insc.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li>
            <a href="actualizar-id">
                <span class="des">Actualizar ID Alumno</span>
                <div class="img-li">
                    <img src="design/imgs/update.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li><a href="pagos">
                <span class="des">Pagos</span>
                <div class="img-li">
                    <img src="design/imgs/payment.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li><a href="consultar-pagos">
                <span class="des">Consultar pagos</span>
                <div class="img-li">
                    <img src="design/imgs/checkpay.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li><a href="menu">
                <span class="des">Consultar Alumnos</span>
                <div class="img-li">
                    <img src="design/imgs/cuser.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li><a href="menu">
                <span class="des">Consultar Emergencias</span>
                <div class="img-li">
                    <img src="design/imgs/emerg.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>
        <li>
            <a id="click">
                <span class="des">Datos para el instructor</span>
                <div class="img-li">
                    <img src="design/imgs/inst.png" class="img-responsive" alt="">
                </div>
            </a>
            <ul class="showins">
                <li><a href="instructor-entrada">
                        <span class="des">Alumno Entra</span>
                        <div class="img-li">
                            <img src="design/imgs/in.png" class="img-responsive" alt="">
                        </div>
                    </a>
                </li>
                <li><a href="instructor-salida">
                        <span class="des">Alumno Sale</span>
                        <div class="img-li">
                            <img src="design/imgs/outt.png" class="img-responsive" alt="">
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li><a href="/">
                <span class="des">Salir</span>
                <div class="img-li">
                    <img src="design/imgs/out.png" class="img-responsive" alt="">
                </div>
            </a>
        </li>

    </ul>
</nav>
<nav class="navigation-hor">
    <div class="hor-left">
        <div class="img-hor-left"><a id="minify" class=""><img id="imgmin" src="design/imgs/minify.png"  class="img-responsive" alt=""></a></div></div>
    <div class="hor-right">
        <div class="img-hor-right"><img src="design/imgs/huser.png" alt=""></div>
        <div class="datuser"><?php echo $user ?></div>
    </div>
</nav>
