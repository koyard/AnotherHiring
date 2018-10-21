<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Загрузить XML';

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($formModel, 'file')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>


<?php
if (isset($filesProvider)) {
    echo GridView::widget([
        'dataProvider' => $filesProvider,
        'columns'      => [
            [
                'attribute' => 'title',
                'format'    => 'raw',
                // here comes the problem - instead of parent_region I need to have parent
                'value'     => function ($provider) {
                    return Html::a($provider->title, '/index.php?r=site%2FshowFile&fileId='.$provider->id);
                },
            ],
            ['attribute' => 'uploaded'],
        ],
    ]);
}
?>