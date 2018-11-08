<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegisterForm;


class RegisterController extends Controller
{
    public function actionIndex()
    {
    	$postarr = Yii::$app->request->post();
		$scenariotype = $postarr['scenariotype'];
		
		$regmodel = new RegisterForm(['scenario' => $scenariotype]);
		if ($regmodel->load(\Yii::$app->request->post()) && $regmodel->validate()) {
        	Yii::$app->session->setFlash('registerFormSubmitted');
        }
	
        return $this->render('index', [
            'regmodel' => $regmodel,
            'submitted' => $scenariotype
        ]);  
    }
}