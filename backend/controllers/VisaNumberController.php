<?php

namespace backend\controllers;

use Yii;
use common\models\VisaNumber;
use common\models\search\VisaNumberSearch;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VisaNumberController implements the CRUD actions for VisaNumber model.
 */
class VisaNumberController extends Controller
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
            ],
        ];
    }

    /**
     * Lists all VisaNumber models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VisaNumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VisaNumber model.
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
     * Creates a new VisaNumber model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($name, $pnumber, $visa)
    {
//        Yii::$app->response->format = 'json';
//        return $_POST['name'];
//        if (Yii::$app->request->post('pnumber')){
//            return true;
//        } else {
//            throw new BadRequestHttpException('NOooot found');
//        }
//        $data['name'] = Yii::$app->request->post('name');
//        $data['pnumber'] = Yii::$app->request->post('pnumber');
//        $data['visa'] = Yii::$app->request->post('visa');
//        $data = Yii::$app->request->getQueryParams();
//        if(empty($data['name']) || empty($data['p_number']) || empty($data['visa']) ){
//            throw new \yii\web\BadRequestHttpException("Вы должны ввести имя пользователя и пароль");
//        }

        $model = new VisaNumber();
        $model->name = $name;
        $model->p_number = $pnumber;
        $model->visa = $visa;
        $model->created_at = '';

        if ($model->save()){
            return true;
        } else {
            return false;
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing VisaNumber model.
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
     * Deletes an existing VisaNumber model.
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
     * Finds the VisaNumber model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VisaNumber the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VisaNumber::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}
