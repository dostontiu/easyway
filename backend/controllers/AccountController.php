<?php

namespace backend\controllers;

use Yii;
use common\models\Account;
use common\models\query\AccountQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AccountController implements the CRUD actions for Account model.
 */
class AccountController extends Controller
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
     * Lists all Account models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccountQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Account model.
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
     * Creates a new Account model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model_user = Account::find()->where(['user_id' => Yii::$app->user->id])->one();
        if ($model_user !== null){
            Yii::$app->session->setFlash('success', Yii::t('app', 'You already created an account so you can update your profile'));
            return $this->redirect(['update', 'id' => $model_user->id]);
        }
        $model = new Account();
            $model->alias = Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->status = 1;
            $model->created_at = date("Y-m-d H:m:s");
            $model->updated_at = date("Y-m-d H:m:s");
            $file = UploadedFile::getInstance($model, 'file');
            if ($file != null){
                $model->image = "profile_".$model->user_id."_".time().'.'.$file->extension;
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/images/profile/';
                $path = Yii::$app->params['uploadPath'] . $model->image;
            }
            if ($model->validate() && $model->save()){
                if ($file != null){
                    $file->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Account model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->user_id !== Yii::$app->user->id){
            Yii::$app->session->setFlash('success', Yii::t('app', 'You cannot update another profile'));
            return $this->redirect(Yii::$app->request->getReferrer());

        }

        if ($model->load(Yii::$app->request->post())) {
//            echo '<pre>'; print_r(date("Y-m-d H:m:s")); die();
            $file = UploadedFile::getInstance($model, 'file');
            if ($file != null){
                $model->image = "profile_".$model->id."_".time().'.'.$file->extension;
                Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/images/profile/';
                $path = Yii::$app->params['uploadPath'] . $model->image;
            }
            $model->status = 1;
            $model->updated_at = date("Y-m-d H:m:s");
            if ($model->validate() && $model->save()){
                if ($file != null){
                    $file->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Account model.
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
     * Finds the Account model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Account the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Account::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
