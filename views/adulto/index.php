<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AdultoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adultos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adulto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           
            'nombre',
            'documento',
            'fecha_expedicion',
            'fecha_nacimiento',
            //'sexo',
            //'direccion',
            //'telefono',
            //'sisben',
            //'nombre_contacto',
            //'telefono_contacto',
            //'celular_contacto',
            //'direccion_contacto',
            //'cedula',
            //'recibo',
            //'certificado_postulacion',
            //'certificado_sisben',
            //'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}'],
        ],
    ]); ?>


</div>
