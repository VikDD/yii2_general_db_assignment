<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>

<?= $form->field($model, 'email')->textInput(['autofocus' => true])  ?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'ip')->checkbox() ?>
<div id="inndiv" style="display: none"><?= $form->field($model, 'inn') ?></div>

<?php

$script = <<< JS

	$(document).ready(function(){
		var inn = $('#registerform-inn').val();
		if(inn==''){
			localStorage.removeItem('ipCheckBoxStatus');
		}
		var ipcheckboxstatus = localStorage.getItem('ipCheckBoxStatus');	
		if(ipcheckboxstatus){
			$('#registerform-ip').prop('checked', true);
			$('#inndiv').show();
		}
    	$('#registerform-ip').change(function(){
        	$('#inndiv').toggle();
        	localStorage.setItem('ipCheckBoxStatus', $('#registerform-ip').is(':checked'));
    	});
	});

JS;

$this->registerJs($script);

?>