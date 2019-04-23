<?php
namespace backend\modules\converter\controllers;
use Yii;
use backend\modules\converter\models\Converter;
use backend\modules\converter\models\ConverterSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\httpclient\Client;

class ConverterController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;
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
            ],
        ];
    }

    /**
     * Lists all Converter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConverterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Converter model.
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
     * Creates a new Converter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Converter();

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->object;
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            $model->image = 'uploads/'.$imageName.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreateConverter()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model =  new Converter();
        $model->scenario = $model::SCENARIO_CREATE;
        $model->attributes = \Yii::$app->request->post();
        if($model->validate()){
            $imageName = $model->name;
            $model->file = \yii\web\UploadedFile::getInstanceByName('file');
            $model->file->saveAs('uploads/'.$imageName.'.'.'jpg');
            $model->image = $imageName.'ssssss';
            $model->save();
            return array('status' => true,    $model->file);
        }else{
            return array('status' => false, 'data'=> $model->getErrors());
        }
    }

    public function actionListConverter()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Converter::find()->all();
        if(count($model)>0){
            return array('status' => true, 'data'=> $model);
        }else{
            return array('status' => false, 'data'=> 'no Images');
        }
    }
    /**
     * Updates an existing Converter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Converter model.
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

    public function actionConvert()
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://lambda.szababurinv.now.sh')
            ->setData([

                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com'
            ])
            ->send();
        if ($response->isOk) {

        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Converter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Converter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Converter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
