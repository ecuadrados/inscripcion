<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Adulto;

/**
 * AdultoSearch represents the model behind the search form of `app\models\Adulto`.
 */
class AdultoSearch extends Adulto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'documento', 'fecha_expedicion', 'fecha_nacimiento', 'sexo', 'direccion', 'telefono', 'sisben', 'nombre_contacto', 'telefono_contacto', 'celular_contacto', 'direccion_contacto', 'cedula', 'recibo', 'certificado_postulacion', 'certificado_sisben', 'fecha_creacion'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Adulto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 10),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha_expedicion' => $this->fecha_expedicion,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'documento', $this->documento])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'sisben', $this->sisben])
            ->andFilterWhere(['like', 'nombre_contacto', $this->nombre_contacto])
            ->andFilterWhere(['like', 'telefono_contacto', $this->telefono_contacto])
            ->andFilterWhere(['like', 'celular_contacto', $this->celular_contacto])
            ->andFilterWhere(['like', 'direccion_contacto', $this->direccion_contacto])
            ->andFilterWhere(['like', 'cedula', $this->cedula])
            ->andFilterWhere(['like', 'recibo', $this->recibo])
            ->andFilterWhere(['like', 'certificado_postulacion', $this->certificado_postulacion])
            ->andFilterWhere(['like', 'certificado_sisben', $this->certificado_sisben]);

        return $dataProvider;
    }
}
