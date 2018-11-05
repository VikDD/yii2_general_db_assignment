<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
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
	
	<?= Tabs::widget([
        'items' => [
            [
                'label' => 'Физ. лицо',
                'content' => $this->render('reg_phys', ['model' => $regphysmodel]),
                'active' => true
            ],
            [
                'label' => 'Юр. лицо',
                'content' => $this->render('reg_jurid', ['model' => $regjuridmodel]),
            ],
        ]]);
	?>
		
<?php endif; ?>

