<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>

        <p class="lead">Descargue el formato de postulación de subsidio presionando el siguiente botón</p>

        <p><a class="btn btn-lg btn-success"  href="<?=Yii::getAlias('@web')?>/uploads/FORMATO_POSTULACION_SUBSIDIO.pdf" download="FORMATO DE POSTULACION SUBSIDIO">Descargar Certificado</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <h2>Requisitos</h2>
               <ul>
                    <li>Mujeres a partir de los 54 años</li>
                    <li>Hombre a partir 59 años</li>
                    <li>Fotocopia de cedula de holograma amarilla ampliada al 150 %</li>
                    <li>Documento del sisben 43.63 de Cartagena – bolívar</li>
                    <li>Recibo de servicio público (luz,agua,o gas)</li>
                    <li>2 números de contacto de teléfono fijo o celulares activos del solicitante y
                        del acudiente (obligatorio)</li>
                    <li>Pertenecer al régimen de salud, subsidiada por el gobierno nacional</li>
                    <li>No estar pensionado</li>
               </ul>
            </div>         
            <!-- <div class="col-lg-6 col-md-6 col-xs-12">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
            </div> -->
        </div>

    </div>
</div>
