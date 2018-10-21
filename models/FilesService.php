<?php

namespace app\models;

use yii\base\Model;

class FilesService extends Model
{

    public function SaveInfo(UploadForm $form)
    {
        $file = new Files();

        $file->title = $form->file->baseName;
        $file->uploaded = (new \DateTimeImmutable())->format('Y-m-d H:i:s');

        $file->save();
        try {
            \Yii::$container->get(\app\models\TagsService::class)->ParseTags($form->file->tempName, $file);
        } catch (\Throwable $exception) {
            $form->addError('file', 'Ошибка парсинга файла');
            $file->delete();
        }
    }
}
