<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Control */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Controls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="control-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'documento',
            'imagen',
            'estado',
            'observacion:ntext',
            'users_id',
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
                        <b><?=$model->imagen?></b>
                    </td>                    
                    <td>
                        <a href="<?=Yii::getAlias('@web')?>/uploads/<?=$model->imagen."/".$model->img?>" target="_blank" class="btn btn-success">                    
                            Ver
                        </a>
                        <a href="<?=Yii::getAlias('@web')?>/uploads/<?=$model->imagen."/".$model->img?>" download="<?=$model->img?>" class="btn btn-warning">
                            Descargar
                        </a>                    
                    </td>
                    </td>
                </tr>           
            </tbody>
            </table>
        </div>
    </div>

</div>
