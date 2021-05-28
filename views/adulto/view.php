<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Adulto */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Adultos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="adulto-view">

    <h1><?= Html::encode($this->title) ?></h1>   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'documento',
            'fecha_expedicion',
            'fecha_nacimiento',
            'sexo',
            'direccion',
            'telefono',
            'sisben',
            'nombre_contacto',
            'telefono_contacto',
            'celular_contacto',
            'direccion_contacto',            
            'fecha_creacion',
        ],
    ]) ?>
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Documentos</h3>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">                  
            <tbody>
            <tr>
                <td>
                <b>Cedula</b>
                </td>                    
                <td>
                <a href="<?=Yii::getAlias('@web')?>/uploads/cedula/<?=$model->cedula?>" target="_blank" class="btn btn-success">                    
                    Ver
                </a>
                <a href="<?=Yii::getAlias('@web')?>/uploads/cedula/<?=$model->cedula?>" download="<?=$model->cedula?>" class="btn btn-warning">
                    Descargar
                </a>
                </a>
                <?= Html::a('Anotar', ['control/create', 'id' => $model->cedula, 'imag' => 'cedula'], ['class' => 'btn btn-primary']) ?>
                </td>
                </td>
            </tr>
            <tr>
                <td>
                <b>Servicio Publico</b>
                </td>                    
                <td>
                <a href="<?=Yii::getAlias('@web')?>/uploads/recibo/<?=$model->recibo?>" target="_blank" class="btn btn-success">                    
                    Ver
                </a>
                <a href="<?=Yii::getAlias('@web')?>/uploads/recibo/<?=$model->recibo?>" download="<?=$model->recibo?>" class="btn btn-warning">
                    Descargar
                </a>
                </a>
                <?= Html::a('Anotar', ['control/create', 'id' => $model->recibo, 'imag' => 'recibo'], ['class' => 'btn btn-primary']) ?>
                </td>
                </td>
            </tr>
            <tr>
                <td>
                <b>Certificado de Postulación</b>
                </td>                    
                <td>
                <a href="<?=Yii::getAlias('@web')?>/uploads/certificado_postulacion/<?=$model->certificado_postulacion?>" target="_blank" class="btn btn-success" >                    
                    Ver
                </a>
                <a href="<?=Yii::getAlias('@web')?>/uploads/certificado_postulacion/<?=$model->certificado_postulacion?>" download="<?=$model->certificado_postulacion?>" class="btn btn-warning">
                    Descargar
                </a>
                </a>
                <?= Html::a('Anotar', ['control/create', 'id' => $model->certificado_postulacion, 'imag' => 'certificado_postulacion'], ['class' => 'btn btn-primary']) ?>
                </td>
                </td>
            </tr>
            <tr>
                <td>
                <b>Certificado de Sisben</b>
                </td>                    
                <td>
                <a href="<?=Yii::getAlias('@web')?>/uploads/certificado_sisben/<?=$model->certificado_sisben?>" target="_blank" class="btn btn-success">                    
                    Ver
                </a>
                <a href="<?=Yii::getAlias('@web')?>/uploads/certificado_sisben/<?=$model->certificado_sisben?>" download="<?=$model->certificado_sisben?>" class="btn btn-warning">
                    Descargar
                </a>
                <?= Html::a('Anotar', ['control/create', 'id' => $model->certificado_sisben, 'imag' => 'certificado_sisben'], ['class' => 'btn btn-primary']) ?>
                </td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>

</div>
