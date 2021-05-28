<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Adulto */

$this->title = 'Inscríbete';
// $this->params['breadcrumbs'][] = ['label' => 'Adultos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="adulto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
