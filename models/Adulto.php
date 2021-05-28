<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "adulto".
 *
 * @property int $id
 * @property string $nombre
 * @property string $documento
 * @property string $fecha_expedicion
 * @property string $fecha_nacimiento
 * @property string $sexo
 * @property string|null $direccion
 * @property string $telefono
 * @property string|null $sisben
 * @property string $nombre_contacto
 * @property string|null $telefono_contacto
 * @property string $celular_contacto
 * @property string|null $direccion_contacto
 * @property string $cedula
 * @property string $recibo
 * @property string $certificado_postulacion
 * @property string $certificado_sisben
 * @property string $fecha_creacion
 */
class Adulto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $cedula_image;
    public $recibo_image;
    public $postulacion_image;
    public $sisben_image;

    public static function tableName()
    {
        return 'adulto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'documento', 'fecha_expedicion', 'fecha_nacimiento', 'sexo', 'telefono', 'direccion','sisben', 'nombre_contacto', 'celular_contacto', 'cedula', 'recibo', 'certificado_postulacion', 'certificado_sisben'], 'required'],
            [['fecha_expedicion', 'fecha_nacimiento', 'fecha_creacion'], 'safe'],
            [['nombre', 'direccion', 'nombre_contacto', 'direccion_contacto'], 'string', 'max' => 255],
            [['documento', 'sexo', 'telefono', 'sisben', 'telefono_contacto', 'celular_contacto', 'cedula', 'recibo', 'certificado_postulacion', 'certificado_sisben'], 'string', 'max' => 50],
            [['documento'], 'unique'],
            [['cedula_image','recibo_image','postulacion_image','sisben_image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'documento' => 'Documento',
            'fecha_expedicion' => 'Fecha Expedicion',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'sexo' => 'Sexo',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'sisben' => 'Sisben',
            'nombre_contacto' => 'Nombre Contacto',
            'telefono_contacto' => 'Telefono Contacto',
            'celular_contacto' => 'Celular Contacto',
            'direccion_contacto' => 'Direccion Contacto',
            'cedula' => 'Cedula',
            'recibo' => 'Recibo',
            'certificado_postulacion' => 'Certificado Postulacion',
            'certificado_sisben' => 'Certificado Sisben',
            'cedula_image' => 'Cedula',
            'recibo_image' => 'Recibo',
            'postulacion_image' => 'Certificado Postulacion',
            'sisben_image' => 'Certificado Sisben',
        ];
    }
}
