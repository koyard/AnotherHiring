<?php

namespace app\controllers;

use app\models\Files;
use app\models\FilesService;
use app\models\TagsService;
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
        $filesService = Yii::$container->get(FilesService::class);

        if (Yii::$app->request->isPost) {
            $uploadForm->file = UploadedFile::getInstance($uploadForm, 'file');

            if ($uploadForm->file && $uploadForm->validate()) {
                $filesService->SaveInfo($uploadForm);
            }
        }

        $params = [];
        $params['filesProvider'] = $filesService->GetDefaultProvider();
        $params['formModel'] = $uploadForm;
        $params['largeFilesCount'] = $filesService->LargeFilesCount();
        return $this->render('upload', $params);
    }

    public function actionFile($fileId)
    {
        /** @var TagsService $tagsService */
        $tagsService = Yii::$container->get(TagsService::class);

        /** @var Files $file */
        $file = Files::findOne($fileId);

        $params = [];
        $params['tagsProvider'] = $tagsService->ProviderForFile($file);
        $params['fileModel'] = $file;
        return $this->render('file', $params);
    }
}
