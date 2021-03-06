<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h3><?= $msg ?></h3>

<h1>Registrar</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
 'id' => 'formulario',
 'enableClientValidation' => false,
 'enableAjaxValidation' => true,
]);
?>
<div class="form-group">
 <?= $form->field($model, "username")->input("text") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "email")->input("email") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password")->input("password") ?>   
</div>

<div class="form-group">
 <?= $form->field($model, "password_repeat")->input("password") ?>   
</div>

<div class="form-group">
<?= $form->field($model, 'perfil')->dropDownList(
    [ 'admin' => 'Administrador', 'funcionario' => 'Funcionario'], ['prompt' => 'Seleccione' ]
    ); ?>   
</div>

<?= Html::submitButton("Registrar", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>