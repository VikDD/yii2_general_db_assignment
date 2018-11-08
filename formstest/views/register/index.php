<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Tabs;

$this->title = 'Форма регистрации';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php if (Yii::$app->session->hasFlash('registerFormSubmitted')): ?>
	<div class="alert alert-success">
		Спасибо за заполнение формы регистрации в качестве <?php if ($submitted == 'reg_phys'): ?> физического <?php else: ?> юридического <?php endif; ?> лица.
	</div>
<?php else: ?>

<?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

	<?= Tabs::widget([
        'items' => [
            [
                'label' => 'Физ. лицо',
                'content' => $this->render('reg_phys', ['model' => $regmodel, 'form'=>$form]),
                'active' => true
            ],
            [
                'label' => 'Юр. лицо',
                'content' => $this->render('reg_jurid', ['model' => $regmodel, 'form'=>$form]),
            ],
        ]]);
	?>
<div class="form-group">
	<?= Html::hiddenInput('scenariotype', 'reg_phys', ['id' => 'scenariotype']) ?>
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'regphyssubmit-button']) ?>
</div>
<?php ActiveForm::end(); ?>

<?php

$script = <<< JS

	$(document).ready(function(){
    	$('#w0 li').click(function(){
        	var val = $(this).children('a').attr('href');
    		if( val == '#w0-tab0' ){
    			$('#scenariotype').val('reg_phys');
    		}else if ( val == '#w0-tab1' ){
    			$('#scenariotype').val('reg_jur');
    		}
    	});
	});
	
	$(function() {
        $('a[data-toggle="tab"]').on('click', function (e) {
            localStorage.setItem('lastTab', $(e.target).attr('href'));
        });

        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('a[href="'+lastTab+'"]').click();
        }
    });

JS;

$this->registerJs($script);

?>

<?php endif; ?>