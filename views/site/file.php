<?php

use yii\grid\GridView;
use yii\helpers\Html;


/* @var $this yii\web\View */
$this->title = $fileModel->title;

?>
<?= Html::label($fileModel->title) ?>
<?=
    GridView::widget([
        'dataProvider' => $tagsProvider,
        'columns'      => [
            ['attribute' => 'name'],
            ['attribute' => 'count'],
        ],
    ]);
?>