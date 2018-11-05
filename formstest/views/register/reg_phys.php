<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$form = ActiveForm::begin(['id' => 'registerphys-form']); ?>
<?= $form->field($model, 'email')->textInput(['autofocus' => true])  ?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'ip')->checkbox() ?>
<div id="inndiv" style="display: none"><?= $form->field($model, 'inn') ?></div>
<?= Html::hiddenInput('formtype', 'reg_phys') ?>
<div class="form-group">
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'regphyssubmit-button']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php

$script = <<< JS

	$(document).ready(function(){
    	$('#registerphysform-ip').change(function(){
        	$('#inndiv').toggle();
    	});
	});

JS;

$this->registerJs($script);

?>