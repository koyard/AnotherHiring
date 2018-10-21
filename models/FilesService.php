<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

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

    public function GetDefaultProvider() : ActiveDataProvider
    {
        $query = Files::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'uploaded' => SORT_ASC,
                ]
            ],
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $dataProvider;
    }

    public function LargeFilesCount() : int
    {
        $query =  (new \yii\db\Query())
            ->select('sum(tags.count) as tags_count')
            ->from('tags')
            ->groupBy('file_id')
            ->having('tags_count > 20');
        return count($query->all());
    }
}
