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
    }
}
