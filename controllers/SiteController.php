<?php

namespace app\controllers;

use app\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionUpload()
    {
        $uploadForm = new UploadForm();

        if (Yii::$app->request->isPost) {
            $uploadForm->file = UploadedFile::getInstance($uploadForm, 'file');

            if ($uploadForm->file && $uploadForm->validate()) {
                Yii::$container->get(\app\models\FilesService::class)->SaveInfo($uploadForm);
            }
        }

        return $this->render('upload', ['model' => $uploadForm]);
    }
}
