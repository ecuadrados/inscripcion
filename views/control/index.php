<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ControlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Control';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'documento',
            'imagen',
            'estado',
            'observacion:ntext',
            //'users_id',
            //'fecha_creacion',

            ['class' => 'yii\grid\ActionColumn', 
            'template'=>'{view}'],
        ],
    ]); ?>


</div>
