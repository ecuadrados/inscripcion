<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Control */

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Control', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="control-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
