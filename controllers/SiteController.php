<?php

namespace app\controllers;

use app\models\FilesService;
use app\models\UploadForm;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function actionUpload()
    {
        $uploadForm = new UploadForm();
        /** @var FilesService $filesService */
        $filesService = Yii::$container->get(\app\models\FilesService::class);

        if (Yii::$app->request->isPost) {
            $uploadForm->file = UploadedFile::getInstance($uploadForm, 'file');

            if ($uploadForm->file && $uploadForm->validate()) {
                $filesService->SaveInfo($uploadForm);
            }
        }

        $params = [];
        $params['filesProvider'] = $filesService->GetDefaultProvider();
        $params['formModel'] = $uploadForm;
        return $this->render('upload', $params);
    }
}
