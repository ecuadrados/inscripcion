<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "control".
 *
 * @property int $id
 * @property string $documento
 * @property string $imagen
 * @property string $estado
 * @property string|null $observacion
 * @property int $users_id
 * @property string $fecha_creacion
 */
class Control extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'control';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['documento', 'imagen', 'img', 'estado', 'users_id'], 'required'],
            [['observacion'], 'string'],
            [['users_id', 'estado_upload'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['documento', 'imagen', 'estado'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'documento' => 'Documento',
            'imagen' => 'Tipo Imagen',
            'img' => 'Subir Imagen',
            'estado' => 'Estado',
            'observacion' => 'Observacion',
            'users_id' => 'Users ID',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }
}
