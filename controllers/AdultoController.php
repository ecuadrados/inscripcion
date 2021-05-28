<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Adulto;
use app\models\AdultoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AdultoController implements the CRUD actions for Adulto model.
 */
class AdultoController extends Controller
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
     * Lists all Adulto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AdultoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Adulto model.
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
     * Creates a new Adulto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Adulto();

        if ($model->load(Yii::$app->request->post())) {
            $model->cedula_image = UploadedFile::getInstance($model, 'cedula_image');
            $model->recibo_image = UploadedFile::getInstance($model, 'recibo_image');
            $model->postulacion_image = UploadedFile::getInstance($model, 'postulacion_image');
            $model->sisben_image = UploadedFile::getInstance($model, 'sisben_image');
            $model->cedula =  $model->documento.'.'.$model->cedula_image->extension;  
            $model->recibo =  $model->documento.'.' . $model->recibo_image->extension; 
            $model->certificado_postulacion =  $model->documento.'.' . $model->postulacion_image->extension;  
            $model->certificado_sisben =  $model->documento.'.' . $model->sisben_image->extension;   
            if ($model->cedula_image && $model->validate()) {                
                 $model->save();
                 $model->cedula_image->saveAs('uploads/cedula/' . $model->cedula);                              
                 $model->recibo_image->saveAs('uploads/recibo/' . $model->recibo);                              
                 $model->postulacion_image->saveAs('uploads/certificado_postulacion/' . $model->certificado_postulacion);                              
                 $model->sisben_image->saveAs('uploads/certificado_sisben/' . $model->certificado_sisben);                              
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['site/about']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Adulto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file = UploadedFile::getInstance($model, 'file');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Adulto model.
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

    public function actionMensaje()
    {
        return $this->render('index');
    }

    /**
     * Finds the Adulto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adulto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Adulto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
