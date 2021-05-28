<?php

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord{
    
    public static function getDb()
    {
        return Yii::$app->db;
    }
    
    public static function tableName()
    {
        return 'users';
    }
    
    public function attributeLabels()
    {
        return [
            'username' => 'Usuario',
            'email' => 'Email',
            'password' => 'Contraseña',
            'perfil' => 'Perfil',           
        ];
    }
}