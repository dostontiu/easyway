<?php

namespace app\modules\import\controllers;

use app\models\UploadExcel;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class ExcelController extends Controller
{

    public function actionIndex()
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $model = new UploadExcel();
        $file = UploadedFile::getInstance($model, 'file');
        $errors = [];
        if (Yii::$app->request->post() && $file != null){
            $name = Yii::$app->security->generateRandomString(12).'.'.$file->extension;
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
            $path = Yii::$app->params['uploadPath'] . $name;
            $file->saveAs($path);

            $fileName = $path;
//            $fileName = 'uploads/2020.xlsx';
            try {
                $inputFileType = \PHPExcel_IOFactory::identify($fileName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objExcel = \PHPExcel_IOFactory::load($fileName);
            }catch (\Exception $e){
                die('error');
            }
            $sheet = $objExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row=1; $row<=$highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
                if ($row == 1) {
                    continue;
                }
                $inn = explode(' ', $rowData[0][3]);
                $client_id = $this->findClientId($rowData[0][3]);
                if (!is_numeric($client_id)){
                    $errors[$row] = $rowData;
                    continue;
                }
//                prd($rowData[0]);

                $payment = new Payment();
                $payment->client_id = $client_id;
                $payment->certificate_id = null;
                $payment->doc_no = $rowData[0][0];
                $payment->date = excelToDate($rowData[0][1]);
                $payment->amount = $rowData[0][2];
                if ($payment->save()){
                    Yii::$app->session->setFlash('success', 'Success');
                }else{
                    $errors[$row] = $rowData;
                }
            }

//            pr($errors);
        }
        return $this->render('excel', ['model' => $model, 'errors' => $errors]);
    }

    public function findClientId($inn)
    {
        $client = Client::find()->where(['inn' => substr($inn, 0,9)])->one();

        if ($client == null){
            $model = new Client();
            $model->name = substr($inn,8, strlen($inn)-36);
            $model->h_raqam = substr($inn, -26);
            $model->inn = substr($inn, 0,9);
            if ($model->save()){
                return (int)$model->id;
            } else {
                return $model->getErrors();
            }
        }
        return (int)$client->id;
    }
}