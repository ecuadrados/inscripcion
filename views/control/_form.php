<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Control */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true, 'readOnly' => true]) ?>

    <?= $form->field($model, 'imagen')->textInput(['maxlength' => true, 'readOnly' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(
        [ 'pendiente' => 'Pendiente', 'Correcto' => 'Correcto'], ['prompt' => 'Seleccione' ]
    ) ?>
 
    <?= $form->field($model, 'observacion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
