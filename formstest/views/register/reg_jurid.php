<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin(['id' => 'registerjurid-form']); ?>
<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'organisation') ?>
<?= $form->field($model, 'inn') ?>
<?= Html::hiddenInput('formtype', 'reg_jurid') ?>
<div class="form-group">
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'regjuridsubmit-button']) ?>
</div>
<?php ActiveForm::end(); ?>