<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Control */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="control-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'documento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Tabla -->
<?php if($control != "") { 
    if($control != null) { ?>
<div class="card">
        <div class="card-header border-0">
            <!-- <h3 class="card-title">Documentos</h3> -->
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">                        
            <tbody>
                <?php 
                    $form = ActiveForm::begin(
                        [
                            'action' => 'index.php?r=control%2Fupload',
                            'options' => [
                                'class' => 'userform',
                                'enctype' => 'multipart/form-data'
                            ]
                        ]
                    );
                ?>		
                <?= $form->field($model, 'documento')->hiddenInput(['maxlength' => true]) ?>
                <?php foreach ($control as $cont) { ?>
                    <tr>                                      
                        <td>
                            <?= $form->field($model, 'imagen[]')->textInput(['value' => $cont->imagen, 'readOnly' => true, 'required']) ?>
                        </td>
                        <td>
                            <?= $form->field($model, 'observacion')->textarea(['value' => $cont->observacion, 'readOnly' => true, 'rows' => '6']) ?>
                        </td>
                        <td>
                        <?php if($cont->estado == "pendiente" && $cont->estado_upload == 1 ) {
                           echo  $form->field($model, 'img[]')->fileInput();
                            }
                           else if($cont->estado == "pendiente" && $cont->estado_upload == 2 ) {
                               echo "<h3> $cont->imagen, esta en proceso </h3>";
                           }  
                           else {
                            echo "<h3>". $cont->imagen.", esta Ok </h3>";
                        }                      
                        ?>
                        </td>
                    </tr>
                <?php } ?>
                <div class="form-group">
        <?= Html::submitButton('Subir', ['class' => 'btn btn-success']) ?>
    </div>
            </tbody>
            <?php ActiveForm::end(); ?>

            </table>
        </div>
    </div>
<?php }else {
    echo "<h3>Su Inscripción esta en proceso</h3>";
}} ?>