<?php

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
$this->title = 'Загрузить XML';

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'file')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>