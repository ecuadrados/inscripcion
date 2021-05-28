<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Control;
use app\models\ControlSearch;
use app\models\Adulto2;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ControlController implements the CRUD actions for Control model.
 */
class ControlController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ], 'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'update', 'view', 'delete', 'index'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        //'actions' => ['update', 'view'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                       
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Control models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ControlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // $dataProvider = $searchModel::find()->where(['documento' => "700"]);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Control model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Control model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $imag)
    {
        $valor = explode(".", $id);
        $documento =  $valor[0];
        $tipo = $valor[1];
        $control = Control::find()->where(['documento' => $documento,'imagen' => $imag])
        ->one();
        // Personas::model()->find('id=2') 
        // andWhere(['tenantId' => $this->tenant]);

        if($control == null) {
            $model = new Control();
            $model->documento = $documento;
            $model->imagen = $imag;
            $model->img = $id;
            $model->users_id = Yii::$app->user->identity->id;
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
    
            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            return $this->render('view', [
                'model' => $control,
            ]);
        }
    }

    /**
     * Updates an existing Control model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->estado_upload = 1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionBuscar()
    {
        $model = new Control();
        $control = "";
        if ($model->load(Yii::$app->request->post())) {
            // $control = Control::find()->where(['documento' => $model->documento, 'estado_upload'=>1])->all();           
            $control = Control::find()->where(['documento' => $model->documento])->all();           
            return $this->render('buscar', [
                'model' => $model,
                'control' => $control
            ]);            
        }

        return $this->render('buscar', [
            'model' => $model,
            'control' => $control
        ]);
    }

    public function actionUpload($token = null)
    {
        $model = new Control();
       

        $model->load(Yii::$app->request->post());
        
        $modelAdulto = Adulto2::find()->where(['documento' => $model->documento])->one();
        $control = Control::find()->where(['documento' => $model->documento, 'estado_upload' => 1])->all();
       
        // if ($modelAdulto->validate()) {  
        //     $modelAdulto->save();      
        // } else {echo var_dump($modelAdulto->getErrors());}
       
        for($i=0; $i<count($model->imagen); $i++) {           
        //    echo $model->imagen[$i];
            $imageUpload = UploadedFile::getInstance($model, 'img['.$i.']');
            $nombre_archivo = $model->documento.'.'.$imageUpload->extension;
            $modelAdulto[$model->imagen[$i]] = $nombre_archivo;    
            $modelAdulto->save();
            $control[$i]->img =  $nombre_archivo;   
            $control[$i]->estado_upload =  2;   
            $control[$i]->save();
            $imageUpload->saveAs('uploads/'.$model->imagen[$i].'/' . $nombre_archivo);             
           }
        return $this->redirect(['site/index']);
        // return 1;
    }

    /**
     * Deletes an existing Control model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Control model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Control the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Control::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
