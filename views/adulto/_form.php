<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adulto */
/* @var $form yii\widgets\ActiveForm */
?>
   <section class="content">
      <div class="container-fluid">
      <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
        <div class="col-lg-12">
            <?php if(Yii::$app->session->hasFlash('mensaje')): ?>
                <div class="alert alert-success" role="alert">
                    <?= Yii::$app->session->getFlash('mensaje') ?>
                </div>
            <?php endif; ?>
        </div>
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>
              </div>
                <div class="adulto-form">

                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>                   
                   
                    <?= $form->field($model, 'fecha_expedicion')->textInput(['type' => 'date'])  ?>

                    <?= $form->field($model, 'fecha_nacimiento')->textInput(['type' => 'date']) ?>

                    <?= $form->field($model, 'sexo')->radioList(['Femenino' => 'Femenino', 'Masculino' => 'Masculino']); ?>

                    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'telefono')->textInput(['type' => 'number']) ?>

                    <?= $form->field($model, 'sisben')->textInput(['maxlength' => true]) ?>

                </div>
            </div>
          </div>
          <!-- col -->

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos de Contacto y Archivos</h3>
                </div>
                <?= $form->field($model, 'nombre_contacto')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'telefono_contacto')->textInput(['type' => 'number']) ?>

                <?= $form->field($model, 'celular_contacto')->textInput(['type' => 'number']) ?>

                <?= $form->field($model, 'direccion_contacto')->textInput(['maxlength' => true]) ?>
                
                <?= $form->field($model, 'cedula_image')->fileInput() ?>

                <?= $form->field($model, 'recibo_image')->fileInput() ?>

                <?= $form->field($model, 'postulacion_image')->fileInput() ?>

                <?= $form->field($model, 'sisben_image')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
          </div>
        </div>
        <!-- row -->
        <?php ActiveForm::end(); ?>
      </div>
   </section>


