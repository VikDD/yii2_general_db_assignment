<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>

<?= $form->field($model, 'jur_email')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'jur_name') ?>
<?= $form->field($model, 'organisation') ?>
<?= $form->field($model, 'jur_inn') ?>