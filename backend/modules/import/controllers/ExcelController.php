<?php

namespace app\modules\import\controllers;

use common\models\UploadExcel;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class ExcelController extends Controller
{
    public function actionIndex($name = null)
    {
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes
        $model = new UploadExcel();
        $file = UploadedFile::getInstance($model, 'file');

        if ($name){
            return $this->render('index', ['model' => $model, 'data' =>$this->getExcel($name), 'name' => $name]);
        }

        if (Yii::$app->request->post() && $file != null){
            $name = Yii::$app->security->generateRandomString(12).'.'.$file->extension;
            $path = Yii::$app->basePath . '/web/uploads/excel/' . $name;
            $file->saveAs($path);
            return $this->redirect(['excel/index?name='.$name]);
        }
        return $this->render('index', ['model' => $model, 'data' => '', 'name' => $name]);
    }

    public function actionBejik($name)
    {
        $this->layout = '@backend/views/layouts/print';
        return $this->render('bejik', ['data' => $this->getExcel($name)]);
    }

    public function getExcel($name){
        $data = [];
        $fileName = Yii::$app->basePath . '/web/uploads/excel/' . $name;
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
            $data[] = $rowData;
        }
        return $data;
    }
}