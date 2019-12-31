<?php

namespace app\modules\import\controllers;

use common\models\UploadExcel;
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
//        if (Yii::$app->request->post() && $file != null){
//            $name = Yii::$app->security->generateRandomString(12).'.'.$file->extension;
//            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/excel/';
//            $path = Yii::$app->params['uploadPath'] . $name;
//            $file->saveAs($path);
//
//            $fileName = $path;
            $fileName = 'uploads/excel/Jt9YagIhq_U1.xls';
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

            $data = [];
            for ($row=1; $row<=$highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false);
                if ($row == 1) {
                    continue;
                }
//                echo '<pre>';
//                print_r($this->SeparateExcel($rowData[0]));
//                die();

                $data[] = $this->SeparateExcel($rowData);
            }

//            pr($errors);
//        }
        return $this->render('index', ['model' => $model, 'data' => $data]);
    }

    public function SeparateExcel($rowData = [])
    {
        $rowData[1][1] = 'Salom';
        return $rowData;
    }
}